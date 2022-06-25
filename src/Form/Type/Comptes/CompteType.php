<?php

namespace ICS\CryptoBundle\Form\Type\Comptes;

use ICS\CryptoBundle\Entity\Crypto\Comptes\Compte;
use ICS\CryptoBundle\Entity\Crypto\Comptes\Plateforme;
use ICS\CryptoBundle\Entity\Crypto\Comptes\TypePlateforme;
use ICS\CryptoBundle\Entity\Crypto\Users\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $choixYesNo = [
            'Oui' => '1',
            'Non' => '0',
        ];

        $builder

        ->add(
                'nameCompte',
                TextType::class,
                [
                    'label' => false,
                    'required' => true,
                ]
            )
        ->add(
                'observation',
                TextareaType::class,
                [
                    'label' => false,
                    'required' => false,
                ]
            )
        ->add(
                'ouverture',
                DateTimeType::class,
                [
                    'label' => false,
                    'widget' => 'single_text',
                    'required' => false,
                    'html5' => false,
                    'attr' => [
                        'class' =>'datepicker '
                    ],
                ]
            )
        // ->add(
        //         'cloture',
        //         DateType::class,
        //         [
        //             'label' => false,
        //             'required' => false,
        //             'widget' => 'single_text',
        //             'html5' => false,
        //             'attr' => [
        //                 'class' =>'datepicker '
        //             ],
        //         ]
        //     )   
        // ->add(
        //         'fondGarantie',ChoiceType::class, [
        //             'choices' => $choixYesNo,
        //             'expanded' => true,
        //             'label' => false,
        //             'label_attr' => ['class' => 'radio-inline cursseur '],
        //             'attr' => ['class' => 'radio-inline '],
        //         ])
        ->add(
                'fondGarantie', ChoiceType::class, [
                    'choices' => $choixYesNo,
                    'label' => false,
                    'label_attr' => ['class' => 'checkbox-inline cursseur'],
                    'multiple' => false,
                    'expanded' => true,
                    'attr' => ['class' => 'checkbox-inline'],
                    'required' => true,
                ])
        // ->add(
        //         'fondGarantie',
        //         CheckboxType::class,
        //         [   'label' => false,
        //             'label_attr' => [
        //                 'class' => 'checkbox-inline checkbox-switch ',
        //         ]
        //     )
        ->add(
                'montantGarantie',
                NumberType::class,
                [
                    'label' => 'montant du fond de garantie',
                    'required' => false,
                ]
            )
        ->add(
                'plateformes',
                EntityType::class,
                [
                    'class' => Plateforme::class,
                    'label' => false,
                    'required' => true,
                    'placeholder'=> 'Choisir une plateforme'
                ]
            )
        ->add(
                'user',
                EntityType::class,
                [
                    'class' => User::class,
                    'label' => false,
                    'required' => false,
                    'placeholder'=> 'Choisir un utilisateur'
                ]
            ) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Compte::class,
        ]);
    }
}
