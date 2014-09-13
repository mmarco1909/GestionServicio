<?php

namespace SisVen\SistemaBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SisVen\SistemaBundle\Entity\ProcesoResultado;

use Symfony\Component\HttpFoundation\Response;

/**
 * ProcesoResultado controller.
 *
 * @Route("/procesoresultado")
 */
class ProcesoResultadoController extends Controller
{

    /**
     * @Route("/proc_resultado_listar/{accion}", name="proc_resultado_listar")
     */
    public function listarAction($accion) {
        $html="<option value='0'>Seleccione una Opción</option>";
        $em = $this->getDoctrine()->getManager();        
        $resultados = $em->getRepository('SistemaBundle:ProcesoResultado')->findBy(array(
                'idProcesoAccion' => $accion));        
        foreach ($resultados as $resultado){                    
            $html=$html."<option value='".$resultado->getId()."'>".$resultado->getResultado()."</option>";
        }
        return new Response($html);     
    }
    
    /**
     * @Route("/proc_resultado_inputs/{resultado}", name="proc_resultado_inputs")
     */
    public function inputsAction($resultado) {
        $em = $this->getDoctrine()->getManager();  
        $inputs = array();        
        $resultado = $em->getRepository('SistemaBundle:ProcesoResultado')->findOneBy(array(
                'id' => $resultado));  
        $campos = explode(",", $resultado->getInput());        
        foreach ($campos as $campo){                    
        $inputs[]['campo'] = trim($campo);        
        }
        //return new Response(array($rResult1, $rResult2, $rResult3));   
        return new Response(json_encode($inputs));
        
        
        
        
    }

    
}
