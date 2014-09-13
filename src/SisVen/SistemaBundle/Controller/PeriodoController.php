<?php

namespace SisVen\SistemaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SisVen\SistemaBundle\Entity\Periodo;
use Symfony\Component\HttpFoundation\Response;

/**
 * Periodo controller.
 *
 * @Route("/periodo")
 */
class PeriodoController extends Controller {

    /**
     * @Route("/periodo_listar/{id_periodo}", name="periodo_listar")
     */
    public function listarAction() {        
        $html = "<option value='" . date('Ym') . "' selected>" . date('Ym') . "</option>";
        return new Response($html);
    }    

    /**
     * Lists all Periodo entities.
     *
     * @Route("/", name="periodo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SistemaBundle:Periodo')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Periodo entity.
     *
     * @Route("/{id}", name="periodo_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaBundle:Periodo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Periodo entity.');
        }

        return array(
            'entity' => $entity,
        );
    }

}
