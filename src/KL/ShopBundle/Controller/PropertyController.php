<?php

namespace KL\ShopBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use KL\ShopBundle\Entity\Property;
use KL\ShopBundle\Form\PropertyType;

/**
 * Property controller.
 *
 * @Route("/property")
 */
class PropertyController extends Controller
{

    /**
     * Lists all Property entities.
     *
     * @Route("/", name="property")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('KLShopBundle:Property')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Property entity.
     *
     * @Route("/", name="property_create")
     * @Method("POST")
     * @Template("KLShopBundle:Property:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Property();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('property_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Property entity.
    *
    * @param Property $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Property $entity)
    {
        $form = $this->createForm(new PropertyType(), $entity, array(
            'action' => $this->generateUrl('property_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Property entity.
     *
     * @Route("/new", name="property_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Property();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Property entity.
     *
     * @Route("/{id}", name="property_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KLShopBundle:Property')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Property entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Property entity.
     *
     * @Route("/{id}/edit", name="property_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KLShopBundle:Property')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Property entity.');
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
    * Creates a form to edit a Property entity.
    *
    * @param Property $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Property $entity)
    {
        $form = $this->createForm(new PropertyType(), $entity, array(
            'action' => $this->generateUrl('property_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Property entity.
     *
     * @Route("/{id}", name="property_update")
     * @Method("PUT")
     * @Template("KLShopBundle:Property:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KLShopBundle:Property')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Property entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('property_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Property entity.
     *
     * @Route("/{id}", name="property_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('KLShopBundle:Property')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Property entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('property'));
    }

    /**
     * Creates a form to delete a Property entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('property_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
