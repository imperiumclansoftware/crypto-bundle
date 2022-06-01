<?php

namespace ICS\CryptoBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use ICS\CryptoBundle\Entity\Crypto\Token\Norme;
use ICS\CryptoBundle\Form\Type\Token\NormeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  Norme controller ---
 *
 * la norme de la cryptomonnaie
 *
 * @see /views/token/norme
 * @see /src/Entity/Crypto/Token/Norme.php
 * @see /src/Repository/NormeRepository.php
 * @see /src/Service/NormeService.php
 * @see /src/Form/Type/Token/NormeType.php
 *
 * @author Philippe Basuyau 
 */
class NormeController extends AbstractController
{
    /**
     *  @Route("/token/norme", name="ics_crypto_token_norme_homepage", methods={"GET"})
     *  @author Philippe Basuyau
     */
    public function index(EntityManagerInterface $em): Response
    {
        $normes = $em
            ->getRepository(Norme::class)
            ->findAll();

            return $this->render('@Crypto/token/norme/index.html.twig', [
                'normes' => $normes,
            ]);
    }//--- Fin de la function index

    /**
     * --- AddAction ---
     * @Route("/token/norme/add", name="ics_crypto_token_norme_add")
     * @author Philippe Basuyau
     */
    public function addAction(Request $request, EntityManagerInterface $em): Response
    {
        $norme = new Norme();

        $form = $this->createForm(NormeType::class, $norme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $norme = $form->getData();

            $norme->setLibelle();
            $norme->setDescription();

            $em->persist($norme);
            $em->flush();

            $this->addFlash('success','La norme : '.$norme->getLibelle().' a bien été créé');

            return $this->redirectToRoute('ics_crypto_token_norme_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Crypto/token/norme/form/form.html.twig', [
            'form' => $form->createView(),
            'norme' => $norme,
        ]);
    } //--- Fin de la function addAction

    /**
     * --- EditAction ---
     * @Route("/token/norme/edit", name="ics_crypto_token_norme_edit", methods={"GET", "POST"} )
     * @author Philippe Basuyau
     */
    public function editAction(ManagerRegistry $doctrine, EntityManagerInterface $em, Request $request, $id,  Norme $norme): Response
    {
        $norme = $doctrine->getRepository(Norme::class)->find($id);

        $form = $this->createForm(NormeType::class, $norme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $norme = $form->getData();

            $em = $this->$em->getManager();
            $em->persist($norme);
            $em->flush();

            $this->addFlash('success', "La norme : ".$norme->getLibelle().' a bien été modifiée');

            return $this->redirectToRoute('ics_crypto_token_norme_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Crypto/token/norme/form/form.html.twig', [
            'form' => $form->createView(),
            'norme' => $norme,
            ]);
    } //--- Fin de la function editAction

    /**
     * --- DeleteAction ---
     *
     * @Route("/token/norme/delete", name="ics_crypto_token_norme_delete", methods={"POST"})
     * @author Philippe Basuyau
     */
    public function deleteAction(Request $request, EntityManagerInterface $em, Norme $norme): Response
    {
        if ($this->isCsrfTokenValid('delete'.$norme->getId(), $request->request->get('_token'))) {
            $em->remove($norme);
            $em->flush();
        }
        $this->addFlash('warning', "La norme : ".$norme->getLibelle().'  a été supprimée.');

        return $this->redirectToRoute('ics_crypto_token_norme_homepage', [], Response::HTTP_SEE_OTHER);
    }//--- Fin de la function Delete

}//--- Fin de la class NormeController
