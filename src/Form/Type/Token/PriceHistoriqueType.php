<?php

namespace ICS\CryptoBundle\Form\Type\Token;

use ICS\CryptoBundle\Entity\Crypto\Token\PriceHistorique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PriceHistoriqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add(
                'price',
                NumberType::class,
                [
                    'label' => false,
                    'required' => false,
                ]
            )
        ->add(
                'date',
                DateTimeType::class,
                [
                    'label' => false,
                    'required' => false,
					'widget' => 'choice',
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PriceHistorique::class,
        ]);
    }
}