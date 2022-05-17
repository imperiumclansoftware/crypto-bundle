<?php

namespace ICS\CryptoBundle\Form\Type\Comptes;

use ICS\CryptoBundle\Entity\Crypto\Comptes\Plateforme;
use ICS\CryptoBundle\Entity\Crypto\Users\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlateformeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add(
                'libelle',
                TextType::class,
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
                'required' => false,
                'widget' => 'choice',
            ]
        )
        ->add(
            'cloture',
            DateTimeType::class,
            [
                'label' => false,
                'required' => false,
                'widget' => 'choice',
            ]
        )  
        ->add(
            'ouverturCpt',
            DateTimeType::class,
            [
                'label' => false,
                'required' => false,
                'widget' => 'choice',
            ]
        )
        ->add(
            'clotureCpt',
            DateTimeType::class,
            [
                'label' => false,
                'required' => false,
                'widget' => 'choice',
            ]
        )  
        ->add(
            'fondGarantie',
            CheckboxType::class,
            [
                'label' => "fond de garantie",
                'required' => false,
            ]
        )
        ->add(
                'montantGarantie',
                NumberType::class,
                [
                    'label' => false,
                    'required' => false,
                ]
            )
        ->add(
            'gravity',
            TextType::class,
            [
                'label' => false,
                'required' => false,
            ]
        )
        ->add(
                'description',
                TextareaType::class,
                [
                    'label' => false,
                    'required' => false,
                ]
            )
        ->add(
            'user',
            EntityType::class,[
                'class' => User::class,
                'label' => 'user',
                'required' => false,
        ])   
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Plateforme::class,
        ]);
    }
}
