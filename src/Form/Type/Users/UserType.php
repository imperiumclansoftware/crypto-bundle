<?php

namespace ICS\CryptoBundle\Form\Type\Users;

use ICS\CryptoBundle\Entity\Crypto\Users\User;
use ICS\CryptoBundle\form\Type\Users\ContactType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                    'name',
                    TextType::class,
                    [
                        'label' => false,
                        'required' => false,
                    ]
            )
            ->add(
                    'surname',
                    TextType::class,
                    [
                        'label' => false,
                        'required' => false,
                    ]
            )
            // ->add(
            //         'contact',
            //         CollectionType::class,
            //         [
            //             'entry_type' => ContactType::class,
            //             'entry_options' => [
            //                 'label' => false,
            //                 'showTel' => true,
            //                 'showAdressMail' => true,
            //             ],
            //             'label' => false,
            //             'allow_add' => true,
            //             'allow_delete' => true,
            //         ]
            // )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
