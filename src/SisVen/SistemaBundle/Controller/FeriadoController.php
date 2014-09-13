<?php

namespace SisVen\SistemaBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SisVen\SistemaBundle\Entity\Feriado;

/**
 * Feriado controller.
 *
 * @Route("/feriado")
 */
class FeriadoController extends Controller
{

    /**
     * Lists all Feriado entities.
     *
     * @Route("/", name="feriado")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SistemaBundle:Feriado')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Feriado entity.
     *
     * @Route("/{id}", name="feriado_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaBundle:Feriado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Feriado entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }
}
