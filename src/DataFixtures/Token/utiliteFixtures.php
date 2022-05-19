<?php

namespace ICS\CryptoBundle\DataFixtures\Token;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use ICS\CryptoBundle\Entity\Crypto\Token\Utilite;

class UtiliteFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager)
    {
        $utilite = new Utilite();
        $utilite->setUtilite('Moyen de paiement');
        $utilite->setDescription('Moyen de paiement - Sert à réaliser des transactions sans avoir besoin d’un organe de contrôle, c’est-à-dire sans un tiers de confiance (telle qu’une banque par exemple).');
        $manager->persist($utilite);
    
        $utilite = new Utilite();
        $utilite->setUtilite('Transfert de fond');
        $utilite->setDescription('Transfert de fond - Sert à réaliser des transactions sans avoir besoin d’un organe de contrôle, c’est-à-dire sans un tiers de confiance (telle qu’une banque par exemple).');
        $manager->persist($utilite);

        $utilite = new Utilite();
        $utilite->setUtilite('Stablecoins');
        $utilite->setDescription('Evite de transférer les fonds en monnaie fiduciaire - Evite les impôts');
        $manager->persist($utilite);

        $utilite = new Utilite();
        $utilite->setUtilite('Transaction');
        $utilite->setDescription("Sert de paiement pour l'action de vente de certain plateforme ");
        $manager->persist($utilite);
    
        $utilite = new Utilite();
        $utilite->setUtilite('Art');
        $utilite->setDescription('NFT - image ...');
        $manager->persist($utilite);

        $utilite = new Utilite();
        $utilite->setUtilite('Jeux');
        $utilite->setDescription('Pour les jeux vidéo');
        $manager->persist($utilite);

        $utilite = new Utilite();
        $utilite->setUtilite('Film');
        $utilite->setDescription("Pour les films");
        $manager->persist($utilite);

        $utilite = new Utilite();
        $utilite->setUtilite('Musique');
        $utilite->setDescription("Pour les musiques");
        $manager->persist($utilite);

        $utilite = new Utilite();
        $utilite->setUtilite('Infrastructure');
        $utilite->setDescription("Passerelle entre les différents protocoles");
        $manager->persist($utilite);

        $utilite = new Utilite();
        $utilite->setUtilite('Service');
        $utilite->setDescription("Service");
        $manager->persist($utilite);

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