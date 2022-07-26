<?php

    namespace ICS\CryptoBundle\Controller;
    
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    
    
    class DefaultController extends AbstractController
    {
        /**
         * --- Page de construction ---
         * @Route("/construction", name="ics_crypto_construction")
         * @author Philippe Basuyau
         */
        public function construction()
        {
            return $this->render("@Crypto\default\construction.html.twig",[

            ]);
        }//--- Fin de la function constuction

        /**
         * --- Page de administration ---
         * @Route("/administration", name="ics_crypto_administration")
         * @author Philippe Basuyau
         */
        public function administration()
        {
            return $this->render("@Crypto\default\administration.html.twig",[

            ]);
        }//--- Fin de la function administration

        /**
         * --- Page d'accueil / dashbord ---
         * @Route("/dashboard", name="ics_crypto_dashboard")
         * @author Philippe Basuyau
         */
        public function dashboard()
        {
            return $this->render("@Crypto\default\dashboard.html.twig",[

            ]);
        }//--- Fin de la function dashboard

        /**
         * --- Informations plus détaillés sur certaines cryptos ---
         * @Route("/information", name="ics_crypto_information")
         * @author Philippe Basuyau
         */
        public function information()
        {
            return $this->render("@Crypto\information\infoChart.html.twig",[

            ]);
        }//--- Fin de la function information

        /**
         * --- Les 100 plus grosses capitalisations de la cryptomonnaie ---
         * @Route("/capitalisation", name="ics_crypto_capitalisation")
         * @author Philippe Basuyau
         */
        public function capitalisation()
        {
            return $this->render("@Crypto\information\capitalisation.html.twig",[

            ]);
        }//--- Fin de la function capitalisation

        /**
         * --- Sructure de base pour tout CryptoBundle ---
         * @Route("/", name="ics_crypto_homepage")
         * @author Philippe Basuyau
         */
        public function index()
        {
            return $this->render("@Crypto\default\default.html.twig",[

            ]);
        }//--- Fin de la function index

    }//--- Fin de la class DefaultController