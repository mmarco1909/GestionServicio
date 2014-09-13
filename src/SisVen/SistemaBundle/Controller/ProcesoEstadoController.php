<?php

namespace SisVen\SistemaBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SisVen\SistemaBundle\Entity\ProcesoEstado;

/**
 * ProcesoEstado controller.
 *
 * @Route("/procesoestado")
 */
class ProcesoEstadoController extends Controller
{

    /**
     * Lists all ProcesoEstado entities.
     *
     * @Route("/", name="procesoestado")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SistemaBundle:ProcesoEstado')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a ProcesoEstado entity.
     *
     * @Route("/{id}", name="procesoestado_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaBundle:ProcesoEstado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProcesoEstado entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }
}
