<?php

    namespace ICS\CryptoBundle\Controller;
    
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    
    
    class DefaultController extends AbstractController
    {
        /**
         * @Route("/", name="ics-crypto-homepage")
         */
        public function index()
        {
            return $this->render("@Crypto\default\default.html.twig",[

            ]);
        }
    }