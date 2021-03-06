<?php

namespace ICS\CryptoBundle\Form\Type\Token;

use Doctrine\DBAL\Types\FloatType;
use ICS\CryptoBundle\Entity\Crypto\Token\Api;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add(
                'rang',
                TextType::class,
                [
                    'label' => false,
                    'required' => false,
                ]
            )
        ->add(
                'coin',
                TextType::class,
                [
                    'label' => false,
                    'required' => false,
                ]
            )

        ->add(
                'libelleCoin',
                TextType::class,
                [
                    'label' => false,
                    'required' => false,
                ]
            )
        ->add(
                'prixMarche',
                NumberType::class,
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
            'data_class' => Api::class,
        ]);
    }
}
