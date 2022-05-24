<?php

namespace ICS\CryptoBundle\Controller;

use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use ICS\CryptoBundle\Entity\Crypto\Comptes\Compte;
use ICS\CryptoBundle\Form\Type\Comptes\CompteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  Compte  controller ---
 *
 * les comptes 
 *
 * @see /views/comptes/compte
 * @see /src/Entity/Crypto/comptes/Compte.php
 * @see /src/Repository/CompteRepository.php
 * @see /src/Service/CompteService.php
 * @see /src/Form/Type/Comptes/CompteType.php
 *
 * @author Philippe Basuyau 
 */
class CompteController extends AbstractController
{
    /**
     * @Route("/comptes/compte", name="ics_crypto_comptes_compte_homepage", methods={"GET"})
     *  @author Philippe Basuyau
     */
    public function index(EntityManagerInterface $em): Response
    {
        $comptes = $em
            ->getRepository(Compte::class)
            ->findAll();

            return $this->render('comptes/compte/index.html.twig', [
                'comptes' => $comptes,
            ]);
    }//---Fin de la function index

    /**
     * --- AddAction ---
     * @Route("/comptes/compte/add", name="ics_crypto_comptes_compte_add")
     * @author Philippe Basuyau
     */
    public function addAction(Request $request, EntityManagerInterface $em): Response
    {
        $compte = new Compte();

        $form = $this->createForm(CompteType::class, $compte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $compte = $form->getData();

            $compte->setNameCompte();
            $compte->setObservation();
            $compte->setOuverture(new DateTime());
            $compte->setFondGarantie();
            $compte->setMontantGarantie();
            $compte->setTypePlateforme();
            $compte->setUser();

            $em->persist($compte);
            $em->flush();

            $this->addFlash('success',"Le compte avec le nom : ".$compte->getNameCompte().' a bien été créé');

            return $this->redirectToRoute('crypto_comptes_compte_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('comptes/compte/form/form.html.twig', [
            'form' => $form->createView(),
            'compte' => $compte,
        ]);
    } //--- Fin de la function addAction

    /**
     * --- EditAction ---
     * @Route("/comptes/compte/edit", name="ics_crypto_comptes_compte_edit", methods={"GET", "POST"} )
     * @author Philippe Basuyau
     */
    public function editAction(ManagerRegistry $doctrine, EntityManagerInterface $em, Request $request, $id,  Compte $compte): Response
    {
        $compte = $doctrine->getRepository(Compte::class)->find($id);

        $form = $this->createForm(CompteType::class, $compte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $compte = $form->getData();

            $em = $this->$em->getManager();
            $em->persist($compte);
            $em->flush();

            $this->addFlash('success', "Le compte avec le nom : ".$compte->getNameCompte().' a bien été modifiée');

            return $this->redirectToRoute('crypto_comptes_compte_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('comptes/compte/form/form.html.twig', [
            'form' => $form->createView(),
            'compte' => $compte,
            ]);
    } //--- Fin de la function editAction

    /**
     * --- DeleteAction ---
     *
     * @Route("/comptes/compte/delete", name="ics_crypto_comptes_compte_delete", methods={"POST"})
     * @author Philippe Basuyau
     */
    public function deleteAction(Request $request, EntityManagerInterface $em, Compte $compte): Response
    {
        $compte = $this->$em
                        ->getRepository(Compte::class)
                        ->find($compte->getId());
        $compte->setCloture(new DateTime());

        $em = $this->$em->getManager();
        $em->persist($compte);
        $em->flush();
        
        $this->addFlash('warning', "Le compte avec le nom : ".$compte->getNameCompte().'  a été cloturé.');

        return $this->redirectToRoute('crypto_comptes_compte_homepage', [], Response::HTTP_SEE_OTHER);
    }//--- Fin de la function Delete


}//--- Fin de la class CompteController
