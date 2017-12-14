<?php

namespace EinscriptionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudiantType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('matricule', HiddenType::class)
            ->add('nom')
            ->add('prenom')
            ->add('sexe')
            ->add('dateNaissance', DateType::class, array(
                'widget' => 'single_text',
            ))
            ->add('lieuNaissance')
            ->add('nationalite')
            ->add('adresse')
            ->add('telephone')
            ->add('email')
            ->add('classe', EntityType::class, array(
                'class'=>'EinscriptionBundle\Entity\Classe',
                'choice_label'=>'libelle',
                'expanded'=>false,
                'multiple'=>false
            ))
            /*->add('frais_inscription', EntityType::class, array(
                'class'=>'EinscriptionBundle\Entity\Frais_Inscription',
                'choice_label'=>'montant',
                'expanded'=>false,
                'multiple'=>false
            ))
             * 
             */
            ->add('correspondant', CorrespondantType::class);

    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EinscriptionBundle\Entity\Etudiant'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'einscriptionbundle_etudiant';
    }


}
