<?php

namespace ICS\CryptoBundle\Form\Type\Comptes;

use ICS\CryptoBundle\Entity\Crypto\Comptes\logoExchange;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LogoExchangeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add(
                'logoExchange',
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
            'data_class' => logoExchange::class,
        ]);
    }
}