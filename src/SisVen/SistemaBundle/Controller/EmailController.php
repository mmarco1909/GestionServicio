<?php

namespace SisVen\SistemaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SisVen\SistemaBundle\Entity\Email;
use SisVen\SistemaBundle\Form\EmailType;

/**
 * Email controller.
 *
 * @Route("/email")
 */
class EmailController extends Controller
{

    /**
     * Lists all Email entities.
     *
     * @Route("/", name="email")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SistemaBundle:Email')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * @Route("/email_agregar/{cuspp}/{email}/{ruta}", name="email_agregar")
     * @Method("GET")
     */
    public function agregarAction($cuspp, $email, $ruta) {
        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        //Verifica si el prospecto está cargado para el asesor dentro de los prospectos del mes
//        $prospecto = $em->getRepository('SistemaBundle:ProduccionApv')->findOneBy(array('idUsuario' => $matricula, 'cuspp' => $cuspp));
        
            //Crea el prospecto con los datos ingresados
            $prospecto = new Email();
            $prospecto->setEmail($email);
            $prospecto->setCuspp($cuspp);
            $prospecto->setFechaAlta(new \DateTime('now'));
            $em->persist($prospecto);
            $em->flush();

            return $this->redirect($this->generateUrl($ruta, array('cuspp' => $cuspp)));
    }
    
    /**
     * @Route("/email_listar/{cuspp}", name="email_listar")
     * @Template()
     */

   public function listadoAction($cuspp) {

//        $em = $this->getDoctrine()->getEntityManager();
        $em = $this->getDoctrine()->getManager();
//        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
        $consulta = $em->createQuery('SELECT o FROM SistemaBundle:Email o where o.cuspp = :mcuspp');
//        $consulta->setParameter('mat', $matricula);
        $consulta->setParameter('mcuspp', $cuspp);
        $consulta->setMaxResults(50);
        $prospectos = $consulta->getResult();  
        $html='';

        foreach ($prospectos as $prospecto){
            $html=$html.'<tr>';
            $html=$html.'<td>'.$prospecto->getEmail().'</td>';
            $html=$html.'<td>'.$prospecto->getFechaAlta()->format('d-m-Y').'</td>';
            $html=$html.'</tr>';
        }
                
        return new response($html);
       
    }       

    
    /**
     * Creates a new Email entity.
     *
     * @Route("/", name="email_create")
     * @Method("POST")
     * @Template("SistemaBundle:Email:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Email();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('email_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Email entity.
    *
    * @param Email $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Email $entity)
    {
        $form = $this->createForm(new EmailType(), $entity, array(
            'action' => $this->generateUrl('email_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Email entity.
     *
     * @Route("/new", name="email_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Email();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Email entity.
     *
     * @Route("/{id}", name="email_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaBundle:Email')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Email entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Email entity.
     *
     * @Route("/{id}/edit", name="email_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaBundle:Email')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Email entity.');
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
    * Creates a form to edit a Email entity.
    *
    * @param Email $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Email $entity)
    {
        $form = $this->createForm(new EmailType(), $entity, array(
            'action' => $this->generateUrl('email_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Email entity.
     *
     * @Route("/{id}", name="email_update")
     * @Method("PUT")
     * @Template("SistemaBundle:Email:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaBundle:Email')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Email entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('email_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Email entity.
     *
     * @Route("/{id}", name="email_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SistemaBundle:Email')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Email entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('email'));
    }

    /**
     * Creates a form to delete a Email entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('email_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
