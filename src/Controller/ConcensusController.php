<?php

namespace ICS\CryptoBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use ICS\CryptoBundle\Entity\Crypto\Token\Concensus;
use ICS\CryptoBundle\Form\Type\Token\ConcensusType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  Concensus  controller ---
 *
 * le concensus de la cryptomonnaie
 *
 * @see /views/token/concensus
 * @see /src/Entity/Crypto/Token/Concensus.php
 * @see /src/Repository/ConcensusRepository.php
 * @see /src/Service/ConcensusService.php
 * @see /src/Form/Type/Token/ConcensusType.php
 *
 * @author Philippe Basuyau 
 */
class ConcensusController extends AbstractController
{
    /**
     *  @Route("/token/concensus", name="ics_crypto_token_concensus_homepage", methods={"GET"})
     * @author Philippe Basuyau
     */
    public function index(EntityManagerInterface $em): Response
    {
        $concensuss = $em
            ->getRepository(Api::class)
            ->findAll();

            return $this->render('@Crypto/token/concensus/index.html.twig', [
                'concensuss' => $concensuss,
            ]);
    }//--- Fin de la function Index

    /**
     * --- AddAction ---
     * @Route("/token/concensus/add", name="ics_crypto_token_concensus_add")
     * @author Philippe Basuyau
     */
    public function addAction(Request $request, EntityManagerInterface $em): Response
    {
        $concensus = new Concensus();

        $form = $this->createForm(ConcensusType::class, $concensus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $concensus = $form->getData();

            $concensus->setLibelle();
            $concensus->setDescription();

            $em->persist($concensus);
            $em->flush();

            $this->addFlash('success',"Le concensus : ".$concensus->getLibelle().' a bien été créé');

            return $this->redirectToRoute('ics_crypto_token_concensus_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Crypto/token/concensus/form/form.html.twig', [
            'form' => $form->createView(),
            'conensus' => $concensus,
        ]);
    } //--- Fin de la function addAction

    /**
     * --- EditAction ---
     * @Route("/token/concensus/edit", name="ics_crypto_token_concensus_edit", methods={"GET", "POST"} )
     * @author Philippe Basuyau
     */
    public function editAction(ManagerRegistry $doctrine, EntityManagerInterface $em, Request $request, $id,  Concensus $concensus): Response
    {
        $concensus = $doctrine->getRepository(Concensus::class)->find($id);

        $form = $this->createForm(ConcensusType::class, $concensus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $concensus = $form->getData();

            $em = $this->$em->getManager();
            $em->persist($concensus);
            $em->flush();

            $this->addFlash('success', "Le concensus : ".$concensus->getLibelle().' a bien été modifiée');

            return $this->redirectToRoute('ics_crypto_token_concensus_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Crypto/token/concensus/form/form.html.twig', [
            'form' => $form->createView(),
            'concensus' => $concensus,
            ]);
    } //--- Fin de la function editAction

    /**
     * --- DeleteAction ---
     *
     * @Route("/token/concensus/delete", name="ics_crypto_token_concensus_delete", methods={"POST"})
     * @author Philippe Basuyau
     */
    public function deleteAction(Request $request, EntityManagerInterface $em, Concensus $concensus): Response
    {
        if ($this->isCsrfTokenValid('delete'.$concensus->getId(), $request->request->get('_token'))) {
            $em->remove($concensus);
            $em->flush();
        }
        $this->addFlash('warning', "Le concensus : ".$concensus->getLibelle().'  a été supprimée.');

        return $this->redirectToRoute('ics_crypto_token_concensus_homepage', [], Response::HTTP_SEE_OTHER);
    }//--- Fin de la function Delete

}//--- Fin de la class Concensus

