<?php

namespace ICS\CryptoBundle\Form\Type\Calcul;

use ICS\CryptoBundle\Entity\Crypto\Calcul\Gain;
use ICS\CryptoBundle\Entity\Crypto\Calcul\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GainType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'types',
                EntityType::class,[
                    'class' => Type::class,
                    'label' => 'type de gain',
                    'required' => false,
            ]) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Gain::class,
        ]);
    }
}
