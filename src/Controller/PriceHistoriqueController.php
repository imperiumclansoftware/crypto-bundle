<?php

namespace ICS\CryptoBundle\Controller;

use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use ICS\CryptoBundle\Entity\Crypto\Token\PriceHistorique;
use ICS\CryptoBundle\Form\Type\Token\PriceHistoriqueType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  Price Historique  controller ---
 *
 * le suivi du prix des cryptomonnaies
 *
 * @see /views/token/priceHistorique
 * @see /src/Entity/Crypto/Token/PriceHistorique.php
 * @see /src/Repository/PriceHistoriqueRepository.php
 * @see /src/Service/PriceHistoriqueService.php
 * @see /src/Form/Type/Token/PriceHistoriqueType.php
 *
 * @author Philippe Basuyau 
 */
class PriceHistoriqueController extends AbstractController
{
    /**
     * @Route("/token/priceHistorique", name="ics_crypto_token_priceHistorique_homepage", methods={"GET"})
     * @author Philippe Basuyau
     */
    public function index(EntityManagerInterface $em): Response
    {
        $priceHistoriques = $em
            ->getRepository(PriceHistorique::class)
            ->findAll();

            return $this->render('@Crypto/token/priceHistorique/index.html.twig', [
                'priceHistoriques' => $priceHistoriques,
            ]);
    }//--- Fin de la function index

    /**
     * --- AddAction ---
     * @Route("/token/priceHistorique/add", name="ics_crypto_token_priceHistorique_add")
     * @author Philippe Basuyau
     */
    public function addAction(Request $request, EntityManagerInterface $em): Response
    {
        $priceHistorique = new PriceHistorique();

        $form = $this->createForm(PriceHistoriqueType::class, $priceHistorique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $priceHistorique = $form->getData();

            $priceHistorique->setPrice();
            $priceHistorique->setDate(new DateTime());

            $em->persist($priceHistorique);
            $em->flush();

            $this->addFlash('success', 'Le prix a bien été créé');

            return $this->redirectToRoute('ics_crypto_token_priceHistorique_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Crypto/token/priceHistorique/form/form.html.twig', [
            'form' => $form->createView(),
            'priceHistorique' => $priceHistorique,
        ]);
    } //--- Fin de la function addAction

    /**
     * --- EditAction ---
     * @Route("/token/priceHistorique/edit", name="ics_crypto_token_priceHistorique_edit", methods={"GET", "POST"} )
     * @author Philippe Basuyau
     */
    public function editAction(ManagerRegistry $doctrine, EntityManagerInterface $em, Request $request, $id,  PriceHistorique $priceHistorique): Response
    {
        $priceHistorique = $doctrine->getRepository(PriceHistorique::class)->find($id);

        $form = $this->createForm(PriceHistoriqueType::class, $priceHistorique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $priceHistorique = $form->getData();

            $em = $this->$em->getManager();
            $em->persist($priceHistorique);
            $em->flush();

            $this->addFlash('success', 'Le prix a bien été modifiée');

            return $this->redirectToRoute('ics_crypto_token_priceHistorique_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Crypto/token/priceHistorique/form/form.html.twig', [
            'form' => $form->createView(),
            'priceHistorique' => $priceHistorique,
            ]);
    } //--- Fin de la function editAction

    /**
     * --- DeleteAction ---
     *
     * @Route("/token/priceHistorique/delete", name="ics_crypto_token_priceHistorique_delete", methods={"POST"})
     * @author Philippe Basuyau
     */
    public function deleteAction(Request $request, EntityManagerInterface $em, PriceHistorique $priceHistorique): Response
    {
        if ($this->isCsrfTokenValid('delete'.$priceHistorique->getId(), $request->request->get('_token'))) {
            $em->remove($priceHistorique);
            $em->flush();
        }
        $this->addFlash('warning', 'Le prix a été supprimée.');

        return $this->redirectToRoute('ics_crypto_token_priceHistorique_homepage', [], Response::HTTP_SEE_OTHER);
    }//--- Fin de la function Delete

}//--- Fin de la class PriceHistoriqueController
