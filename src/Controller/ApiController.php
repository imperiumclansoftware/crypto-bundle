<?php

namespace ICS\CryptoBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use ICS\CryptoBundle\Entity\Crypto\Token\Api;
use ICS\CryptoBundle\Form\Type\Token\ApiType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  Api  controller ---
 *
 * la gamme d'utilité de la cryptomonnaie
 *
 * @see /views/token/api
 * @see /src/Entity/Crypto/Token/Api.php
 * @see /src/Repository/ApiRepository.php
 * @see /src/Service/ApiService.php
 * @see /src/Form/Type/Token/ApiType.php
 *
 * @author Philippe Basuyau 
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/token/api", name="ics_crypto_token_api_homepage", methods={"GET"})
     *  @author Philippe Basuyau
     */
    public function index(EntityManagerInterface $em): Response
    {
        $apis = $em
            ->getRepository(Api::class)
            ->findAll();

            return $this->render('@Crypto/token/api/index.html.twig', [
                'apis' => $apis,
            ]);
    }//--- Fin de la function Index

    /**
     * --- AddAction ---
     * @Route("/token/api/add", name="ics_crypto_token_api_add")
     * @author Philippe Basuyau
     */
    public function addAction(Request $request, EntityManagerInterface $em): Response
    {
        $api = new Api();

        $form = $this->createForm(ApiType::class, $api);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $api = $form->getData();

            $api->setRang();
            $api->setCoin();
            $api->setLibelleCoin();
            $api->setPrixMarche();

            $em->persist($api);
            $em->flush();

            $this->addFlash('success', "Le token : ".$api->getLibelleCoin().' a bien été créé');

            return $this->redirectToRoute('ics_crypto_token_api_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Crypto/token/api/form/form.html.twig', [
            'form' => $form->createView(),
            'api' => $api,
        ]);
    } //--- Fin de la function addAction

    /**
     * --- EditAction ---
     * @Route("/token/api/edit", name="ics_crypto_token_api_edit", methods={"GET", "POST"} )
     * @author Philippe Basuyau
     */
    public function editAction(ManagerRegistry $doctrine, EntityManagerInterface $em, Request $request, $id,  Api $api): Response
    {
        $api = $doctrine->getRepository(Api::class)->find($id);

        $form = $this->createForm(ApiType::class, $api);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $api = $form->getData();

            $em = $this->$em->getManager();
            $em->persist($api);
            $em->flush();

            $this->addFlash('success', "Le token : ".$api->getLibelleCoin().' a bien été modifiée');

            return $this->redirectToRoute('ics_crypto_token_api_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Crypto/token/api/form/form.html.twig', [
            'form' => $form->createView(),
            'api' => $api,
            ]);
    } //--- Fin de la function editAction

    /**
     * --- DeleteAction ---
     *
     * @Route("/token/api/delete", name="ics_crypto_token_api_delete", methods={"POST"})
     * @author Philippe Basuyau
     */
    public function deleteAction(Request $request, EntityManagerInterface $em, Api $api): Response
    {
        if ($this->isCsrfTokenValid('delete'.$api->getId(), $request->request->get('_token'))) {
            $em->remove($api);
            $em->flush();
        }
        $this->addFlash('warning', "Le token : ".$api->getLibelleCoin().'  a été supprimée.');

        return $this->redirectToRoute('ics_crypto_token_api_homepage', [], Response::HTTP_SEE_OTHER);
    }//--- Fin de la function Delete
    
}//--- Fin de la class Api
