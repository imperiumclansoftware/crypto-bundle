<?php

namespace ICS\CryptoBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use ICS\CryptoBundle\Entity\Crypto\Calcul\Operation;
use ICS\CryptoBundle\Form\Type\Calcul\OperationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  Opération  controller ---
 *
 * Opération sur les  cryptomonnaies 
 *
 * @see /views/calcul/operation
 * @see /src/Entity/Crypto/calcul/Operation.php
 * @see /src/Repository/OperationRepository.php
 * @see /src/Service/OperationService.php
 * @see /src/Form/Type/calcul/OperationType.php
 *
 * @author Philippe Basuyau 
 */
class OperationController extends AbstractController
{
    /**
     * @Route("/calcul/operation", name="ics_crypto_calcul_operation_homepage", methods={"GET"})
     *  @author Philippe Basuyau
     */
    public function index(EntityManagerInterface $em): Response
    {
        $operations = $em
            ->getRepository(Operation::class)
            ->findAll();

            return $this->render('calcul/operation/index.html.twig', [
                'operations' => $operations,
            ]);
    }//--- Fin de la function index

    /**
     * --- AddAction ---
     * @Route("/calcul/operation/add", name="ics_crypto_calcul_operation_add")
     * @author Philippe Basuyau
     */
    public function addAction(Request $request, EntityManagerInterface $em): Response
    {
        $operation = new Operation();

        $form = $this->createForm(OperationType::class, $operation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $operation = $form->getData();

            $operation->setNbrUnite();
            $operation->setPrixUnitaire();
            $operation->setPrixGlobal();
            $operation->setDescription();
            $operation->setGravity();
            $operation->setEuroAchete();
            $operation->setEuroAchat();
            $operation->setCryptoAchat();
            $operation->setPlateforme();
            $operation->setCryptoAchete();

            $em->persist($operation);
            $em->flush();

            $this->addFlash('success',"La transaction du ".$operation->getCryptoAchete()." en ".$operation->getCryptoAchat().' a bien été créé');

            return $this->redirectToRoute('crypto_calcul_operation_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('calcul/operation/form/form.html.twig', [
            'form' => $form->createView(),
            'operation' => $operation,
        ]);
    } //--- Fin de la function addAction

    /**
     * --- EditAction ---
     * @Route("/calcul/operation/edit", name="ics_crypto_calcul_operation_edit", methods={"GET", "POST"} )
     * @author Philippe Basuyau
     */
    public function editAction(ManagerRegistry $doctrine, EntityManagerInterface $em, Request $request, $id,  Operation $operation): Response
    {
        $operation = $doctrine->getRepository(Operation::class)->find($id);

        $form = $this->createForm(OperationType::class, $operation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $operation = $form->getData();

            $em = $this->$em->getManager();
            $em->persist($operation);
            $em->flush();

            $this->addFlash('success', "La transaction du ".$operation->getCryptoAchete()." en ".$operation->getCryptoAchat().' a bien été modifiée');

            return $this->redirectToRoute('crypto_calcul_operation_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('calcul/operation/form/form.html.twig', [
            'form' => $form->createView(),
            'operation' => $operation,
            ]);
    } //--- Fin de la function editAction

    /**
     * --- DeleteAction ---
     *
     * @Route("/calcul/operation/delete", name="ics_crypto_calcul_operation_delete", methods={"POST"})
     * @author Philippe Basuyau
     */
    public function deleteAction(Request $request, EntityManagerInterface $em, Operation $operation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$operation->getId(), $request->request->get('_token'))) {
            $em->remove($operation);
            $em->flush();
        }
        $this->addFlash('warning', "La transaction du ".$operation->getCryptoAchete()." en ".$operation->getCryptoAchat().'  a été supprimée.');

        return $this->redirectToRoute('crypto_calcul_operation_homepage', [], Response::HTTP_SEE_OTHER);
    }//--- Fin de la function Delete

}//--- Fin de la class OperationController
