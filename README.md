# ICS\CryptoBundle : new Bundle# crypto-bundle
Bundle de gestion de cryptos monnaies multi-plateforme
Synfony 5.4
Php >=7.4.29
font-awesome 6.1.1

Add bundle to your developpement application

    composer require ics/crypto-bundle
    
Installation for developpement

Add local repository to composer.json developpement application

    {
        "repositories": [
            {
                "type": "...",
                "url": "..."
            }, 
            {
                "type": "path",
                "url": "D:\\Developpement\\crypto-bundle\\"
            }
            {
                "type": "...",
                "url": "..."
            }
        ]
    }


Version: 
         "easycorp/easyadmin-bundle": "^3.5",
         "ics/crypto-bundle": "^0.0.1",
         "ics/libs-bundle": "^0.0.1",
         "ics/medias-bundle": "^0.0.6",
         "ics/ssi-bundle": "^0.2.6",
         "ics/tools-bundle": "^0.0.1",
         
Pour le menu et la homepage de easyAdmin
dashboardController.php
        public function configureMenuItems(): iterable
        {
            yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

            yield MenuItem::section('Crypto','fab fa-bitcoin');
            yield MenuItem::linkToCrud('Crypto','fas fa-coins', Cryptomonnaie::class);
            yield MenuItem::linkToCrud('Compte','fas fa-piggy-bank', Compte::class);
            yield MenuItem::linkToCrud('Opération','fas fa-calculator', Operation::class);
            yield MenuItem::linkToCrud('Type','fab fa-elementor', Type::class);
            // yield MenuItem::linkToCrud('Logo_Exchange','fab fa-reddit', logoExchange::class);
            yield MenuItem::linkToCrud('Plateforme','fas fa-expand', Plateforme::class);
            yield MenuItem::linkToCrud('Type de plateforme','fas fa-expand-arrows-alt', TypePlateforme::class);
            yield MenuItem::linkToCrud('Api','fas fa-file-invoice-dollar', Api::class);
            // yield MenuItem::linkToCrud('Concensus','fas fa-list-alt', Concensus::class);
            yield MenuItem::linkToCrud('Logo Crypto','fab fa-reddit-square', LogoCrypto::class);
            // yield MenuItem::linkToCrud('Norme','fas fa-barcode', Norme::class);
            // yield MenuItem::linkToCrud('Historique Prix','fas fa-landmark', PriceHistorique::class);
            yield MenuItem::linkToCrud('Utilité','far fa-object-group', Utilite::class);
            yield MenuItem::linkToCrud('Contact','fas fa-address-book', Contact::class);
            yield MenuItem::linkToCrud('Utilisateurs','fas fa-user-friends', User::class);
            // yield MenuItem::linkToCrud(),

            // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
            //Ssi
            yield MenuItem::section('Security', 'fa fa-shield');
            yield MenuItem::linkToCrud('Accounts', 'fa fa-user-circle', Account::class);
            yield MenuItem::linkToCrud('Logs', 'fa fa-newspaper', EntityLog::class);
            //Media
            // yield MenuItem::section('Medias', 'fa fa-photo-video');
            //yield MenuItem::linkToCrud('Files', 'fa fa-file', MediaFile::class);
            //yield MenuItem::linkToCrud('Pictures', 'fa fa-photo', MediaImage::class);        

            yield MenuItem::section('users');
            yield MenuItem::linkToCrud('Accounts', 'fa fa-user-circle', Account::class);

        }
         
