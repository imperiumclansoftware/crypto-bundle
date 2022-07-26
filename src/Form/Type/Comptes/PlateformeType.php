<?php

namespace ICS\CryptoBundle\Form\Type\Comptes;

use ICS\CryptoBundle\Entity\Crypto\Comptes\logoExchange;
use ICS\CryptoBundle\Entity\Crypto\Comptes\Plateforme;
use ICS\CryptoBundle\Entity\Crypto\Comptes\TypePlateforme;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
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
                    'required' => true,
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
        // ->add(
        //         'logoExchange',
        //         EntityType::class,[
        //             'class' => LogoExchange::class,
        //             'label' => 'Type de plateforme',
        //             'required' => false,
        //         ]
        //     )
        // ->add(
        //         'types',
        //         EntityType::class,[
        //             'class' => TypePlateforme::class,
        //             'label' => 'Type de plateforme',
        //             'required' => false,
        //             'multiple' => true,
        //             'expanded' => false
        //         ]
        //     )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Plateforme::class,
        ]);
    }
}
