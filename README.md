# ICS\CryptoBundle : new Bundle# crypto-bundle
Bundle de gestion de cryptos monnaies multi-plateforme
Synfony 5.4
Php >=7.4.29

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

Add bundle to your developpement application

composer require ics/crypto-bundle


les  : 
 "easycorp/easyadmin-bundle": "^3.5",
 "ics/crypto-bundle": "^0.0.1",
 "ics/libs-bundle": "^0.0.1",
 "ics/medias-bundle": "^0.0.6",
 "ics/ssi-bundle": "^0.2.6",
 "ics/tools-bundle": "^0.0.1",
