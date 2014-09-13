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
 * Supervisor controller.
 *
 * @Route("/supervisor")
 */
class SupervisorController extends Controller {

    /**
     * @Route("/equipo_listar/{id_prod}/{matricula}", name="equipo_listar")
     * @Template()
     */
    public function listarAction(Request $request, $id_prod, $matricula) {
        $get = $request->query->all();
        $columns = array('id', 'nombre', 'primerAp');

        $get['columns'] = &$columns;
        //$matricula = $this->get('security.context')->getToken()->getUser()->getId();

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
            $linea[] = $em->getRepository('SistemaBundle:Prospectos')->getNroProspectos($matase);
            // Seleccionados
            $linea[] = number_format($em->getRepository('SistemaBundle:Prospectos')->getNroProspectado($matase),0,'.',',');
            // Visitas
            $linea[] = $em->getRepository('SistemaBundle:Prospectos')->getNroVisitas($matase);
            // Cierres
            $linea[] = $em->getRepository('SistemaBundle:Prospectos')->getNroCierres($matase);
            // RAM
            $linea[] = number_format($em->getRepository('SistemaBundle:Prospectos')->getRamCierres($matase),0,'.',',');
            // Meta
            $linea[] = number_format(75000,0,'.',',');
            // Avance
            $linea[] = number_format(($linea[6] / $linea[7]) * 100, 2, '.', ',')." %";

            $linea[] = "<a href='".$this->generateUrl('asesores_show', array('matricula'=>$linea[0]))."'><IMG src='../../public/images/icn_prospect.png' alt='Ver Prospecto' title='Ver Prospecto'></a>";
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
     * @Route("/equipo_listar_sup/{matricula}", name="equipo_listar_sup")
     * @Template()
     */
    public function listarSupAction(Request $request, $matricula) {
        $get = $request->query->all();
        $columns = array('id', 'nombre', 'primerAp');

        $get['columns'] = &$columns;
        //$matricula = $this->get('security.context')->getToken()->getUser()->getId();

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
            $linea[] = $em->getRepository('SistemaBundle:Prospectos')->getNroProspectos($matase);
            // Seleccionados
            $linea[] = number_format($em->getRepository('SistemaBundle:Prospectos')->getNroProspectado($matase),0,'.',',');
            // Visitas
            $linea[] = $em->getRepository('SistemaBundle:Prospectos')->getNroVisitas($matase);
            // Cierres
            $linea[] = $em->getRepository('SistemaBundle:Prospectos')->getNroCierres($matase);
            // RAM
            $linea[] = number_format($em->getRepository('SistemaBundle:Prospectos')->getRamCierres($matase),0,'.',',');
            // Meta
            $linea[] = number_format(75000,0,'.',',');
            // Avance
            $linea[] = number_format(($linea[6] / $linea[7]) * 100, 2, '.', ',')." %";

            $linea[] = "<a href='".$this->generateUrl('asesores_show', array('matricula'=>$linea[0]))."'><IMG src='../../public/images/icn_prospect.png' alt='Ver Prospecto' title='Ver Prospecto'></a>";
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
     * @Route("/supervisor_agenda/", name="supervisor_agenda")
     * @Template()
     */
    public function agendaAction() {

        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $rResult = $em->getRepository('SistemaBundle:Prospectos')->getCitasSup($matricula)->getArrayResult();
        $return_events = array();
        foreach ($rResult as $aRow) {  
            $nombre_completo = $aRow['primerNm'].' '.$aRow['primerAp'];
            switch ($aRow['idProcesoEtapa']){
                case 2:
                    $clase="c_naranja";
                    $accion="";
                    break;
                case 3:
                    $clase="c_traspaso";
                    $accion="";
                    break;
                case 4:
                    $clase="c_verde";
                    $accion="";
                    break;
                case 5:
                    $clase="c_rojo";
                    $accion="";
                    break;
            }            
            $return_events[] = array(
                'id' => $aRow['cuspp'],
                'title' => $aRow['nomAse'] . ": " . $nombre_completo,                
                'start' => $aRow['gestFechaSiguiente']->format('Y-m-d').'T'.$aRow['gestFechaSiguiente']->format('H:i:s').'Z', 
                //'end' => '2014-05-28T15:15:30Z',  
                'allDay' => false,
                'url' => $accion,
                'className' => $clase
            );
        }
        unset($rResult);
        return new Response(json_encode($return_events));
    }

    /**
     * @Route("/asesor_agenda/{matricula}", name="asesor_agenda")
     * @Template()
     */
    public function agenda2Action($matricula) {

//        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $rResult = $em->getRepository('SistemaBundle:Prospectos')->getCitas($matricula)->getArrayResult();
        $return_events = array();
        foreach ($rResult as $aRow) {  
            $nombre_completo = $aRow['primerNm'].' '.$aRow['primerAp'];
            switch ($aRow['idProcesoEtapa']){
                case 2:
                    $clase="c_naranja";
                    $accion="";
                    break;
                case 3:
                    $clase="c_traspaso";
                    $accion="";
                    break;
                case 4:
                    $clase="c_verde";
                    $accion="";
                    break;
                case 5:
                    $clase="c_rojo";
                    $accion="";
                    break;
            }            
            $return_events[] = array(
                'id' => $aRow['cuspp'],
                'title' => $aRow['idProducto'] . ": " . $nombre_completo,                
                'start' => $aRow['gestFechaSiguiente']->format('Y-m-d').'T'.$aRow['gestFechaSiguiente']->format('H:i:s').'Z', 
                //'end' => '2014-05-28T15:15:30Z',  
                'allDay' => false,
                'url' => $accion,
                'className' => $clase
            );
        }
        unset($rResult);
        return new Response(json_encode($return_events));
    }

    
    
    
    /**
     * Finds and displays a Prospectos entity.
     *
     * @Route("/asesores_show/{matricula}", name="asesores_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($matricula) {
        $em = $this->getDoctrine()->getManager();
//        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
        $asesor = $em->getRepository('SistemaBundle:Usuario')->find(array('id' => $matricula));
        $nombrecompleto = $asesor->getNombre().' '.$asesor->getPrimerAp();

        return $this->render("SistemaBundle:Reportes:index_asesor.html.twig",array('matricula' => $matricula, 'asesor' => $nombrecompleto));
        
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
     * @Route("/{id_prod}", name="supervisor")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($id_prod) {
        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
        $form = $this->createFormBuilder()
                ->add('task', 'text')
                ->add('dueDate', 'date')
                ->getForm();

        return $this->render('SistemaBundle:Reportes:index.html.twig', array('producto' => $id_prod, 'matricula' => $matricula,
                    'form' => $form->createView()));
    }
    

    /**
     * @Route("/asesores_listar/{matricula}/{id_prod}/{id_etapa}/{id_estado}", name="asesores_listar")
     * @Template()
     */
    public function listadoAction(Request $request, $matricula, $id_prod, $id_etapa, $id_estado) {
        $get = $request->query->all();
        switch ($id_etapa) {
            case 0:
                $columns = array('cuspp', 'primerNm', 'segundoNm', 'primerAp',
                    'segundoAp', 'rangoRam', 'afp', 'ruc', 'empresa');
                break;
            case 1:
                $columns = array('cuspp', 'primerNm', 'segundoNm', 'primerAp',
                    'segundoAp', 'rangoRam', 'afp', 'ruc', 'empresa', 'telefonos', 'emails');
                break;
            case 2:
                $columns = array('cuspp', 'primerNm', 'segundoNm', 'primerAp',
                    'segundoAp', 'rangoRam', 'afp', 'ruc', 'empresa');
                break;
            case 3:
                $columns = array('cuspp', 'gestLugar', 'gestFechaSiguiente', 'gestHoraSiguiente', 'primerNm', 'segundoNm', 'primerAp',
                    'segundoAp', 'rangoRam', 'afp', 'ruc', 'empresa', 'telefonos', 'emails');
                break;
            case 4:
                $columns = array('cuspp', 'primerNm', 'segundoNm', 'primerAp',
                    'segundoAp', 'rangoRam', 'ruc', 'empresa', 'telefonos', 'emails', 'gestAfp', 'gestRam', 'gestFechaSiguiente');
                break;
            case 5:
                $columns = array('cuspp', 'primerNm', 'segundoNm', 'primerAp',
                    'segundoAp', 'rangoRam', 'afp', 'ruc', 'empresa');
                break;
        }
        $get['columns'] = &$columns;
//        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $rResult = $em->getRepository('SistemaBundle:Prospectos')->ajaxTable($get, true, $matricula, $id_prod, $id_etapa, $id_estado)->getArrayResult();
        /* Data set length after filtering */
        $iFilteredTotal = count($rResult);
        /* Output */
        $output = array(
            //"sEcho" => intval($get['sEcho']),
            "iTotalRecords" => $em->getRepository('SistemaBundle:Prospectos')->getCount(),
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );
        foreach ($rResult as $aRow) {
            $row = array();
            for ($i = 0; $i < count($columns); $i++) {
                /* Special output formatting for 'XXXXXX' column */
                if ($columns[$i] == "gestFechaSiguiente") {
                    $row[] = date_format($aRow[$columns[$i]], 'd/m/Y');
                } elseif ($columns[$i] == "gestFechaHora") {
                    $row[] = date_format($aRow[$columns[$i]], 'd/m/Y');
                } elseif ($columns[$i] == "gestHoraSiguiente") {
                    $row[] = date_format($aRow[$columns[$i]], 'H:i:s');
                } elseif ($columns[$i] != ' ') {
                    /* General output */
                    $row[] = $aRow[$columns[$i]];
                }
            }

            $row[] = "<a href='".$this->generateUrl('prospectos_asesor', array('matricula'=> $matricula, 'cuspp'=>$aRow[$columns[0]]))."'><IMG src='../../public/images/icn_prospect.png' alt='Ver Prospecto' title='Ver Prospecto'></a>";
            $row['DT_RowId'] = "row_" . $aRow[$columns[0]];
            $row['DT_RowClass'] = "gradeA";
            $output['aaData'][] = $row;
            
        }
        unset($rResult);

        return new Response(
                json_encode($output)
                //json_encode($id_prod)                 
        );
        /*$baseurl = $request->getUri().$request->getPathInfo();
        return new Response($request->get('_route'));*/

        //return $this->render('SistemaBundle:Usuario:prueba.html.twig',array('output'=>json_encode($output)));
    }
    
    /**
     * @Route("/prospectos_asesor/{cuspp}", name="prospectos_asesor")
     * @Method("GET")
     * @Template()
     */
    public function show2Action($cuspp) {
        $em = $this->getDoctrine()->getManager();
        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
        $entity = $em->getRepository('SistemaBundle:Prospectos')
                ->findOneBy(array('idProducto' => 'TRA', 'cuspp' => $cuspp));
        
        $form = $this->createFormBuilder()
                ->add('task', 'text')
                ->add('dueDate', 'date')
                ->getForm();
        return $this->render('SistemaBundle:Reportes:show_prospecto.html.twig', array('producto' => 'TRA', 'cuspp' => $cuspp,
                    'form' => $form->createView(),'entity' => $entity));
    }

}
