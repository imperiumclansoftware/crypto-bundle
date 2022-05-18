<?php

namespace ICS\CryptoBundle\DataFixtures\Token;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use Symfony\Component\HttpKernel\KernelInterface;
use ICS\CryptoBundle\Entity\Crypto\Token\Norme;

class NormeFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager)
    {
        $norme = new Norme();
        $norme->setLibelle('ERC-20');
        $norme->setDescription('Améliorer le processus d’utilisation de la plateforme Ethereum - Le token privilégié des ICO - L’avantage de ce standard est que la grande majorité des smart contracts et des DApps – applications décentralisées – peuvent interagir avec un token ERC-20 de manière native, sans avoir besoin de détails sur le token. De ce fait, un smart contract implémentant ce standard pourra être plus facilement listé sur une plateforme d’échange, sans travail additionnel d’intégration.');
        $norme->setGravity('primary');
        $manager->persist($norme);
    
        $norme = new Norme();
        $norme->setLibelle('ERC-721');
        $norme->setDescription('Pour le NFT - Jeton non fongible - Les jetons sont uniques  - On cherche à répondre à d’autres cas d’usages, qui nécessitent des tokens non identiques ayant des paramètres propres et une valeur différente - Ce standard pourrait être utilisé dans de nombreux autres domaines d’applications comme la gestion de licences logiciel ou de l’art de manière digitale.');
        $norme->setGravity('primary');
        $manager->persist($norme);
    
        $norme = new Norme();
        $norme->setLibelle('ERC-190');
        $norme->setDescription('Pour les contrats intelligents');
        $norme->setGravity('warning');
        $manager->persist($norme);
    
        $norme = new Norme();
        $norme->setLibelle('ERC-181');
        $norme->setDescription('Pour les adresses ');
        $norme->setGravity('primary');
        $manager->persist($norme);
    
        $norme = new Norme();
        $norme->setLibelle('ERC-162');
        $norme->setDescription('Pour le hachage ');
        $norme->setGravity('success');
        $manager->persist($norme);
    
        $norme = new Norme();
        $norme->setLibelle('ERC-223');
        $norme->setDescription('Éviter la perte accidentelle de tokens, lors de l’envoi d’un token vers un smart contract qui n’est pas conçu pour fonctionner avec le token envoyé. Utilisant la gestion d’événements, ERC-223 permet d’annuler une transaction qui mènerait à la perte des tokens, avant que celle-ci ne se produise. Le standard permet une consommation réduite du gas lors des transferts en comparaison avec les tokens ERC-20.');
        $norme->setGravity('info');
        $manager->persist($norme);
    
        $norme = new Norme();
        $norme->setLibelle('ERC-777');
        $norme->setDescription('Le token standard sécuritaire - Une meilleure traçabilité pour les smart contracts quant à l’origine des tokens reçus, très utile s’il était nécessaire de les renvoyer - Permet de gérer la réception de tokens non-compatibles par un smart contract sans bloquer les fonds.');
        $norme->setGravity('secondary');
        $manager->persist($norme);
    
        $norme = new Norme();
        $norme->setLibelle('ERC-1400');
        $norme->setDescription('Le standard des securities tokens - Des fonctions qui permettent de gérer une bibliothèque de documents associés au token. Ces documents peuvent être des documents juridiques ou d’autres documents de référence - La norme fournit une fonction pour déterminer si un transfert va aboutir, et renvoie les détails indiquant la raison pour laquelle le transfert n’est pas valide dans le cas contraire.');
        $norme->setGravity('danger');
        $manager->persist($norme);

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