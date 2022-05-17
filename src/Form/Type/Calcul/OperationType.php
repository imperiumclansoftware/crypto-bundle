<?php

namespace ICS\CryptoBundle\Form\Type\Calcul;

use ICS\CryptoBundle\Entity\Crypto\Calcul\Operation;
use ICS\CryptoBundle\Entity\Crypto\Comptes\Plateforme;
use ICS\CryptoBundle\Entity\Crypto\Token\Cryptomonnaie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OperationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add(
                'date',
                DateTimeType::class,
                [
                    'label' => false,
                    'required' => false,
                    'widget' => 'choice',
                ]
            )
            ->add(
                    'nbrUnite',
                    NumberType::class,
                    [
                        'label' => false,
                        'required' => false,
                    ]
                )
                ->add(
                        'prixUnitaire',
                        NumberType::class,
                        [
                            'label' => false,
                            'required' => false,
                        ]
                )
                ->add(
                        'prixGlobal',
                        NumberType::class,
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
                ->add(
                    'euroAchate',
                    NumberType::class,
                    [
                        'label' => false,
                        'required' => false,
                    ]
                )
                ->add(
                    'euroAchat',
                    NumberType::class,
                    [
                        'label' => false,
                        'required' => false,
                    ]
                )
                ->add(
                    'cryptoAchat',
                    EntityType::class,[
                        'class' => Cryptomonnaie::class,
                        'label' => 'Crypto achat',
                        'required' => false,
                    ]
                )
                ->add(
                    'plateforme',
                    EntityType::class,[
                        'class' => Plateforme::class,
                        'label' => 'Plateforme',
                        'required' => false,
                    ]
                )
                ->add(
                    'cryptoAchete',
                    EntityType::class,[
                        'class' => Cryptomonnaie::class,
                        'label' => 'Crypto achat',
                        'required' => false,
                    ]
                )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Operation::class,
        ]);
    }
}
