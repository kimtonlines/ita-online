<?php

namespace EinscriptionBundle\Controller;


use EinscriptionBundle\Entity\Annee_Academique;
use EinscriptionBundle\Entity\Classe;
use EinscriptionBundle\Entity\Frais_Inscription;
use EinscriptionBundle\Entity\Photo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use EinscriptionBundle\Entity\Etudiant;
use EinscriptionBundle\Entity\Correspondant;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;



class EinscriptionController extends Controller
{

    public function indexAction()
    {
        return $this->render('EinscriptionBundle:Public:index.html.twig');
    }

    public function printAction()
    {
        return $this->redirectToRoute('etudiants/print');
    }

    public function adminAction()
    {
        return $this->render('EinscriptionBundle:Public/inscription:admin.html.twig');
    }

    public function inscriptionAction()
    {
        return $this->render('EinscriptionBundle:Public/inscription:inscription.html.twig');
    }

    public function postAction(Request $request)
    {
        
        $annee = $this->getDoctrine()->getRepository('EinscriptionBundle:Annee_Academique');
        $frais = $this->getDoctrine()->getRepository('EinscriptionBundle:Frais_Inscription');
   
        
        $correspondant = new Correspondant();

        $etudiant = new Etudiant();
        $etudiant->setAnneeAcademique($annee->find(1));
        $etudiant->setFraisInscription($frais->find(1));
        $etudiant->setCorrespondant($correspondant);

        $form = $this->createForm('EinscriptionBundle\Form\EtudiantType', $etudiant);
         
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            
        
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($correspondant);
            $em->persist($etudiant);
            $em->flush();

            return $this->redirectToRoute('etudiants/get', array('id' => $etudiant->getId()));
        }

        return $this->render('EinscriptionBundle:Public/inscription:post.html.twig', array(
            'etudiant' => $etudiant,
            'form' => $form->createView(),
        ));
        
    }

    
    public function getAction(Etudiant $etudiant)
    {
        return $this->render('EinscriptionBundle:Public/inscription:get.html.twig', array(
            'etudiant' => $etudiant));
    }

    public function putAction(Request $request, Etudiant $etudiant)
    {
      $editForm = $this->createForm('EinscriptionBundle\Form\EtudiantType', $etudiant);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('etudiants/get', array('id' => $etudiant->getId()));
        }
        return $this->render('EinscriptionBundle:Public/inscription:put.html.twig', array(
            'etudiant' => $etudiant,
            'edit_form' => $editForm->createView(),
              ));
    }

    public function payementAction()
    {

        return $this->render('EinscriptionBundle:Public/inscription:payement.html.twig');
    }
 public function reinscriptionAction()
    {
        return $this->render('EinscriptionBundle:Public/reinscription:reinscription.html.twig');
    }

    public function rematriculeAction()
    {
        return $this->render('EinscriptionBundle:Public/reinscription:rematricule.html.twig');
    }

    public function reinformationAction()
    {
        return $this->render('EinscriptionBundle:Public/reinscription:reinformation.html.twig');
    }

    public function reverificationAction()
    {
        return $this->render('EinscriptionBundle:Public/reinscription:reverification.html.twig');
    }

    public function repayementAction()
    {
        return $this->render('EinscriptionBundle:Public/reinscription:repayement.html.twig');
    }

}