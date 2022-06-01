<?php

namespace ICS\CryptoBundle\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use ICS\CryptoBundle\Entity\Crypto\Calcul\Gain;
use ICS\CryptoBundle\Form\Type\Calcul\GainType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * ---  Gain controller ---
 *
 * Gain de crypto par différent biais outre que l'achat, 
 *
 * @see /views/calcul/gain
 * @see /src/Entity/Crypto/calcul/Gain.php
 * @see /src/Repository/GainRepository.php
 * @see /src/Service/GainService.php
 * @see /src/Form/Type/calcul/GainType.php
 *
 * @author Philippe Basuyau 
 */
class GainController extends AbstractController
{
    /**
     * @Route("/calcul/gain", name="ics_crypto_calcul_gain_homepage", methods={"GET"})
     *  @author Philippe Basuyau
     */
    public function index(EntityManagerInterface $em): Response
    {
        $gains = $em
            ->getRepository(Gain::class)
            ->findAll();

            return $this->render('@Crypto/calcul/gain/index.html.twig', [
                'gains' => $gains,
            ]);
    }//--- Fin de la function index

    /**
     * --- AddAction ---
     * @Route("/calcul/gain/add", name="ics_crypto_calcul_gain_add")
     * @author Philippe Basuyau
     */
    public function addAction(Request $request, EntityManagerInterface $em): Response
    {
        $gain = new Gain();

        $form = $this->createForm(GainType::class, $gain);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $gain = $form->getData();

            $gain->setType();

            $em->persist($gain);
            $em->flush();

            $this->addFlash('success',"Le gain a bien été créé.");

            return $this->redirectToRoute('ics_crypto_calcul_gain_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Crypto/calcul/gain/form/form.html.twig', [
            'form' => $form->createView(),
            'gain' => $gain,
        ]);
    } //--- Fin de la function addAction

    /**
     * --- EditAction ---
     * @Route("/calcul/gain/edit", name="ics_crypto_calcul_gain_edit", methods={"GET", "POST"} )
     * @author Philippe Basuyau
     */
    public function editAction(ManagerRegistry $doctrine, EntityManagerInterface $em, Request $request, $id,  Gain $gain): Response
    {
        $gain = $doctrine->getRepository(Gain::class)->find($id);

        $form = $this->createForm(GainType::class, $gain);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $gain = $form->getData();

            $em = $this->$em->getManager();
            $em->persist($gain);
            $em->flush();

            $this->addFlash('success', "Le gain a bien été modifié.");

            return $this->redirectToRoute('ics_crypto_calcul_gain_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Crypto/calcul/gain/form/form.html.twig', [
            'form' => $form->createView(),
            'gain' => $gain,
            ]);
    } //--- Fin de la function editAction

    /**
     * --- DeleteAction ---
     *
     * @Route("/calcul/gain/delete", name="ics_crypto_calcul_gain_delete", methods={"POST"})
     * @author Philippe Basuyau
     */
    public function deleteAction(Request $request, EntityManagerInterface $em, Gain $gain): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gain->getId(), $request->request->get('_token'))) {
            $em->remove($gain);
            $em->flush();
        }
        $this->addFlash('warning', "Le gain a été supprimée.");

        return $this->redirectToRoute('ics_crypto_calcul_gain_homepage', [], Response::HTTP_SEE_OTHER);
    }//---Fin de la function Delete


}//--- Fin de la class GainController
