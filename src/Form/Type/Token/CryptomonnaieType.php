<?php

namespace ICS\CryptoBundle\Form\Type\Token;

use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\ORM\EntityRepository;
use ICS\CryptoBundle\Entity\Crypto\Token\Api;
use ICS\CryptoBundle\Entity\Crypto\Token\Concensus;
use ICS\CryptoBundle\Entity\Crypto\Token\Cryptomonnaie;
use ICS\CryptoBundle\Entity\Crypto\Token\LogoCrypto;
use ICS\CryptoBundle\Entity\Crypto\Token\Norme;
use ICS\CryptoBundle\Entity\Crypto\Token\PriceHistorique;
use ICS\CryptoBundle\Entity\Crypto\Token\Utilite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CryptomonnaieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add(
                'coin',
                TextType::class,
                [
                    'label' => false,
                    'required' => false,
                ]
            )
        ->add(
                'coinCourt',
                TextType::class,
                [
                    'label' => false,
                    'required' => false,
                ]
            )
            ->add(
                    'dateDebut',
                    DateTimeType::class,
                    [
                        'label' => false,
                        'required' => false,
                        'widget' => 'choice',
                    ]
            )
            ->add(
                    'dateFin',
                    DateTimeType::class,
                    [
                        'label' => false,
                        'required' => false,
                        'widget' => 'choice',
                    ]
            )     
            ->add('favoris',CheckboxType::class,[
                'label' => 'Favoris',
                'required' => false,
                'attr' => [
                    'data-toggle' => 'toggle',
                    'class' => 'chktoggle',
                    'data-on' => 'Oui',
                    'data-off' => 'Non',
                    'data-onstyle' => 'success',
                    'data-offstyle' => 'danger',
                    'data-size' => 'small',
                ],
            ])
            ->add(
                'utilite',
                EntityType::class,[
                    'class' => Utilite::class,
                    'label' => 'utilité',
                    'required' => false,
                    // 'placeholder' => "-- Sélectionnez l'utilité de cette Crypto --",
                    // 'empty_data' => null,
                    //--- pour filtrer (ex: order By, ASC, true/false)
                    // 'query_builder' => function (EntityRepository $er) {
                    //     return $er->CreateQueryBuilder('choixUtilite')
                    //             ->where('choixUtilite.actif = true')
                    //             ->orderBy('choixUtilite.utilite', 'ASC');
                    // },
                ])
                ->add(
                    'api',
                    EntityType::class,[
                        'class' => Api::class,
                        'label' => 'api',
                        'required' => false,
                ])
                ->add(
                    'concensus',
                    EntityType::class,[
                        'class' => Concensus::class,
                        'label' => 'Consensus',
                        'required' => false,
                ])
                ->add(
                    'priceHistorique',
                    EntityType::class,[
                        'class' => PriceHistorique::class,
                        'label' => 'Price',
                        'required' => false,
                ])
                ->add(
                    'setNorme',
                    EntityType::class,[
                        'class' => Norme::class,
                        'label' => 'norme',
                        'required' => false,
                ])
                ->add(
                    'logoCrypto',
                    EntityType::class,[
                        'class' => LogoCrypto::class,
                        'label' => 'logoCrypto',
                        'required' => false,
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cryptomonnaie::class,
        ]);
    }
}