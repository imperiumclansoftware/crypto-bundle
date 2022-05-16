<?php

namespace ICS\CryptoBundle\Controller\Admin;

use ICS\CelebrityBundle\Entity\Vente;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use ICS\CryptoBundle\Entity\Crypto\Token\Api;

class ApiCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Api::class;
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
