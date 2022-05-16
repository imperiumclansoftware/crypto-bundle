<?php

namespace ICS\CryptoBundle\Controller\Admin;

use ICS\CelebrityBundle\Entity\Vente;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VenteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vente::class;
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
