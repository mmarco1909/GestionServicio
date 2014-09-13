<?php

namespace SisVen\SistemaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine\ORM\PersistentCollection;
use Doctrine\ORM\Query\Expr;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use SisVen\SistemaBundle\Entity\ReporteSupervisor;
use SisVen\SistemaBundle\Entity\Prospectos;
use SisVen\SistemaBundle\Entity\Usuario;
use SisVen\SistemaBundle\Entity\ProspectoBitacora;
use SisVen\SistemaBundle\Form\ProspectosType;

/**
 * GerenteVenta controller.
 *
 * @Route("/gerenteventa")
 */
class GerenteVentaController extends Controller {

    /**
     * @Route("/regionales_listar/{id_prod}", name="regionales_listar")
     * @Template()
     */
    public function listarAction(Request $request, $id_prod) {
        $get = $request->query->all();
        $columns = array('id', 'nombre', 'primerAp');

        $get['columns'] = &$columns;
        $matricula = $this->get('security.context')->getToken()->getUser()->getId();

        $em = $this->getDoctrine()->getManager();
        $rResult = $em->getRepository('SistemaBundle:Usuario')->ajaxTable($get, true, $matricula)->getArrayResult();

        //var_dump($rResult);
        /* Data set length after filtering */
        $iFilteredTotal = count($rResult);

        /* Output */
        $output = array(
            //"sEcho" => intval($get['sEcho']),
            "iTotalRecords" => $iFilteredTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );
        
        foreach ($rResult as $alinea) {
            $linea = array();
            $matase = $alinea['id'];
            $linea[] = $alinea['id'];
            $linea[] = $alinea['nombre']." ".$alinea['primerAp'];
            // Prospectos
            $linea[] = $em->getRepository('SistemaBundle:Prospectos')->getNroProspectosGer($matase);
            // Seleccionados
            $linea[] = number_format($em->getRepository('SistemaBundle:Prospectos')->getNroProspectadoGer($matase),0,'.',',');
            // Visitas
            $linea[] = $em->getRepository('SistemaBundle:Prospectos')->getNroVisitasGer($matase);
            // Cierres
            $linea[] = $em->getRepository('SistemaBundle:Prospectos')->getNroCierresGer($matase);
            // RAM
            $linea[] = number_format($em->getRepository('SistemaBundle:Prospectos')->getRamCierresGer($matase),0,'.',',');
            // Meta

            $rSalas = $em->getRepository('SistemaBundle:Usuario')->ajaxTable($get, true, $matase)->getArrayResult();
            $TotalAsesores = 0;
            foreach ($rSalas as $aSalas) {
                $mat = $aSalas['id'];
                $TotalAsesores = $TotalAsesores + $em->getRepository('SistemaBundle:Usuario')->getNroAsesores($mat);
            }

            $linea[] = number_format(75000 * $TotalAsesores,0,'.',',');
            // Avance
            if ($TotalAsesores==0) {
                $linea[] = 0;
            }else {
                $linea[] = number_format(($linea[6] / $linea[7]) * 100, 2, '.', ',')." %";
            }
            $linea[] = "<a href='".$this->generateUrl('gerente_show', array('matricula'=>$linea[0]))."'><IMG src='../../public/images/icn_prospect.png' alt='Ver Prospecto' title='Ver Prospecto'></a>";
            $linea['DT_RowId'] = "row_" . $linea[0];
            $linea['DT_RowClass'] = "gradeA";
            $output['aaData'][] = $linea;
            
            //var_dump($linea);
            
            }
        
        unset($rResult);

        return new Response(
                json_encode($output)
        );
    }


    /**
     * Finds and displays a Prospectos entity.
     *
     * @Route("/gerente_show/{matricula}", name="gerente_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($matricula) {
        $em = $this->getDoctrine()->getManager();
//        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
        $asesor = $em->getRepository('SistemaBundle:Usuario')->find(array('id' => $matricula));
        $nombrecompleto = $asesor->getNombre().' '.$asesor->getPrimerAp();

        return $this->render("SistemaBundle:Reportes:index_regional.html.twig",array('matricula' => $matricula, 'asesor' => $nombrecompleto));
        
    }

    /**
     * @Route("/prospectos_avance", name="prospectos_avance")
     * @Method("GET")
     */
    public function avanceAction(Request $request) {
        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $rResult['avance'] = $em->getRepository('SistemaBundle:Prospectos')->getNroProspectado($matricula);
        $rResult['meta'] = 100;
        $rResult['cumplimiento'] = number_format(($rResult['avance'] / $rResult['meta']) * 100, 2, '.', ',');
        return new Response(json_encode($rResult));
    }


    /**
     * Lists all Supervisor entities.
     *
     * @Route("/{id_prod}", name="gerenteventa")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($id_prod) {
        $form = $this->createFormBuilder()
                ->add('task', 'text')
                ->add('dueDate', 'date')
                ->getForm();

        return $this->render('SistemaBundle:Reportes:index_gerenteventa.html.twig', array('producto' => $id_prod,
                    'form' => $form->createView()));
    }
    


}
