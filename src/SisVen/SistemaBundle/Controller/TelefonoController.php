<?php

namespace SisVen\SistemaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SisVen\SistemaBundle\Entity\Telefono;
use SisVen\SistemaBundle\Form\TelefonoType;

/**
 * Telefono controller.
 *
 * @Route("/telefono")
 */
class TelefonoController extends Controller
{

    /**
     * Lists all Telefono entities.
     *
     * @Route("/", name="telefono")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SistemaBundle:Telefono')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * @Route("/telefonos_agregar/{cuspp}/{tipotel}/{numerotel}/{anexo}/{ruta}", name="telefonos_agregar")
     * @Method("GET")
     */
    public function agregarAction($cuspp, $tipotel, $numerotel, $anexo, $ruta) {
        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        //Verifica si el prospecto está cargado para el asesor dentro de los prospectos del mes
//        $prospecto = $em->getRepository('SistemaBundle:ProduccionApv')->findOneBy(array('idUsuario' => $matricula, 'cuspp' => $cuspp));
        
            //Crea el prospecto con los datos ingresados
            $prospecto = new Telefono();
            $prospecto->setTipoTelefono($tipotel);
            $prospecto->setNumero($numerotel);
            $prospecto->setAnexo($anexo);
            $prospecto->setCuspp($cuspp);
            $prospecto->setFechaAlta(new \DateTime('now'));
            $em->persist($prospecto);
            $em->flush();

            return $this->redirect($this->generateUrl($ruta, array('cuspp' => $cuspp)));
    }
    
    /**
     * @Route("/telefonos_listar/{cuspp}", name="telefonos_listar")
     * @Template()
     */

   public function listadoAction($cuspp) {

//        $em = $this->getDoctrine()->getEntityManager();
        $em = $this->getDoctrine()->getManager();
//        $matricula = $this->get('security.context')->getToken()->getUser()->getId();
        $consulta = $em->createQuery('SELECT o FROM SistemaBundle:Telefono o where o.cuspp = :mcuspp');
//        $consulta->setParameter('mat', $matricula);
        $consulta->setParameter('mcuspp', $cuspp);
        $consulta->setMaxResults(50);
        $prospectos = $consulta->getResult();  
        $html='';

        foreach ($prospectos as $prospecto){
            $html=$html.'<tr>';
            $html=$html.'<td>'.$prospecto->getTipoTelefono().'</td>';
            $html=$html.'<td>'.$prospecto->getNumero().'</td>';
            $html=$html.'<td>'.$prospecto->getAnexo().'</td>';
            $html=$html.'<td>'.$prospecto->getFechaAlta()->format('d-m-Y').'</td>';
            $html=$html.'</tr>';
        }
                
        return new response($html);
       
    }       

    
    /**
     * Creates a new Telefono entity.
     *
     * @Route("/", name="telefono_create")
     * @Method("POST")
     * @Template("SistemaBundle:Telefono:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Telefono();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('telefono_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Telefono entity.
    *
    * @param Telefono $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Telefono $entity)
    {
        $form = $this->createForm(new TelefonoType(), $entity, array(
            'action' => $this->generateUrl('telefono_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Telefono entity.
     *
     * @Route("/new", name="telefono_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Telefono();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Telefono entity.
     *
     * @Route("/{id}", name="telefono_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaBundle:Telefono')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Telefono entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Telefono entity.
     *
     * @Route("/{id}/edit", name="telefono_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaBundle:Telefono')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Telefono entity.');
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
    * Creates a form to edit a Telefono entity.
    *
    * @param Telefono $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Telefono $entity)
    {
        $form = $this->createForm(new TelefonoType(), $entity, array(
            'action' => $this->generateUrl('telefono_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Telefono entity.
     *
     * @Route("/{id}", name="telefono_update")
     * @Method("PUT")
     * @Template("SistemaBundle:Telefono:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaBundle:Telefono')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Telefono entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('telefono_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Telefono entity.
     *
     * @Route("/{id}", name="telefono_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SistemaBundle:Telefono')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Telefono entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('telefono'));
    }

    /**
     * Creates a form to delete a Telefono entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('telefono_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
