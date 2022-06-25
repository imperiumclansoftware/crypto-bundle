<?php

namespace ICS\CryptoBundle\DataFixtures\Comptes;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use ICS\CryptoBundle\Entity\Crypto\Comptes\Plateforme;
use ICS\CryptoBundle\Entity\Crypto\Comptes\TypePlateforme;
use ICS\CryptoBundle\DataFixtures\Comptes\TypePlateformeFixtures;

class PlateformesFixtures extends Fixture implements DependentFixtureInterface, FixtureGroupInterface
{
    public function load(ObjectManager $manager)
    {
        // $plateForme = new Plateforme();
        // $plateForme->setLibelle('Coinbase');
        // $manager->persist($plateForme);
        
        // $plateForme = new Plateforme();
        // $plateForme->setLibelle('MetaMask');
        // $manager->persist($plateForme);

        // $plateForme = new Plateforme();
        // $plateForme->setLibelle('Binance');
        // $manager->persist($plateForme);

        // $plateForme = new Plateforme();
        // $plateForme->setLibelle('CryptoCom');
        // $manager->persist($plateForme);

        // $plateForme = new Plateforme();
        // $plateForme->setLibelle('Ledger');
        // $manager->persist($plateForme);

        // $plateForme = new Plateforme();
        // $plateForme->setLibelle('Kraken');
        // $manager->persist($plateForme);

        for ($i = 1; $i <= 4; ++$i) {
            // on récupére les infos nécessaires pour le rempliassage de l'objet
            $type=$manager->getRepository(TypePlateforme::class)->findAll();

            $plateForme = new Plateforme();
            $plateForme->setLibelle('CryptoCom N°'.$i);
            $plateForme->setTypes($type[$i]);

            $manager->persist($plateForme);
        }
        $manager->flush();
    }
    
    public function getDependencies()
    {
        return [
            TypePlateformeFixtures::class,
        ];
    } // Fin de la function getDependencies

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