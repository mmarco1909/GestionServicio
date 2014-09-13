<?php

namespace SisVen\SistemaBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SisVen\SistemaBundle\Entity\ProcesoMotivo;

use Symfony\Component\HttpFoundation\Response;

/**
 * ProcesoMotivo controller.
 *
 * @Route("/procesomotivo")
 */
class ProcesoMotivoController extends Controller
{

    /**
     * @Route("/proc_motivo_listar/{resultado}", name="proc_motivo_listar")
     */
    public function listarAction($resultado) {
        $html="<option value='0'>Seleccione una Opción</option>";
        $em = $this->getDoctrine()->getManager();        
        $motivos = $em->getRepository('SistemaBundle:ProcesoMotivo')->findBy(array(
                'idProcesoResultado' => $resultado));        
        foreach ($motivos as $motivo){                    
            $html=$html."<option value='".$motivo->getId()."'>".$motivo->getMotivo()."</option>";
        }
        return new Response($html);     
    }
}
