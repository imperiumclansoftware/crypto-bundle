<?php

namespace ICS\CryptoBundle\Controller;

use ICS\CryptoBundle\Entity\Crypto\Token\Utilite;
use Doctrine\ORM\EntityManagerInterface;
use ICS\CryptoBundle\Form\Type\Token\UtiliteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  Utilité  controller ---.
 *
 * la gamme d'utilité de la cryptomonnaie
 *
 * @see /views/token/utilite
 * @see /src/Entity/Crypto/Token/Utilite
 * @see /src/Repository/UtiliteRepository.php
 * @see /src/Service/UtiliteService.php
 * @see /src/Form/Type/Token/Utilite
 *
 * @author Philippe Basuyau 
 */
class UtiliteController extends AbstractController
{
    /**
     * @Route("/token/utilite", name="crypto-token-utilite-homepage", methods={"GET"})
     *  @author Philippe Basuyau
     */
    public function index(EntityManagerInterface $em): Response
    {
        $utilites = $this->$em->getRepository(Utilite::class)->findAll();
        return $this->render('Token/Utilite/index.html.twig', [
            'utilites' => $utilites,
        ]);
    } // fin de la function index

    /**
     * --- AddAction ---
     * @Route("/token/utilite/add", name="crypto-token-utilite-add")
     * @author Philippe Basuyau
     */
    public function addAction(Request $request, EntityManagerInterface $em): Response
    {
        $utilite = new Utilite();

        $form = $this->createForm(UtiliteType::class, $utilite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $utilite = $form->getData();

            $utilite->setUtilite();
            $utilite->setDescription();

            $em->persist($utilite);
            $em->flush();

            $this->addFlash('success',"L'utilité : ".$utilite->getUtilite().' a bien été créé');

            return $this->redirectToRoute('crypto-token-utilite-homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('token/utilite/form/form.html.twig', [
            'form' => $form->createView(),
            'utilite' => $utilite,
        ]);
    } //--- Fin de la function addAction

    /**
     * @Route("/token/utilite/show/{id}", name="crypto-token-utilite-show", methods={"GET"})
     * @author Philippe Basuyau
     */
    public function show(Utilite $utilite): Response
    {
        return $this->render('token/utilite/show.html.twig', [
            'utilite' => $utilite,
        ]);
    } //--- Fin de la function show

    /**
     * --- EditAction ---
     * @Route("/token/utilite/{id}/edit", name="crypto-token-utilite-edit", methods={"GET", "POST"} )
     * @author Philippe Basuyau
     */
    public function editAction(EntityManagerInterface $em, Request $request, $id,  Utilite $utilite): Response
    {
        $form = $this->createForm(UtiliteType::class, $utilite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $utilite = $form->getData();

            $entityManager = $this->$em->getManager();
            $entityManager->persist($utilite);
            $entityManager->flush();

            $this->addFlash('success', "L'utilité ".$utilite->getutilite().' a bien été modifiée');

            return $this->redirectToRoute('crypto-token-utilite-homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('token/utilite/form/form.html.twig', [
            'form' => $form->createView(),
            'utilite' => $utilite,
            ]);
    } //--- Fin de la function editAction

    /**
     * --- DeleteAction ---
     *
     * @Route("/token/utilite/{id}/delete", name="crypto-token-utilite-delete", methods={"POST"})
     * @author Philippe Basuyau
     */
    public function deleteAction(Request $request, EntityManagerInterface $em, Utilite $utilite): Response
    {
        if ($this->isCsrfTokenValid('delete'.$utilite->getId(), $request->request->get('_token'))) {
            $em->remove($utilite);
            $em->flush();
        }
        $this->addFlash('warning', "L'utilité :".$utilite->getUtilite().'  a été supprimée.');

        return $this->redirectToRoute('crypto-token-utilite-homepage', [], Response::HTTP_SEE_OTHER);
    }

}
