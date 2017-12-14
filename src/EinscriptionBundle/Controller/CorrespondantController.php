<?php

namespace EinscriptionBundle\Controller;

use EinscriptionBundle\Entity\Correspondant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Correspondant controller.
 *
 * @Route("correspondant")
 */
class CorrespondantController extends Controller
{
    /**
     * Lists all correspondant entities.
     *
     * @Route("/", name="correspondant_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $correspondants = $em->getRepository('EinscriptionBundle:Correspondant')->findAll();

        return $this->render('correspondant/index.html.twig', array(
            'correspondants' => $correspondants,
        ));
    }

    /**
     * Creates a new correspondant entity.
     *
     * @Route("/new", name="correspondant_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $correspondant = new Correspondant();
        $form = $this->createForm('EinscriptionBundle\Form\CorrespondantType', $correspondant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($correspondant);
            $em->flush();

            return $this->redirectToRoute('correspondant_show', array('id' => $correspondant->getId()));
        }

        return $this->render('correspondant/new.html.twig', array(
            'correspondant' => $correspondant,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a correspondant entity.
     *
     * @Route("/{id}", name="correspondant_show")
     * @Method("GET")
     */
    public function showAction(Correspondant $correspondant)
    {
        $deleteForm = $this->createDeleteForm($correspondant);

        return $this->render('correspondant/show.html.twig', array(
            'correspondant' => $correspondant,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing correspondant entity.
     *
     * @Route("/{id}/edit", name="correspondant_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Correspondant $correspondant)
    {
        $deleteForm = $this->createDeleteForm($correspondant);
        $editForm = $this->createForm('EinscriptionBundle\Form\CorrespondantType', $correspondant);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('correspondant_edit', array('id' => $correspondant->getId()));
        }

        return $this->render('correspondant/edit.html.twig', array(
            'correspondant' => $correspondant,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a correspondant entity.
     *
     * @Route("/{id}", name="correspondant_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Correspondant $correspondant)
    {
        $form = $this->createDeleteForm($correspondant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($correspondant);
            $em->flush();
        }

        return $this->redirectToRoute('correspondant_index');
    }

    /**
     * Creates a form to delete a correspondant entity.
     *
     * @param Correspondant $correspondant The correspondant entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Correspondant $correspondant)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('correspondant_delete', array('id' => $correspondant->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
