<?php

namespace ICS\CryptoBundle\Form\Type\Token;

use ICS\CryptoBundle\Entity\Crypto\Token\LogoCrypto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LogoCryptoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add(
                'logoCrypto',
                TextType::class,
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
            'data_class' => LogoCrypto::class,
        ]);
    }
}