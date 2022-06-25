<?php

namespace ICS\CryptoBundle\DataFixtures\Comptes;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use ICS\CryptoBundle\Entity\Crypto\Comptes\TypePlateforme;

class TypePlateformeFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager)
    {
        $typePlateforme = new TypePlateforme();
        $typePlateforme->setLibelle('Mobile');
        $typePlateforme->setIcon('fas fa-mobile-alt');
        $manager->persist($typePlateforme);
        
        $typePlateforme = new TypePlateforme();
        $typePlateforme->setLibelle('Tablette');
        $typePlateforme->setIcon('fas fa-tablet-alt');
        $manager->persist($typePlateforme);

        $typePlateforme = new TypePlateforme();
        $typePlateforme->setLibelle('Ordinateur');
        $typePlateforme->setIcon('fal fa-desktop');
        $manager->persist($typePlateforme);

        $typePlateforme = new TypePlateforme();
        $typePlateforme->setLibelle('Tout support');
        $typePlateforme->setIcon('fal fa-ballot');
        $manager->persist($typePlateforme);

        $typePlateforme = new TypePlateforme();
        $typePlateforme->setLibelle('Autre');
        $typePlateforme->setIcon('fas fa-business-time');
        $manager->persist($typePlateforme);

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return [
            'dev',
            'reference',
            'cryptoBundle',
            'cryptoBundleReference',
        ];
    }

}