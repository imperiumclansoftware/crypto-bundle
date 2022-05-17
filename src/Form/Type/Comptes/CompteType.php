<?php

namespace ICS\CryptoBundle\Form\Type\Comptes;

use ICS\CryptoBundle\Entity\Crypto\Comptes\Compte;
use ICS\CryptoBundle\Entity\Crypto\Comptes\logoExchange;
use ICS\CryptoBundle\Entity\Crypto\Comptes\TypePlateforme;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
                    'required' => false,
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
            'typePlateform',
            EntityType::class,[
                'class' => TypePlateforme::class,
                'label' => 'Type de plateforme',
                'required' => false,
            ]
        )
        ->add(
            'logoExchange',
            EntityType::class,[
                'class' => logoExchange::class,
                'label' => 'Type de plateforme',
                'required' => false,
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
