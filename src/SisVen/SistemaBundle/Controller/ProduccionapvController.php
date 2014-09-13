<?php

namespace SisVen\SistemaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine\ORM\PersistentCollection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use SisVen\SistemaBundle\Entity\ProduccionApv;
use SisVen\SistemaBundle\Entity\ProspectosAll;
use SisVen\SistemaBundle\Entity\ProspectoBitacora;


/**
 * ProduccionApv controller.
 *
 * @Route("/produccionapv")
 */
class ProduccionapvController extends Controller {

    /**
     * @Route("produccion_apv/{id_prod}", name="produccion_apv")
     * @Method("GET")
     * @Template()
     */
    public function ingresoapvAction($id_prod) {
        $form = $this->createFormBuilder()
                ->add('task', 'text')
                ->add('dueDate', 'date')
                ->getForm();
        return $this->render('SistemaBundle:Prospectos:index_ingresoapv.html.twig', array('producto' => $id_prod,
                    'form' => $form->createView()));
    }

    /**
     * @Route("/produccionapv_listar/{id_prod}", name="produccionapv_listar")
     * @Template()
     */
    
    public function listarAction(Request $request, $id_prod) {
        $get = $request->query->all();
        $columns = array('cuspp', 'primerNm', 'segundoNm', 'primerAp',
            'segundoAp', 'tipoAporte', 'montoApv', 'fechaApv');

        $get['columns'] = &$columns;
        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        $rResult = $em->getRepository('SistemaBundle:ProduccionApv')->ajaxapvTable($get, true, $matricula, $id_prod)->getArrayResult();
        /* Data set length after filtering */
        $iFilteredTotal = count($rResult);
        /* Output */
        $output = array(
            //"sEcho" => intval($get['sEcho']),
            "iTotalRecords" => $em->getRepository('SistemaBundle:Produccionapv')->getCount(),
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );
        foreach ($rResult as $aRow) {
            $row = array();
            for ($i = 0; $i < count($columns); $i++) {
                /* Special output formatting for 'XXXXXX' column */
                if ($columns[$i] == "fechaApv") {
                    $row[] = date_format($aRow[$columns[$i]], 'd/m/Y');
                } elseif ($columns[$i] != ' ') {
                    /* General output */
                    $row[] = $aRow[$columns[$i]];
                }
            }

//            $row[] = "<a href='".$this->generateUrl('prospectos_show', array('producto' => $id_prod, 'cuspp'=>$aRow[$columns[0]]))."'><IMG src='../../public/images/icn_prospect.png' alt='Ver Prospecto' title='Ver Prospecto'></a>";
            $row['DT_RowId'] = "row_" . $aRow[$columns[0]];
            $row['DT_RowClass'] = "gradeA";
            $output['aaData'][] = $row;
        }
        unset($rResult);

        return new Response(
                json_encode($output)
                //json_encode($id_prod)                 
        );
    }    

    /**
     * @Route("/produccionapv_agregar/{producto}/{cuspp}/{ram}/{aporte}/{primer_nm}/{segundo_nm}/{primer_ap}/{segundo_ap}/{fecha}/{ruta}", name="produccionapv_agregar")
     * @Method("GET")
     */
    public function agregarAction($producto, $cuspp, $ram, $aporte, $primer_nm, $segundo_nm, $primer_ap, $segundo_ap, $fecha, $ruta) {
        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        //Verifica si el prospecto está cargado para el asesor dentro de los prospectos del mes
//        $prospecto = $em->getRepository('SistemaBundle:ProduccionApv')->findOneBy(array('idUsuario' => $matricula, 'cuspp' => $cuspp));
        
            //Crea el prospecto con los datos ingresados
            $prospecto = new ProduccionApv();
            $prospecto->setCuspp($cuspp);
            $prospecto->setIdUsuario($matricula);
            $prospecto->setPrimerNm($primer_nm);
            $prospecto->setSegundoNm($segundo_nm);
            $prospecto->setPrimerAp($primer_ap);
            $prospecto->setSegundoAp($segundo_ap);
            $prospecto->setTipoAporte($aporte);
            $prospecto->setMontoApv($ram);
            $prospecto->setFechaApv(new \DateTime($fecha));
            $prospecto->setFechaRegistro(new \DateTime('now'));
            $em->persist($prospecto);
            $em->flush();

            return $this->redirect($this->generateUrl($ruta, array('id_prod' => $producto)));
    }
    
    /**
     * @Route("/produccionapv_buscar/{cuspp}", name="produccionapv_buscar")
     * @Method("GET")
     */
    public function buscarAction(Request $request, $cuspp) {
        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $entityall = $em->getRepository('SistemaBundle:ProspectosAll')
                ->find(array('idProducto' => 'TRA', 'matAse' => $matricula, 'cuspp' => $cuspp));
        $entity = $em->getRepository('SistemaBundle:ProduccionApv')
                ->find(array('idUsuario' => $matricula, 'cuspp' => $cuspp));
        if (!$entity) {
            if (!$entityall) {
            $rResult['encontrado'] = 0;
            $rResult['primer_nm'] = '';
            $rResult['segundo_nm'] = '';
            $rResult['primer_ap'] = '';
            $rResult['segundo_ap'] = '';
            } else {
                $rResult['encontrado'] = 1;
                $rResult['primer_nm'] = $entityall->getPrimerNm();
                $rResult['segundo_nm'] = $entityall->getSegundoNm();
                $rResult['primer_ap'] = $entityall->getPrimerAp();
                $rResult['segundo_ap'] = $entityall->getSegundoAp();
                }
        } else {
            $rResult['encontrado'] = 1;
            $rResult['primer_nm'] = $entity->getPrimerNm();
            $rResult['segundo_nm'] = $entity->getSegundoNm();
            $rResult['primer_ap'] = $entity->getPrimerAp();
            $rResult['segundo_ap'] = $entity->getSegundoAp();
        }
        return new Response(json_encode($rResult));
        
    }    
 
}
