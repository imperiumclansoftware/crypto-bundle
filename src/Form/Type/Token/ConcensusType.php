<?php

namespace ICS\CryptoBundle\Form\Type\Token;

use ICS\CryptoBundle\Entity\Crypto\Token\Concensus;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConcensusType extends AbstractType
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
                'description',
                TextareaType::class,
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Concensus::class,
        ]);
    }
}