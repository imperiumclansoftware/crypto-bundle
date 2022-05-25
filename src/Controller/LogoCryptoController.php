<?php

namespace ICS\CryptoBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use ICS\CryptoBundle\Entity\Crypto\Token\LogoCrypto;
use ICS\CryptoBundle\Form\Type\Token\LogoCryptoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  LogoCrypto  controller ---
 *
 * les logos des cryptomonnaies
 *
 * @see /views/token/LogoCrypto
 * @see /src/Entity/Crypto/Token/LogoCrypto.php
 * @see /src/Repository/LogoCryptoRepository.php
 * @see /src/Service/LogoCryptoService.php
 * @see /src/Form/Type/Token/LogoCryptoType.php
 *
 * @author Philippe Basuyau 
 */
class LogoCryptoController extends AbstractController
{
    /**
     *  @Route("/token/logo", name="ics_crypto_token_logo_homepage", methods={"GET"})
     *  @author Philippe Basuyau
     */
    public function index(EntityManagerInterface $em): Response
    {
        $logoCryptos = $em
            ->getRepository(LogoCrypto::class)
            ->findAll();

            return $this->render('token/logoCrypto/index.html.twig', [
                'logoCryptos' => $logoCryptos,
            ]);
    }//---Fin de function index

    /**
     * --- AddAction ---
     * @Route("/token/logo/add", name="ics_crypto_token_logo_add")
     * @author Philippe Basuyau
     */
    public function addAction(Request $request, EntityManagerInterface $em): Response
    {
        $logoCrypto = new LogoCrypto();

        $form = $this->createForm(LogoCryptoType::class, $logoCrypto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $logoCrypto = $form->getData();

            $logoCrypto->setLogoCrypto();
            $logoCrypto->setGravity();

            $em->persist($logoCrypto);
            $em->flush();

            $this->addFlash('success','Le logo a bien été créé');

            return $this->redirectToRoute('crypto_token_logo_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('token/logoCrypto/form/form.html.twig', [
            'form' => $form->createView(),
            'logoCrypto' => $logoCrypto,
        ]);
    } //--- Fin de la function addAction

    /**
     * --- EditAction ---
     * @Route("/token/logo/edit", name="ics_crypto_token_logo_edit", methods={"GET", "POST"} )
     * @author Philippe Basuyau
     */
    public function editAction(ManagerRegistry $doctrine, EntityManagerInterface $em, Request $request, $id,  LogoCrypto $logoCrypto): Response
    {
        $logoCrypto = $doctrine->getRepository(LogoCrypto::class)->find($id);

        $form = $this->createForm(LogoCryptoType::class, $logoCrypto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $logoCrypto = $form->getData();

            $em = $this->$em->getManager();
            $em->persist($logoCrypto);
            $em->flush();

            $this->addFlash('success', 'Le logo  a bien été modifiée');

            return $this->redirectToRoute('crypto_token_logo_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('token/logoCrypto/form/form.html.twig', [
            'form' => $form->createView(),
            'logoCrypto' => $logoCrypto,
            ]);
    } //--- Fin de la function editAction

    /**
     * --- DeleteAction ---
     *
     * @Route("/token/logo/delete", name="ics_crypto_token_logo_delete", methods={"POST"})
     * @author Philippe Basuyau
     */
    public function deleteAction(Request $request, EntityManagerInterface $em, LogoCrypto $logoCrypto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$logoCrypto->getId(), $request->request->get('_token'))) {
            $em->remove($logoCrypto);
            $em->flush();
        }
        $this->addFlash('warning', 'Le logo a été supprimée.');

        return $this->redirectToRoute('crypto_token_logo_homepage', [], Response::HTTP_SEE_OTHER);
    }//--- Fin de la function Delete


}//--- Fin de la class LogoCryptoController
