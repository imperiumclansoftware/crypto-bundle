<?php

namespace ICS\CryptoBundle\Form\Type\Users;

use ICS\CryptoBundle\Entity\Crypto\Users\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                    'tel',
                    TextType::class,
                    [
                        'label' => false,
                        'required' => false,
                        'attr' => [
                            'class' => 'phone',
                            'placeholder' => '(+33) 6 10 20 30 40',
                            'data.mask' => '0 00 00 00 00', ],
                    ]
            )
            ->add(
                    'adressmail',
                    EmailType::class,
                    [
                        'label' => 'Email ',
                        'required' => false,
                    ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
