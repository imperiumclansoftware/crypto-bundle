<?php

namespace ICS\CryptoBundle\DataFixtures\Users;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use ICS\CryptoBundle\Entity\Crypto\Users\Contact;

class ContactFixtures extends Fixture implements  FixtureGroupInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; ++$i) {
            $contact = new Contact();
            $contact->setTel('062024320'.$i);
            $contact->setAdressMail('bob.leponge'.$i.'@toto.fr');
            $manager->persist($contact);

            $this->addReference('contact'.$i, $contact);
        }
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
        