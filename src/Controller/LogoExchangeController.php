<?php

namespace ICS\CryptoBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use ICS\CryptoBundle\Entity\Crypto\Comptes\logoExchange;
use ICS\CryptoBundle\Form\Type\Comptes\LogoExchangeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  Logo des exchange  controller ---
 *
 * les logos corresponds au diver comptes
 *
 * @see /views/comptes/logoExchange
 * @see /src/Entity/Crypto/comptes/LogoExchange.php
 * @see /src/Form/Type/Comptes/LogoExchangeType.php
 *
 * @author Philippe Basuyau 
 */
class LogoExchangeController extends AbstractController
{
    /**
     * @Route("/comptes/logoexchange", name="ics_crypto_comptes_logoexchange_homepage", methods={"GET"})
     *  @author Philippe Basuyau
     */
    public function index(EntityManagerInterface $em): Response
    {
        $logoExchanges = $em
            ->getRepository(LogoExchange::class)
            ->findAll();

            return $this->render('@Crypto/comptes/logoExchange/index.html.twig', [
                'logoExchanges' => $logoExchanges,
            ]);
    }//--- Fin de la function index

    /**
     * --- AddAction ---
     * @Route("/comptes/logoexchange/add", name="ics_crypto_comptes_logoexchange_add")
     * @author Philippe Basuyau
     */
    public function addAction(Request $request, EntityManagerInterface $em): Response
    {
        $logoexchange = new LogoExchange();

        $form = $this->createForm(LogoExchangeType::class, $logoexchange);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $logoexchange = $form->getData();

            $logoexchange->setLogoExchange();
            $logoexchange->setSurnameGravity();
            $logoexchange->setPlateformes();

            $em->persist($logoexchange);
            $em->flush();

            $this->addFlash('success',"Le logo a bien été créé");

            return $this->redirectToRoute('ics_crypto_comptes_logoexchange_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Crypto/comptes/logoexchange/form/form.html.twig', [
            'form' => $form->createView(),
            'logoExchange' => $logoexchange,
        ]);
    } //--- Fin de la function addAction

    /**
     * --- EditAction ---
     * @Route("/comptes/logoexchange/edit", name="ics_crypto_comptes_logoexchange_edit", methods={"GET", "POST"} )
     * @author Philippe Basuyau
     */
    public function editAction(ManagerRegistry $doctrine, EntityManagerInterface $em, Request $request, $id,  LogoExchange $logoexchange): Response
    {
        $logoexchange = $doctrine->getRepository(LogoExchange::class)->find($id);

        $form = $this->createForm(LogoExchangeType::class, $logoexchange);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $logoexchange = $form->getData();

            $em = $this->$em->getManager();
            $em->persist($logoexchange);
            $em->flush();

            $this->addFlash('success', "Le logo a bien été modifiée");

            return $this->redirectToRoute('ics_crypto_comptes_logoexchange_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Crypto/comptes/logoexchange/form/form.html.twig', [
            'form' => $form->createView(),
            'logoExchange' => $logoexchange,
            ]);
    } //--- Fin de la function editAction

    /**
     * --- DeleteAction ---
     *
     * @Route("/comptes/logoexchange/delete", name="ics_crypto_comptes_logoexchange_delete", methods={"POST"})
     * @author Philippe Basuyau
     */
    public function deleteAction(Request $request, EntityManagerInterface $em, LogoExchange $logoexchange): Response
    {
        if ($this->isCsrfTokenValid('delete'.$logoexchange->getId(), $request->request->get('_token'))) {
            $em->remove($logoexchange);
            $em->flush();
        }
        $this->addFlash('warning', 'Le logo a été supprimée.');

        return $this->redirectToRoute('ics_crypto_comptes_logoexchange_homepage', [], Response::HTTP_SEE_OTHER);
    }//--- Fin de la function Delete

}//--- Fin de la class LogoExchangeController
