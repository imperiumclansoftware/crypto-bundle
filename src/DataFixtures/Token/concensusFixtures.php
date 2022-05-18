<?php

namespace ICS\CryptoBundle\DataFixtures\Token;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use ICS\CryptoBundle\Entity\Crypto\Token\Concensus;

class ConsensusFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager)
    {
        $concensus = new Concensus();
        $concensus->setLibelle('Proof of Work');
        $concensus->setDescription('Preuves externe - PoW - Preuve de Travail - Le système de validation par preuve de travail a été le premier consensus existant dans le monde des crypto-monnaies. Bitcoin (BTC)');
        $manager->persist($concensus);
    
        $concensus = new Concensus();
        $concensus->setLibelle('Proof of Capacity');
        $concensus->setDescription("Preuves externe - PoC - Preuve de capacité - La preuve de capacité, aussi appelée preuve d'espace (proof of space) ou preuve de stockage (proof of storage), est une alternative à la preuve de travail qui se base, non pas sur la dépense énergétique des machines validatrices, mais sur leur capacité à garder en mémoire des données. Burst (SIGNA)");
        $manager->persist($concensus);

        $concensus = new Concensus();
        $concensus->setLibelle('Proof of Stake');
        $concensus->setDescription("Preuves internes - PoS - Preuve d'Enjeu - C'est la deuxième méthode pour sélectionner les personnes participant au consensus après la preuve de travail. Le but est de réduire considérablement les dépenses énergétiques par rapport à la preuve de travail, tout en assurant une sécurité acceptable. Algorand (ALGO)");
        $manager->persist($concensus);

        $concensus = new Concensus();
        $concensus->setLibelle('Proof of Hold');
        $concensus->setDescription("Preuves internes - PoH - Preuve de Conservation - La preuve de conservation, ou proof of hold (PoH), est une variante de la preuve d'enjeu qui se base sur le montant des jetons qu'une personne possède multiplié par le temps où ces jetons n'ont pas bougé. Cette métrique s'appelle l'âge des pièces (coin age). Peercoin (PPC)");
        $manager->persist($concensus);

        $concensus = new Concensus();
        $concensus->setLibelle('Proof of Service');
        $concensus->setDescription("Preuves internes - PoSe - La preuve de service est un modèle de preuve d'enjeu qui, outre la possession de jetons, demande au nœud du réseau intéressé de fournir un service défini par le protocole, comme le mélange de jetons ou le maintien d'une infrastructure supplémentaire. Les nœuds se chargeant de ce service sont appelés les masternodes. Dash (DASH) ");
        $manager->persist($concensus);

        $concensus = new Concensus();
        $concensus->setLibelle('Delegated Proof of Stake');
        $concensus->setDescription("Preuves internes - DPoS - Preuve d'Enjeu Déléguée - Dans un consensus par Delegated Proof of Stake, les détenteurs des jetons peuvent élire des délégués qui valideront les transactions à leur nom. De ce fait, seul un petit nombre d'individus valide les transactions, ce qui rend le système plus rapide. Neo (NEO)/EOS (EOS)");
        $manager->persist($concensus);

        $concensus = new Concensus();
        $concensus->setLibelle('Liquid Proof of Stake');
        $concensus->setDescription("Preuves internes - LPoS - Preuve d'Enjeu Liquide - La preuve d'enjeu liquide, appelée liquid proof of stake en anglais, est une variante de la preuve d'enjeu déléguée qui permet aux utilisateurs qui délèguent leurs jetons de toucher une récompense proportionnelle au montant mis en jeu. XTZ/ADA");
        $manager->persist($concensus);

        $concensus = new Concensus();
        $concensus->setLibelle('Proof of Importance');
        $concensus->setDescription("Preuves internes - PoI - Preuve d'Importance - Le consensus de la preuve d'importance est une version lourdement modifiée de la preuve d'enjeu, avec des mécanismes différents qui prennent en compte différents critères. En effet, le principe est le même : la capacité de validation des blocs dépend de la quantité de jetons possédée. Mais il y a une spécificité : au lieu de simplement compter ceux présents sur l'adresse, le mécanisme de la preuve d'importance ne prend en compte que les jetons qui ont été présents sur l'adresse un certain temps. NEM (XEM)");
        $manager->persist($concensus);

        $concensus = new Concensus();
        $concensus->setLibelle('Proof of Authority');
        $concensus->setDescription("Preuves internes - PoA - Preuve d'Autorité - Dans un consensus basé sur la preuve d'autorité, les blocs et les transactions sont validés par des comptes approuvés à l'avance. Le processus est automatique et mis à part le fait de vérifier que l'ordinateur n'est pas compromis, il n'y a rien d'autre à faire. Stellar/XRP/VET");
        $manager->persist($concensus);

        $concensus = new Concensus();
        $concensus->setLibelle('BFT');
        $concensus->setDescription("Preuves internes - Les consensus traditionnels - PBFT/FBA(Rippel)/LibraBFT(Libra)/Plenum - Cette famille d'algorithmes a été développée dans les années 1980, donc bien avant Bitcoin. Ces algorithmes sont reconnaissables par le fait qu'on insiste souvent sur leur tolérance aux pannes byzantines, ou Byzantine fault tolerance abrégé en BFT, du fait qu'ils résolvent le problème des généraux byzantins (dans un cadre restreint). ");
        $manager->persist($concensus);

        $concensus = new Concensus();
        $concensus->setLibelle('Nakamoto');
        $concensus->setDescription("Ethash(Ethereum)/Emmy+(Tezos) - L'algorithme de consensus de Nakamoto par preuve de travail a été révélé au monde en 2008 avec la publication du livre blanc de Bitcoin. Celui-ci a été copié et modifié par plusieurs protocoles.");
        $manager->persist($concensus);

        $concensus = new Concensus();
        $concensus->setLibelle('Directed Acyclic Graphs');
        $concensus->setDescription("Preuves internes - DAG - Les Graphes Orientés Acycliques - Dans la structure des DAG, les transactions peuvent être ajoutées en parallèle, chaque transaction confirmant un certain nombre de blocs précédents.");
        $manager->persist($concensus);

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