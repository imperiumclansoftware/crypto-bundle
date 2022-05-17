<?php

namespace ICS\CryptoBundle\Form\Type\Token;

use ICS\CryptoBundle\Entity\Crypto\Token\Norme;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NormeType extends AbstractType
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
            'data_class' => Norme::class,
        ]);
    }
}