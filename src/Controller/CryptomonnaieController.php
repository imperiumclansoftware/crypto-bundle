<?php

namespace ICS\CryptoBundle\Controller;

use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use ICS\CryptoBundle\Entity\Crypto\Token\Cryptomonnaie;
use ICS\CryptoBundle\Form\Type\Token\CryptomonnaieType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  Cryptomonnaie  controller ---
 *
 *  Cryptomonnaie
 *
 * @see /views/token/cryptomonnaie
 * @see /src/Entity/Crypto/Token/Cryptomonnaie.php
 * @see /src/Repository/CryptomonnaieRepository.php
 * @see /src/Service/CryptomonnaieService.php
 * @see /src/Form/Type/Token/CryptomonnaieType.php
 *
 * @author Philippe Basuyau 
 */
class CryptomonnaieController extends AbstractController
{
    /**
     * @Route("/token/cryptomonnaie", name="ics_crypto_token_cryptomonnaie_homepage", methods={"GET"})
     * @author Philippe Basuyau
     */
    public function index(EntityManagerInterface $em): Response
    {
        $cryptomonnaies = $em
            ->getRepository(Cryptomonnaie::class)
            ->findAll();

            return $this->render('token/cryptomonnaie/index.html.twig', [
                'cryptomonnaies' => $cryptomonnaies,
            ]);
    }//--- Fin de la function Index

    /**
     * --- AddAction ---
     * @Route("/token/cryptomonnaie/add", name="ics_crypto_token_cryptomonnaie_add")
     * @author Philippe Basuyau
     */
    public function addAction(Request $request, EntityManagerInterface $em): Response
    {
        $cryptomonnaie = new Cryptomonnaie();

        $form = $this->createForm(CryptomonnaieType::class, $cryptomonnaie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cryptomonnaie = $form->getData();

            $cryptomonnaie->setCoin();
            $cryptomonnaie->setCoinCourt();
            $cryptomonnaie->setDateDebut(new DateTime());
            $cryptomonnaie->setFavoris();
            $cryptomonnaie->setUtilite();
            $cryptomonnaie->setConcensus();
            $cryptomonnaie->setNorme();
            $cryptomonnaie->setLogoCrypto();

            $em->persist($cryptomonnaie);
            $em->flush();

            $this->addFlash('success',"La cryptomonnaie : ".$cryptomonnaie->getCoinCourt().' a bien été créé');

            return $this->redirectToRoute('crypto_token_cryptomonnaie_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('token/cryptomonnaie/form/form.html.twig', [
            'form' => $form->createView(),
            'cryptomonaie' => $cryptomonnaie,
        ]);
    } //--- Fin de la function addAction

    /**
     * --- EditAction ---
     * @Route("/token/cryptomonnaie/edit", name="ics_crypto_token_cryptomonnaie_edit", methods={"GET", "POST"} )
     * @author Philippe Basuyau
     */
    public function editAction(ManagerRegistry $doctrine, EntityManagerInterface $em, Request $request, $id,  Cryptomonnaie $cryptomonnaie): Response
    {
        $cryptomonnaie = $doctrine->getRepository(Cryptomonnaie::class)->find($id);

        $form = $this->createForm(CryptomonnaieType::class, $cryptomonnaie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cryptomonnaie = $form->getData();

            $em = $this->$em->getManager();
            $em->persist($cryptomonnaie);
            $em->flush();

            $this->addFlash('success', "La cryptomonnaie: ".$cryptomonnaie->getCoinCourt().' a bien été modifiée');

            return $this->redirectToRoute('crypto_token_cryptomonnaie_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('token/cryptomonnaie/form/form.html.twig', [
            'form' => $form->createView(),
            'cryptomonnaie' => $cryptomonnaie,
            ]);
    } //--- Fin de la function editAction

    /**
     * --- DeleteAction ---
     *
     * @Route("/token/cryptomonnaie/delete", name="ics_crypto_token_cryptomonnaie_delete", methods={"POST"})
     * @author Philippe Basuyau
     */
    public function deleteAction(Request $request, EntityManagerInterface $em, Cryptomonnaie $cryptomonnaie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cryptomonnaie->getId(), $request->request->get('_token'))) {
            $em->remove($cryptomonnaie);
            $em->flush();
        }
        $this->addFlash('warning', "La cryptomonnaie: ".$cryptomonnaie->getCoinCourt().'  a été supprimée.');

        return $this->redirectToRoute('crypto_token_cryptomonnaie_homepage', [], Response::HTTP_SEE_OTHER);
    }//--- Fin de la function Delete

}//--- Fin de la class CryptomonnaieController
