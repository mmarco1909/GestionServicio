<?php

namespace SisVen\SistemaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine\ORM\PersistentCollection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use SisVen\SistemaBundle\Entity\Prospectos;
use SisVen\SistemaBundle\Entity\RangoRam;
use SisVen\SistemaBundle\Entity\ProspectoBitacora;
use SisVen\SistemaBundle\Form\ProspectosType;

/**
 * Prospectos controller.
 *
 * @Route("/prospectos")
 */
class ProspectosController extends Controller {

    /**
     * @Route("/prospectos_listar/{id_prod}/{id_etapa}/{id_estado}", name="prospectos_listar")
     * @Template()
     */
    public function listarAction(Request $request, $id_prod, $id_etapa, $id_estado) {
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
        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
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

//            $row[] = "<a href='".$this->generateUrl('prospectos_show', array('cuspp'=>$aRow[$columns[0]]))."'><IMG src='../../public/images/icn_prospect.png' alt='Ver Prospecto' title='Ver Prospecto'></a>";
            $row[]="";
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
     * @Route("/prospectos_agenda/", name="prospectos_agenda")
     * @Template()
     */
    public function agendaAction() {

        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $rResult = $em->getRepository('SistemaBundle:Prospectos')->getCitas($matricula)->getArrayResult();
        $return_events = array();
        foreach ($rResult as $aRow) {  
            $nombre_completo = $aRow['primerNm'].' '.$aRow['primerAp'];
            switch ($aRow['idProcesoEtapa']){
                case 2:
                    $clase="c_naranja";
                    $accion="javascript:registra_accion(" . '"' . $aRow['cuspp'] . '"' . "," . '"' . $nombre_completo . '"' . ",".$aRow['idProcesoEtapa'].");";
                    break;
                case 3:
                    $clase="c_traspaso";
                    $accion="javascript:registra_accion(" . '"' . $aRow['cuspp'] . '"' . "," . '"' . $nombre_completo . '"' . ",".$aRow['idProcesoEtapa'].");";
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
     * @Route("/prospectos_buscar/{producto}/{cuspp}", name="prospectos_buscar")
     * @Method("GET")
     */
    public function buscarAction(Request $request, $producto, $cuspp) {
        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SistemaBundle:ProspectosAll')
                ->find(array('idProducto' => $producto, 'matAse' => $matricula, 'cuspp' => $cuspp));
        if (!$entity) {
            $rResult['encontrado'] = 0;
            $rResult['ram'] = '';
            $rResult['afp'] = '';
            $rResult['primer_nm'] = '';
            $rResult['segundo_nm'] = '';
            $rResult['primer_ap'] = '';
            $rResult['segundo_ap'] = '';
            $rResult['ruc'] = '';
        } else {
            $rResult['encontrado'] = 1;
            $rResult['ram'] = $entity->getRam();
            $rResult['afp'] = $entity->getAfp();
            $rResult['primer_nm'] = $entity->getPrimerNm();
            $rResult['segundo_nm'] = $entity->getSegundoNm();
            $rResult['primer_ap'] = $entity->getPrimerAp();
            $rResult['segundo_ap'] = $entity->getSegundoAp();
            $rResult['ruc'] = $entity->getRuc();
        }
        return new Response(json_encode($rResult));
        
    }

    /**
     * @Route("/prospectos_grabar_seleccion/{ids_prospectos}", name="prospectos_grabar_seleccion")
     * @Method("GET")
     */
    public function grabarseleccionAction($producto, $ids_prospectos) {
        $prospectos = explode(",row_", $ids_prospectos);
        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $prueba = '';
        
        $ent_etapa = $em->getRepository('SistemaBundle:ProcesoEtapa')
                ->findOneBy(array('id' => '1'));            
        $ent_resultado = $em->getRepository('SistemaBundle:ProcesoResultado')
                ->findOneBy(array('id' => '1'));
        $ent_motivo = $em->getRepository('SistemaBundle:ProcesoMotivo')
                ->findOneBy(array('id' => '1'));        
        $pro_est=$ent_resultado->getIdProcesoEstado()->getEstado();
        
        foreach ($prospectos as $prosp) {
            $prospecto = $em->getRepository('SistemaBundle:Prospectos')->findOneBy(array(
                'idProducto' => $producto,
                'matAse' => $matricula,
                'cuspp' => str_replace("row_", "", $prosp)));            
            $prospecto->setFechaHora(new \DateTime('now'));
            $prospecto->setIdProcesoEtapa(1);
            $prospecto->setProcesoEtapa($ent_etapa->getProcesoEtapa());
            $prospecto->setIdProcesoResultado('1');
            $prospecto->setProcesoResultado($ent_resultado->getResultado());         
            $prospecto->setIdProcesoMotivo('1');
            $prospecto->setProcesoMotivo($ent_motivo->getMotivo());               
            $prospecto->setIdProcesoEstado($ent_resultado->getIdProcesoEstado());
            $prospecto->setProcesoEstado($pro_est);
            $prospecto->setgestFechaHora(new \DateTime('now'));           

                $prospecto_bitacora = new ProspectoBitacora();
                $prospecto_bitacora->setCuspp($prospecto->getCuspp());
                $prospecto_bitacora->setIdUsuario($matricula);
                $prospecto_bitacora->setIdProducto($producto);
                $prospecto_bitacora->setPeriodo('201405');
                $prospecto_bitacora->setFechaHora(new \DateTime('now'));
                $prospecto_bitacora->setGestFechaHora(new \DateTime('now'));
                $prospecto_bitacora->setIdProcesoEtapa(1);
                $prospecto_bitacora->setProcesoEtapa($ent_etapa->getProcesoEtapa());
                $prospecto_bitacora->setIdProcesoResultado('1');
                $prospecto_bitacora->setProcesoResultado($ent_resultado->getResultado());
                $prospecto_bitacora->setIdProcesoEstado($ent_resultado->getIdProcesoEstado());
                $prospecto_bitacora->setProcesoEstado($pro_est);
                $em->persist($prospecto_bitacora);
                $em->flush();
            
            
            $em->persist($prospecto);
            //$prueba=$prueba.'-'.str_replace("row_","",$prosp);
        }
        $em->flush();
        //return new Response(json_encode($prueba));
        return $this->redirect($this->generateUrl('prospectos', array('id_prod' => 'TRA')));
    }

    /**
     * @Route("/prospectos_agregar/{producto}/{cuspp}/{ram}/{afp}/{primer_nm}/{segundo_nm}/{primer_ap}/{segundo_ap}/{ruc}", name="prospectos_agregar")
     * @Method("GET")
     */
    public function agregarAction(Request $request, $producto, $cuspp, $ram, $afp, $primer_nm, $segundo_nm, $primer_ap, $segundo_ap, $ruc) {
        $get = $request->query->all();
        $columns = array('rangoRam', 'ramIni', 'ramFin', 'murcielago');
        $get['columns'] = &$columns;

        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        //Verifica si el prospecto está cargado para el asesor dentro de los prospectos del mes
        $prospecto = $em->getRepository('SistemaBundle:Prospectos')
                ->findOneBy(array('idProducto' => $producto, 'matAse' => $matricula, 'cuspp' => $cuspp));

        $ent_etapa = $em->getRepository('SistemaBundle:ProcesoEtapa')
                ->findOneBy(array('id' => '1'));            
        $ent_resultado = $em->getRepository('SistemaBundle:ProcesoResultado')
                ->findOneBy(array('id' => '1'));
        $ent_motivo = $em->getRepository('SistemaBundle:ProcesoMotivo')
                ->findOneBy(array('id' => '1'));        
        $pro_est=$ent_resultado->getIdProcesoEstado()->getEstado();
        
        $rResult = $em->getRepository('SistemaBundle:RangoRam')->ajaxrangoTable($get, true, $ram)->getArrayResult();

        foreach ($rResult as $aRow) {
            $row = array();
            for ($i = 0; $i < count($columns); $i++) {
                /* Special output formatting for 'XXXXXX' column */
                    $row[] = $aRow[$columns[$i]];
            }

        }
        $rango=$aRow['murcielago'];
        
        if (!$prospecto) {
            /* No está en la base del mes del ejecutivo */
            //Lo busca en la base total de registros para agregarlo al mes de este ejecutivo
            $prospecto = $em->getRepository('SistemaBundle:ProspectosAll')
                    ->findOneBy(array('idProducto' => $producto, 'matAse' => $matricula, 'cuspp' => $cuspp));
            //Busca los datos de los superiores del ejecutivo
            $ejecutivo = $em->getRepository('SistemaBundle:Usuario')
                    ->find(array('id' => $matricula));
            $supervisor = $em->getRepository('SistemaBundle:Usuario')
                    ->find(array('id' => $ejecutivo->getIdUsuarioLider()));
            $gte_regional = $em->getRepository('SistemaBundle:Usuario')
                    ->find(array('id' => $supervisor->getIdUsuarioLider()));
            $gte_vtas = $em->getRepository('SistemaBundle:Usuario')
                    ->find(array('id' => $gte_regional->getIdUsuarioLider()));
            $gte_comercial = $em->getRepository('SistemaBundle:Usuario')
                    ->find(array('id' => $gte_vtas->getIdUsuarioLider()));

            if (!$prospecto) {
                /* No está en la base total - OK */
                //Crea el prospecto con los datos ingresados
                $prospecto = new Prospectos($producto, $matricula, $cuspp);
                $prospecto->setMatSup($supervisor->getId());
                $prospecto->setMatGer($gte_vtas->getId());
                $prospecto->setTipoFfvv($ejecutivo->getIdTipoFfvv());
                $prospecto->setPrimerNm($primer_nm);
                $prospecto->setSegundoNm($segundo_nm);
                $prospecto->setPrimerAp($primer_ap);
                $prospecto->setSegundoAp($segundo_ap);
                $prospecto->setRuc($ruc);
                $prospecto->setRam($ram);
                $prospecto->setRangoRam($rango[0]);
                $prospecto->setAfp($afp);              
                $prospecto->setFechaHora(new \DateTime('now'));
                $prospecto->setIdProcesoEtapa(1);
                $prospecto->setProcesoEtapa($ent_etapa->getProcesoEtapa());
                $prospecto->setIdProcesoResultado('1');
                $prospecto->setProcesoResultado($ent_resultado->getResultado());         
                $prospecto->setIdProcesoMotivo('1');
                $prospecto->setProcesoMotivo($ent_motivo->getMotivo());               
                $prospecto->setIdProcesoEstado($ent_resultado->getIdProcesoEstado());
                $prospecto->setProcesoEstado($pro_est);
                $prospecto->setgestFechaHora(new \DateTime('now'));   
                $em->persist($prospecto);
                $em->flush();
                
                $prospecto_bitacora = new ProspectoBitacora();
                $prospecto_bitacora->setCuspp($cuspp);
                $prospecto_bitacora->setIdUsuario($matricula);
                $prospecto_bitacora->setIdProducto($producto);
                $prospecto_bitacora->setPeriodo('201405');
                $prospecto_bitacora->setFechaHora(new \DateTime('now'));
                $prospecto_bitacora->setGestFechaHora(new \DateTime('now'));
                $prospecto_bitacora->setIdProcesoEtapa(1);
                $prospecto_bitacora->setProcesoEtapa($ent_etapa->getProcesoEtapa());
                $prospecto_bitacora->setIdProcesoResultado('1');
                $prospecto_bitacora->setProcesoResultado($ent_resultado->getResultado());
                $prospecto_bitacora->setIdProcesoEstado($ent_resultado->getIdProcesoEstado());
                $prospecto_bitacora->setProcesoEstado($pro_est);
                $em->persist($prospecto_bitacora);
                $em->flush();
                
                return $this->redirect($this->generateUrl('prospectos', array('id_prod' => $producto)));
                //return $this->render('SistemaBundle:Usuario:index.html.twig', array('valor' => $gte_comercial->getId()));
            } else {
                /* Está en la base total */
                //Duplica el registro y graba los datos del asesor
                $prospecto2 = new Prospectos($producto, $matricula, $cuspp);
                $prospecto2->setMatSup($supervisor->getId());
                $prospecto2->setMatGer($gte_vtas->getId());
                $prospecto2->setTipoFfvv($ejecutivo->getIdTipoFfvv());
                $prospecto2->setEdad($prospecto->getEdad());
                $prospecto2->setEmpresa($prospecto->getEmpresa());
                $prospecto2->setFecNacimiento($prospecto->getFecNacimiento());
                $prospecto2->setNacionalidad($prospecto->getNacionalidad());
                $prospecto2->setNumdoc($prospecto->getNumdoc());
                $prospecto2->setPrimerAp($prospecto->getPrimerAp());
                $prospecto2->setPrimerNm($prospecto->getPrimerNm());
                $prospecto2->setRuc($prospecto->getRuc());
                $prospecto2->setSegundoAp($prospecto->getSegundoAp());
                $prospecto2->setSegundoNm($prospecto->getSegundoNm());
                $prospecto2->setSexo($prospecto->getSexo());
                $prospecto2->setTipdoc($prospecto->getTipdoc());
                $prospecto2->setTipoCliente($prospecto->getTipoCliente());
                $prospecto2->setTipoEmpresa($prospecto->getTipoEmpresa());
                $prospecto2->setRam($prospecto->getRam());
                $prospecto2->setAfp($prospecto->getAfp());
                $prospecto2->setFechaHora(new \DateTime('now'));
                $prospecto2->setIdProcesoEtapa(1);
                $prospecto2->setProcesoEtapa($ent_etapa->getProcesoEtapa());
                $prospecto2->setIdProcesoResultado('1');
                $prospecto2->setProcesoResultado($ent_resultado->getResultado());         
                $prospecto2->setIdProcesoMotivo('1');
                $prospecto2->setProcesoMotivo($ent_motivo->getMotivo());               
                $prospecto2->setIdProcesoEstado($ent_resultado->getIdProcesoEstado());
                $prospecto2->setProcesoEstado($pro_est);
                $prospecto2->setgestFechaHora(new \DateTime('now')); 
                $em->persist($prospecto2);
                $em->flush();

                $prospecto_bitacora = new ProspectoBitacora();
                $prospecto_bitacora->setCuspp($cuspp);
                $prospecto_bitacora->setIdUsuario($matricula);
                $prospecto_bitacora->setIdProducto($producto);
                $prospecto_bitacora->setPeriodo('201405');
                $prospecto_bitacora->setFechaHora(new \DateTime('now'));
                $prospecto_bitacora->setGestFechaHora(new \DateTime('now'));
                $prospecto_bitacora->setIdProcesoEtapa(1);
                $prospecto_bitacora->setProcesoEtapa($ent_etapa->getProcesoEtapa());
                $prospecto_bitacora->setIdProcesoResultado('1');
                $prospecto_bitacora->setProcesoResultado($ent_resultado->getResultado());
                $prospecto_bitacora->setIdProcesoEstado($ent_resultado->getIdProcesoEstado());
                $prospecto_bitacora->setProcesoEstado($pro_est);
                $em->persist($prospecto_bitacora);
                $em->flush();
                
                return $this->redirect($this->generateUrl('prospectos', array('id_prod' => $producto)));

                
                }
        } else {
            /* Si está en la base del mes del ejecutivo cambia el estado para que pase a contacto - OK */
            $prospecto->setFechaHora(new \DateTime('now'));
            $prospecto->setIdProcesoEtapa(1);
            $prospecto->setProcesoEtapa($ent_etapa->getProcesoEtapa());
            $prospecto->setIdProcesoResultado('1');
            $prospecto->setProcesoResultado($ent_resultado->getResultado());         
            $prospecto->setIdProcesoMotivo('1');
            $prospecto->setProcesoMotivo($ent_motivo->getMotivo());               
            $prospecto->setIdProcesoEstado($ent_resultado->getIdProcesoEstado());
            $prospecto->setProcesoEstado($pro_est);
            $prospecto->setgestFechaHora(new \DateTime('now'));            
            $em->persist($prospecto);
            $em->flush();
            //return $this->render('SistemaBundle:Usuario:index.html.twig', array('valor' => $prospecto->getNomSup()));

                $prospecto_bitacora = new ProspectoBitacora();
                $prospecto_bitacora->setCuspp($cuspp);
                $prospecto_bitacora->setIdUsuario($matricula);
                $prospecto_bitacora->setIdProducto($producto);
                $prospecto_bitacora->setPeriodo('201405');
                $prospecto_bitacora->setFechaHora(new \DateTime('now'));
                $prospecto_bitacora->setGestFechaHora(new \DateTime('now'));
                $prospecto_bitacora->setIdProcesoEtapa(1);
                $prospecto_bitacora->setProcesoEtapa($ent_etapa->getProcesoEtapa());
                $prospecto_bitacora->setIdProcesoResultado('1');
                $prospecto_bitacora->setProcesoResultado($ent_resultado->getResultado());
                $prospecto_bitacora->setIdProcesoEstado($ent_resultado->getIdProcesoEstado());
                $prospecto_bitacora->setProcesoEstado($pro_est);
                $em->persist($prospecto_bitacora);
                $em->flush();

            return $this->redirect($this->generateUrl('prospectos', array('id_prod' => $producto)));
        }
    }

    /**
     * @Route("/prospectos_gestion/{producto}/{cuspp}/{accion}/{resultado}/{motivo}/{fecha}/{hora}/{lugar}/{afp}/{ram}/{gestfecha}/{ruta}", name="prospectos_gestion")
     * @Method("GET")
     */
    public function gestionAction($producto, $cuspp, $accion, $resultado, $motivo, $fecha, 
            $hora, $lugar, $afp, $ram, $gestfecha, $ruta) {
        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        //Verifica si el prospecto está cargado para el asesor dentro de los prospectos del mes
        $prospecto = $em->getRepository('SistemaBundle:Prospectos')
                ->findOneBy(array('idProducto' => $producto, 'matAse' => $matricula, 'cuspp' => $cuspp));

        if (!$prospecto) {
            /* No está en la base del mes del ejecutivo */
            throw $this->createNotFoundException('No se encuentra el Prospecto Seleccionado.');
        } else {
            /* Si está en la base del mes del ejecutivo cambia el estado para que pase a contacto - OK */
            $ent_resultado = $em->getRepository('SistemaBundle:ProcesoResultado')
                ->findOneBy(array('id' => $resultado));
            $ent_motivo = $em->getRepository('SistemaBundle:ProcesoMotivo')
                ->findOneBy(array('id' => $motivo));
            
                       
            $prospecto->setFechaHora(new \DateTime('now'));
            $prospecto->setIdProcesoEtapa($ent_resultado->getIdProcesoEtapaSiguiente());
            $prospecto->setProcesoEtapa($ent_resultado->getIdProcesoEtapaSiguiente()->getProcesoEtapa());
            $prospecto->setIdProcesoResultado($resultado);
            $prospecto->setProcesoResultado($ent_resultado->getResultado());           
            if ($motivo!=='x$_x'){
                $prospecto->setIdProcesoMotivo($motivo);
                $prospecto->setProcesoMotivo($ent_motivo->getMotivo());
            }else{
                $prospecto->setIdProcesoMotivo('0');
                $prospecto->setProcesoMotivo('0');
            }        
            $prospecto->setIdProcesoEstado($ent_resultado->getIdProcesoEstado());
            $prospecto->setProcesoEstado($ent_resultado->getIdProcesoEstado()->getEstado());
            $prospecto->setgestFechaHora(new \DateTime($gestfecha));
            if ($fecha!=='x$_x'){
                if ($hora=='x$_x'){                    
                    $prospecto->setGestFechaSiguiente(new \DateTime($fecha.'00:00:00'));
                }else{
                    $prospecto->setGestFechaSiguiente(new \DateTime($fecha.$hora));
                }            
            } else{
                    $prospecto->setGestFechaSiguiente(new \DateTime($gestfecha));
            }
            if ($hora!=='x$_x'){
            $prospecto->setGestHoraSiguiente(new \DateTime($fecha.$hora));
            }
            if ($lugar!=='x$_x'){
            $prospecto->setGestLugar($lugar);
            }
            if ($afp!=='x$_x'){
            $prospecto->setGestAfp($afp);
            }
            if ($ram!=='x$_x'){
            $prospecto->setGestRam($ram);
            }
            //$prospecto->setFechaSiguiente($fecha);            
            //$prospecto->setGestRam($ram);            
            $em->persist($prospecto);
            $em->flush();

            //Agregando gestion a la Bitacora
            $prospecto_bitacora = new ProspectoBitacora();
            $prospecto_bitacora->setCuspp($cuspp);
            $prospecto_bitacora->setIdUsuario($matricula);
            $prospecto_bitacora->setIdProducto($producto);
            $prospecto_bitacora->setPeriodo('201405');
            $prospecto_bitacora->setFechaHora(new \DateTime('now'));
            $prospecto_bitacora->setGestFechaHora(new \DateTime($gestfecha));
            if ($fecha!=='x$_x'){
                if ($hora=='x$_x'){                    
                    $prospecto_bitacora->setGestFechaSiguiente(new \DateTime($fecha.'00:00:00'));
                }else{
                    $prospecto_bitacora->setGestFechaSiguiente(new \DateTime($fecha.$hora));
                }            
            }
            $prospecto_bitacora->setIdProcesoEtapa($ent_resultado->getIdProcesoEtapaSiguiente());
            $prospecto_bitacora->setProcesoEtapa($ent_resultado->getIdProcesoEtapaSiguiente()->getProcesoEtapa());
            $prospecto_bitacora->setIdProcesoResultado($resultado);
            $prospecto_bitacora->setProcesoResultado($ent_resultado->getResultado());
            $prospecto_bitacora->setIdProcesoEstado($ent_resultado->getIdProcesoEstado());
            $prospecto_bitacora->setProcesoEstado($ent_resultado->getIdProcesoEstado()->getEstado());
            if ($motivo!=='x$_x'){
                $prospecto_bitacora->setIdProcesoMotivo($motivo);
                $prospecto_bitacora->setProcesoMotivo($ent_motivo->getMotivo());               
            }else{
                $prospecto_bitacora->setIdProcesoMotivo('0');
                $prospecto_bitacora->setProcesoMotivo('0');    
                }        
            if ($lugar!=='x$_x'){
            $prospecto_bitacora->setGestLugar($lugar);
            }
            if ($afp!=='x$_x'){
            $prospecto_bitacora->setGestAfp($afp);
            }
            if ($ram!=='x$_x'){
            $prospecto_bitacora->setGestRam($ram);
            }            
            $em->persist($prospecto_bitacora);
            $em->flush();
            
            return $this->redirect($this->generateUrl($ruta, array('id_prod' => $producto)));
             
        }
    }

    
    /**
     * Lists all Prospectos entities.
     *
     * @Route("/{id_prod}", name="prospectos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($id_prod) {
        $form = $this->createFormBuilder()
                ->add('task', 'text')
                ->add('dueDate', 'date')
                ->getForm();

        return $this->render('SistemaBundle:Prospectos:index_prospeccion.html.twig', array('producto' => $id_prod,
                    'form' => $form->createView()));
    }
    
    /**
     * @Route("prospectos_icontactos/{id_prod}", name="prospectos_icontactos")
     * @Method("GET")
     * @Template()
     */
    public function icontactosAction($id_prod) {
        $form = $this->createFormBuilder()
                ->add('task', 'text')
                ->add('dueDate', 'date')
                ->getForm();
        return $this->render('SistemaBundle:Prospectos:index_contactos.html.twig', array('producto' => $id_prod,
                    'form' => $form->createView()));
    }
    
    /**
     * @Route("prospectos_icitas/{id_prod}", name="prospectos_icitas")
     * @Method("GET")
     * @Template()
     */
    public function icitasAction($id_prod) {
        $form = $this->createFormBuilder()
                ->add('task', 'text')
                ->add('dueDate', 'date')
                ->getForm();
        return $this->render('SistemaBundle:Prospectos:index_citas.html.twig', array('producto' => $id_prod,
                    'form' => $form->createView()));
    }
    
    /**
     * @Route("prospectos_icierres/{id_prod}", name="prospectos_icierres")
     * @Method("GET")
     * @Template()
     */
    public function icierresAction($id_prod) {
        $form = $this->createFormBuilder()
                ->add('task', 'text')
                ->add('dueDate', 'date')
                ->getForm();
        return $this->render('SistemaBundle:Prospectos:index_cierres.html.twig', array('producto' => $id_prod,
                    'form' => $form->createView()));
    }
    
    /**
     * @Route("prospectos_inoexitosos/{id_prod}", name="prospectos_inoexitosos")
     * @Method("GET")
     * @Template()
     */
    public function inoexitososAction($id_prod) {
        $form = $this->createFormBuilder()
                ->add('task', 'text')
                ->add('dueDate', 'date')
                ->getForm();
        return $this->render('SistemaBundle:Prospectos:index_noexitosos.html.twig', array('producto' => $id_prod,
                    'form' => $form->createView()));
    }

    /**
     * Creates a new Prospectos entity.
     *
     * @Route("/", name="prospectos_create")
     * @Method("POST")
     * @Template("SistemaBundle:Prospectos:new.html.twig")
     */
    public function createAction(Request $request) {
        $entity = new Prospectos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('prospectos_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Prospectos entity.
     *
     * @param Prospectos $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Prospectos $entity) {
        $form = $this->createForm(new ProspectosType(), $entity, array(
            'action' => $this->generateUrl('prospectos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Prospectos entity.
     *
     * @Route("/new", name="prospectos_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction() {
        $entity = new Prospectos();
        $form = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Prospectos entity.
     *
     * @Route("/prospectos_show/{producto}/{cuspp}", name="prospectos_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($producto, $cuspp) {
        $em = $this->getDoctrine()->getManager();
        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
        $entity = $em->getRepository('SistemaBundle:Prospectos')
                ->find(array('idProducto' => $producto, 'matAse' => $matricula, 'cuspp' => $cuspp));
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Prospectos entity.');
        }
        
        return $this->render("SistemaBundle:Prospectos:show.html.twig",array('entity' => $entity));
        
    }

    /**
     * @Route("/prospectos_show/{cuspp}", name="prospectos_show")
     * @Method("GET")
     * @Template()
     */
    public function show2Action($cuspp) {
        $em = $this->getDoctrine()->getManager();
        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
        $entity = $em->getRepository('SistemaBundle:Prospectos')
                ->find(array('idProducto' => 'TRA', 'matAse' => $matricula, 'cuspp' => $cuspp));

        $form = $this->createFormBuilder()
                ->add('task', 'text')
                ->add('dueDate', 'date')
                ->getForm();
        return $this->render('SistemaBundle:Prospectos:show2.html.twig', array('producto' => 'TRA', 'cuspp' => $cuspp,
                    'form' => $form->createView(),'entity' => $entity));
    }

    /**
     * Displays a form to edit an existing Prospectos entity.
     *
     * @Route("/{id}/edit", name="prospectos_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaBundle:Prospectos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Prospectos entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a form to edit a Prospectos entity.
     *
     * @param Prospectos $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Prospectos $entity) {
        $form = $this->createForm(new ProspectosType(), $entity, array(
            'action' => $this->generateUrl('prospectos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Prospectos entity.
     *
     * @Route("/{id}", name="prospectos_update")
     * @Method("PUT")
     * @Template("SistemaBundle:Prospectos:edit.html.twig")
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaBundle:Prospectos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Prospectos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('prospectos_edit', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Prospectos entity.
     *
     * @Route("/{id}", name="prospectos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SistemaBundle:Prospectos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Prospectos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('prospectos'));
    }

    /**
     * Creates a form to delete a Prospectos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('prospectos_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

}
