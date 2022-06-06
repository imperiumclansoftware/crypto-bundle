<?php

namespace ICS\CryptoBundle\Form\Type\Comptes;

use ICS\CryptoBundle\Entity\Crypto\Comptes\Compte;
use ICS\CryptoBundle\Entity\Crypto\Comptes\TypePlateforme;
use ICS\CryptoBundle\Entity\Crypto\Users\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
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
                    'html5' => false,
                    'attr' => [
                        'class' =>'datepicker '
                    ],
                ]
            )
        ->add(
                'cloture',
                DateType::class,
                [
                    'label' => false,
                    'required' => false,
                    'widget' => 'single_text',
                    'html5' => false,
                    'attr' => [
                        'class' =>'datepicker '
                    ],
                ]
            )   
        ->add(
                'fondGarantie',
                CheckboxType::class,
                [
                    'label_attr' => [
                        'class' => 'checkbox-inline checkbox-switch ',
                        'Yes' => true,
                        'No' => false,
                        'Maybe' => null,
                    ],
                ]
            )
        ->add(
                'montantGarantie',
                NumberType::class,
                [
                    'label' => 'montant du fond de garantie',
                    'required' => false,
                ]
            )
        ->add(
                'typePlateforme',
                EntityType::class,
                [
                    'class' => TypePlateforme::class,
                    'label' => false,
                    'required' => true,
                    'placeholder'=> 'Choisir un type de plateforme'
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
