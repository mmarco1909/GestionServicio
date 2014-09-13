<?php

namespace SisVen\SistemaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SisVen\SistemaBundle\Entity\Afp;
use SisVen\SistemaBundle\Form\AfpType;

use Symfony\Component\HttpFoundation\Response;

/**
 * Afp controller.
 *
 * @Route("/afp")
 */
class AfpController extends Controller
{

    /**
     * @Route("/afp_listar/", name="afp_listar")
     */
    public function listarAction() {
        $html="";
        $em = $this->getDoctrine()->getManager();
        $afps = $em->getRepository('SistemaBundle:Afp')->findAll();
        $html=$html."<option value='0'>Seleccione la AFP</option>";
        foreach ($afps as $afp){
            $html=$html."<option value='".$afp->getId()."'>".$afp->getAfp()."</option>";
        }
        return new Response($html);     
    }
    
    
    
    /**
     * Lists all Afp entities.
     *
     * @Route("/", name="afp")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SistemaBundle:Afp')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Afp entity.
     *
     * @Route("/", name="afp_create")
     * @Method("POST")
     * @Template("SistemaBundle:Afp:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Afp();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('afp_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Afp entity.
    *
    * @param Afp $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Afp $entity)
    {
        $form = $this->createForm(new AfpType(), $entity, array(
            'action' => $this->generateUrl('afp_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Afp entity.
     *
     * @Route("/new", name="afp_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Afp();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Afp entity.
     *
     * @Route("/{id}", name="afp_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaBundle:Afp')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Afp entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Afp entity.
     *
     * @Route("/{id}/edit", name="afp_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaBundle:Afp')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Afp entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Afp entity.
    *
    * @param Afp $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Afp $entity)
    {
        $form = $this->createForm(new AfpType(), $entity, array(
            'action' => $this->generateUrl('afp_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Afp entity.
     *
     * @Route("/{id}", name="afp_update")
     * @Method("PUT")
     * @Template("SistemaBundle:Afp:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaBundle:Afp')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Afp entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('afp_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Afp entity.
     *
     * @Route("/{id}", name="afp_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SistemaBundle:Afp')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Afp entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('afp'));
    }

    /**
     * Creates a form to delete a Afp entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('afp_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
