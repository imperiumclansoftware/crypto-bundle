<?php

namespace ICS\CryptoBundle\DataFixtures\Users;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use ICS\CryptoBundle\Entity\Crypto\Users\Contact;
use ICS\CryptoBundle\Entity\Crypto\Users\User;
use ICS\CryptoBundle\DataFixtures\Users\ContactFixtures;

class UserFixtures extends Fixture implements DependentFixtureInterface, FixtureGroupInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 5; ++$i) {
            // on récupére les infos nécessaires pour le rempliassage de l'objet
            $contact=$manager->getRepository(Contact::class)->findAll();

            $user = new User();
            $user->setName('Bob - '.$i);
            $user->setSurname('Léponge - '.$i);
            $user->setContacts($contact[$i]);

            $manager->persist($user);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ContactFixtures::class,
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
        