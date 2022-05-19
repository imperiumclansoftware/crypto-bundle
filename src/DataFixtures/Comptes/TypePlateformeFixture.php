<?php

namespace ICS\CryptoBundle\DataFixtures\Comptes;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use ICS\CryptoBundle\Entity\Crypto\Comptes\TypePlateforme;

class TypePlateformeFixture extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager)
    {
        $typePlateforme = new TypePlateforme();
        $typePlateforme->setLibelle('Mobile / Tablette');
        $manager->persist($typePlateforme);

        $typePlateforme = new TypePlateforme();
        $typePlateforme->setLibelle('Ordinateur');
        $manager->persist($typePlateforme);

        $typePlateforme = new TypePlateforme();
        $typePlateforme->setLibelle('Tout support');
        $manager->persist($typePlateforme);

        $typePlateforme = new TypePlateforme();
        $typePlateforme->setLibelle('Autre');
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