<?php

namespace ICS\CryptoBundle\DataFixtures\Comptes;

use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use ICS\CryptoBundle\DataFixtures\Users\UserFixtures;
use ICS\CryptoBundle\DataFixtures\Comptes\PlateformesFixtures;
use ICS\CryptoBundle\Entity\Crypto\Comptes\Compte;
use ICS\CryptoBundle\Entity\Crypto\Comptes\Plateforme;
use ICS\CryptoBundle\Entity\Crypto\Users\User;

class CompteFixtures extends Fixture implements DependentFixtureInterface, FixtureGroupInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 3; ++$i) {
            // on récupére les infos nécessaires pour le rempliassage de l'objet
            $plateforme=$manager->getRepository(Plateforme::class)->findAll();
            $user=$manager->getRepository(User::class)->findAll();

            $compte = new Compte();
            $compte->setNameCompte('compte - '.$i);
            $compte->setObservation('Observation N° : '.$i);
            $compte->setOuverture(new DateTime());
            $compte->setCloture(new DateTime());
            $compte->setFondGarantie(true);
            $compte->setMontantGarantie('250'.$i);
            $compte->setPlateformes($plateforme[$i]);
            $compte->setUser($user[$i]);

            $manager->persist($compte);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            PlateformesFixtures::class,
            UserFixtures::class,
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
        