<?php

namespace ICS\CryptoBundle\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use ICS\CryptoBundle\Entity\Crypto\Calcul\Achat;

class AchatCrudControler extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Achat::class;
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

