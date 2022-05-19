<?php

namespace ICS\CryptoBundle\DataFixtures\Comptes;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use ICS\CryptoBundle\Entity\Crypto\Comptes\Plateforme;

class PlateformesFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager)
    {
        $plateForme = new Plateforme();
        $plateForme->setLibelle('Coinbase');
        $manager->persist($plateForme);
        
        $plateForme = new Plateforme();
        $plateForme->setLibelle('MetaMask');
        $manager->persist($plateForme);

        $plateForme = new Plateforme();
        $plateForme->setLibelle('Binance');
        $manager->persist($plateForme);

        $plateForme = new Plateforme();
        $plateForme->setLibelle('CryptoCom');
        $manager->persist($plateForme);

        $plateForme = new Plateforme();
        $plateForme->setLibelle('Ledger');
        $manager->persist($plateForme);

        $plateForme = new Plateforme();
        $plateForme->setLibelle('Kraken');
        $manager->persist($plateForme);

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