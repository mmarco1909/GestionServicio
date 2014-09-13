<?php

namespace SisVen\SistemaBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SisVen\SistemaBundle\Entity\Producto;

use Symfony\Component\HttpFoundation\Response;

/**
 * Producto controller.
 *
 * @Route("/producto")
 */
class ProductoController extends Controller
{

    /**
     * @Route("/producto_listar/{id_prod}", name="producto_listar")
     */
    public function listarAction($id_prod) {
        $html="";
        $em = $this->getDoctrine()->getManager();
        $productos = $em->getRepository('SistemaBundle:Producto')->findAll();
        foreach ($productos as $producto){
            $selected="";
            if ($producto->getId()==$id_prod){
                $selected='selected';
            }            
            $html=$html."<option value='".$producto->getId()."' ".$selected.">".$producto->getProducto()."</option>";
        }
        return new Response($html);     
    }
    
    /**
     * Lists all Producto entities.
     *
     * @Route("/", name="producto")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SistemaBundle:Producto')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Producto entity.
     *
     * @Route("/{id}", name="producto_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaBundle:Producto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Producto entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }
}
