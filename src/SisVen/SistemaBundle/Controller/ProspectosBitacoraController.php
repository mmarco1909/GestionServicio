<?php

namespace SisVen\SistemaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine\ORM\PersistentCollection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use SisVen\SistemaBundle\Entity\ProspectoBitacora;
use SisVen\SistemaBundle\Entity\Prospectos;
use SisVen\SistemaBundle\Form\ProspectosAllType;
use SisVen\SistemaBundle\Form\ProspectosType;
/**
 * ProspectosBitacora controller.
 *
 * @Route("/prospectosbitacora")
 */
class ProspectosBitacoraController extends Controller {

    public function indexAction($id_prod) {
        $form = $this->createFormBuilder()
                ->add('task', 'text')
                ->add('dueDate', 'date')
                ->getForm();

        return $this->render('SistemaBundle:Prospectos:index.html.twig', array('producto' => $id_prod,
                    'form' => $form->createView()));
    }    
    

    /**
     * @Route("/prospectos_bitacora/{cuspp}", name="prospectos_bitacora")
     * @Template()
     */
    
    public function listarAction(Request $request, $cuspp) {
        $get = $request->query->all();
        $columns = array('procesoEstado', 'gestFechaHora', 'procesoEtapa', 'procesoResultado',
            'procesoMotivo', 'gestLugar', 'gestAfp', 'gestRam', 'fechaHora');

        $get['columns'] = &$columns;
        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        $rResult = $em->getRepository('SistemaBundle:ProspectoBitacora')->ajaxbitacoraTable($get, true, $matricula, $cuspp)->getArrayResult();
        /* Data set length after filtering */
        $iFilteredTotal = count($rResult);
        /* Output */
        $output = array(
            //"sEcho" => intval($get['sEcho']),
            "iTotalRecords" => $em->getRepository('SistemaBundle:ProspectoBitacora')->getCount(),
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );
        foreach ($rResult as $aRow) {
            $row = array();
            for ($i = 0; $i < count($columns); $i++) {
                /* Special output formatting for 'XXXXXX' column */
                if ($columns[$i] == "gestFechaHora") {
                    $row[] = date_format($aRow[$columns[$i]], 'd/m/Y H:i:s');
                } elseif ($columns[$i] == "fechaHora") {
                    $row[] = date_format($aRow[$columns[$i]], 'd/m/Y H:i:s');
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
     * @Route("/prospectos_bitacora_asesor/{cuspp}", name="prospectos_bitacora_asesor")
     * @Template()
     */
    
    public function listadoAction(Request $request, $cuspp) {
        $get = $request->query->all();
        $columns = array('procesoEstado', 'gestFechaHora', 'procesoEtapa', 'procesoResultado',
            'procesoMotivo', 'gestLugar', 'gestAfp', 'gestRam', 'fechaHora');

        $get['columns'] = &$columns;
        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        $rResult = $em->getRepository('SistemaBundle:ProspectoBitacora')->ajaxbitacorasupTable($get, true, $matricula, $cuspp)->getArrayResult();
        /* Data set length after filtering */
        $iFilteredTotal = count($rResult);
        /* Output */
        $output = array(
            //"sEcho" => intval($get['sEcho']),
            "iTotalRecords" => $em->getRepository('SistemaBundle:ProspectoBitacora')->getCount(),
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );
        foreach ($rResult as $aRow) {
            $row = array();
            for ($i = 0; $i < count($columns); $i++) {
                /* Special output formatting for 'XXXXXX' column */
                if ($columns[$i] == "gestFechaHora") {
                    $row[] = date_format($aRow[$columns[$i]], 'd/m/Y H:i:s');
                } elseif ($columns[$i] == "fechaHora") {
                    $row[] = date_format($aRow[$columns[$i]], 'd/m/Y H:i:s');
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
    
}
