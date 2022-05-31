<?php

    namespace ICS\CryptoBundle\Controller;
    
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    
    
    class DefaultController extends AbstractController
    {
        /**
         * @Route("/construction", name="ics_crypto_construction")
         * @author Philippe Basuyau
         */
        public function construction()
        {
            return $this->render("@Crypto\default\construction.html.twig",[

            ]);
        }//--- Fin de la function constuction

        /**
         * @Route("/information", name="ics_crypto_information")
         * @author Philippe Basuyau
         */
        public function information()
        {
            return $this->render("@Crypto\information\infoChart.html.twig",[

            ]);
        }//--- Fin de la function constuction

        /**
         * @Route("/capitalisation", name="ics_crypto_capitalisation")
         * @author Philippe Basuyau
         */
        public function capitalisation()
        {
            return $this->render("@Crypto\information\capitalisation.html.twig",[

            ]);
        }//--- Fin de la function constuction

        /**
         * @Route("/", name="ics_crypto_homepage")
         * @author Philippe Basuyau
         */
        public function index()
        {
            return $this->render("@Crypto\default\default.html.twig",[

            ]);
        }//--- Fin de la function index

    }//--- Fin de la class DefaultController