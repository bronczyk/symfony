<?php

namespace Dbronczyk\DemoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Dbronczyk\DemoBundle\Entity\Questionnarie;
use Dbronczyk\DemoBundle\Form\QuestionnarieType;

/**
 * Questionnarie controller.
 *
 */
class QuestionnarieController extends Controller
{

    /**
     * Lists all Questionnarie entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DbronczykDemoBundle:Questionnarie')->findAll();

        return $this->render('DbronczykDemoBundle:Questionnarie:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Questionnarie entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Questionnarie();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('questionnarie_show', array('id' => $entity->getId())));
        }

        return $this->render('DbronczykDemoBundle:Questionnarie:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Questionnarie entity.
     *
     * @param Questionnarie $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Questionnarie $entity)
    {
        $form = $this->createForm(new QuestionnarieType(), $entity, array(
            'action' => $this->generateUrl('questionnarie_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Questionnarie entity.
     *
     */
    public function newAction()
    {
        $entity = new Questionnarie();
        $form   = $this->createCreateForm($entity);

        return $this->render('DbronczykDemoBundle:Questionnarie:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Questionnarie entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DbronczykDemoBundle:Questionnarie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Questionnarie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DbronczykDemoBundle:Questionnarie:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }
	
	
	 public function showByLastnameAction($lastname)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DbronczykDemoBundle:Questionnarie')->findOneBy(array(
		'lastname' => $lastname		
		));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Questionnarie entity.');
        }

        $deleteForm = $this->createDeleteForm($entity->getId());

        return $this->render('DbronczykDemoBundle:Questionnarie:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Questionnarie entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DbronczykDemoBundle:Questionnarie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Questionnarie entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DbronczykDemoBundle:Questionnarie:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Questionnarie entity.
    *
    * @param Questionnarie $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Questionnarie $entity)
    {
        $form = $this->createForm(new QuestionnarieType(), $entity, array(
            'action' => $this->generateUrl('questionnarie_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Questionnarie entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DbronczykDemoBundle:Questionnarie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Questionnarie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('questionnarie_edit', array('id' => $id)));
        }

        return $this->render('DbronczykDemoBundle:Questionnarie:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Questionnarie entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DbronczykDemoBundle:Questionnarie')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Questionnarie entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('questionnarie'));
    }

    /**
     * Creates a form to delete a Questionnarie entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('questionnarie_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
