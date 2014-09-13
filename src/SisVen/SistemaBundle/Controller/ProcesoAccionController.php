<?php

namespace SisVen\SistemaBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SisVen\SistemaBundle\Entity\ProcesoAccion;

use Symfony\Component\HttpFoundation\Response;

/**
 * ProcesoAccion controller.
 *
 * @Route("/procesoaccion")
 */
class ProcesoAccionController extends Controller
{
    /**
     * @Route("/proc_accion_listar/{etapa}", name="proc_accion_listar")
     */
    public function listarAction($etapa) {
        $html="<option value=0>Seleccione una Opción</option>";
        $em = $this->getDoctrine()->getManager();        
        $acciones = $em->getRepository('SistemaBundle:ProcesoAccion')->findBy(array(
                'idProcesoEtapa' => $etapa));        
        foreach ($acciones as $accion){                    
            $html=$html."<option value=".$accion->getId().">".$accion->getAccion()."</option>";
        }
        return new Response($html);     
    }
   
}
