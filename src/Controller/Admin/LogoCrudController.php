<?php

namespace ICS\CryptoBundle\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use ICS\CryptoBundle\Entity\Crypto\Token\LogoCrypto;

class LogoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LogoCrypto::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}

