<?php

namespace ICS\CryptoBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use ICS\CryptoBundle\Entity\Crypto\Comptes\Plateforme;
use ICS\CryptoBundle\Form\Type\Comptes\PlateformeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  Plateforme controller ---
 *
 * Les diverses plates ou l'on peut acheter,vendre, détenir des comptes et des cryptomonnaies
 *
 * @see /views/comptes/plateforme
 * @see /src/Entity/Crypto/comptes/Plateforme.php
 * @see /src/Repository/PlateformeRepository.php
 * @see /src/Service/PlateformeService.php
 * @see /src/Form/Type/Comptes/PlateformeType.php
 *
 * @author Philippe Basuyau 
 */
class PlateformeController extends AbstractController
{
    /**
     * @Route("/comptes/plateforme", name="ics_crypto_comptes_plateforme_homepage", methods={"GET"})
     *  @author Philippe Basuyau
     */
    public function index(EntityManagerInterface $em): Response
    {
        $plateformes = $em
            ->getRepository(Plateforme::class)
            ->findAll();

            return $this->render('comptes/plateforme/index.html.twig', [
                'plateformes' => $plateformes,
            ]);
    }//--- Fin de la function index

    /**
     * --- AddAction ---
     * @Route("/comptes/plateforme/add", name="ics_crypto_comptes_plateforme_add")
     * @author Philippe Basuyau
     */
    public function addAction(Request $request, EntityManagerInterface $em): Response
    {
        $plateforme = new Plateforme();

        $form = $this->createForm(PlateformeType::class, $plateforme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plateforme = $form->getData();

            $plateforme->setLibelle();
            $plateforme->setGravity();
            $plateforme->setDescription();
            $plateforme->setLogoExchange();

            $em->persist($plateforme);
            $em->flush();

            $this->addFlash('success', "La plateforme ".$plateforme->getLibelle().' a bien été créé');

            return $this->redirectToRoute('crypto_comptes_plateforme_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('comptes/plateforme/form/form.html.twig', [
            'form' => $form->createView(),
            'plateforme' => $plateforme,
        ]);
    } //--- Fin de la function addAction

    /**
     * --- EditAction ---
     * @Route("/comptes/plateforme/edit", name="ics_crypto_comptes_plateforme_edit", methods={"GET", "POST"} )
     * @author Philippe Basuyau
     */
    public function editAction(ManagerRegistry $doctrine, EntityManagerInterface $em, Request $request, $id,  Plateforme $plateforme): Response
    {
        $plateforme = $doctrine->getRepository(Plateforme::class)->find($id);

        $form = $this->createForm(PlateformeType::class, $plateforme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plateforme = $form->getData();

            $em = $this->$em->getManager();
            $em->persist($plateforme);
            $em->flush();

            $this->addFlash('success', "La plateforme ".$plateforme->getLibelle().' a bien été modifiée');

            return $this->redirectToRoute('crypto_comptes_plateforme_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('comptes/plateforme/form/form.html.twig', [
            'form' => $form->createView(),
            'plateforme' => $plateforme,
            ]);
    } //--- Fin de la function editAction

    /**
     * --- DeleteAction ---
     *
     * @Route("/comptes/plateforme/delete", name="ics_crypto_comptes_plateforme_delete", methods={"POST"})
     * @author Philippe Basuyau
     */
    public function deleteAction(Request $request, EntityManagerInterface $em, Plateforme $plateforme): Response
    {
        if ($this->isCsrfTokenValid('delete'.$plateforme->getId(), $request->request->get('_token'))) {
            $em->remove($plateforme);
            $em->flush();
        }
        $this->addFlash('warning', "La plateforme ".$plateforme->getLibelle().'  a été supprimée.');

        return $this->redirectToRoute('crypto_comptes_plateforme_homepage', [], Response::HTTP_SEE_OTHER);
    }//--- Fin de la function Delete

}//--- Fin de la class PlateformeController
