<?php

namespace SisVen\SistemaBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SisVen\SistemaBundle\Entity\ProcesoEtapa;

/**
 * ProcesoEtapa controller.
 *
 * @Route("/procesoetapa")
 */
class ProcesoEtapaController extends Controller
{

    /**
     * Lists all ProcesoEtapa entities.
     *
     * @Route("/", name="procesoetapa")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SistemaBundle:ProcesoEtapa')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a ProcesoEtapa entity.
     *
     * @Route("/{id}", name="procesoetapa_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaBundle:ProcesoEtapa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProcesoEtapa entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }
}
