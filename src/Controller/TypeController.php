<?php

namespace ICS\CryptoBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use ICS\CryptoBundle\Entity\Crypto\Calcul\Type;
use ICS\CryptoBundle\Form\Type\Calcul\TypeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  Type controller ---
 *
 * Type des cryptomonnaies
 *
 * @see /views/calcul/type
 * @see /src/Entity/Crypto/calcul/Type.php
 * @see /src/Repository/TypeRepository.php
 * @see /src/Service/TypeService.php
 * @see /src/Form/Type/calcul/TypeType.php
 *
 * @author Philippe Basuyau 
 */
class TypeController extends AbstractController
{
    /**
     * @Route("/calcul/type", name="ics_crypto_calcul_type_homepage", methods={"GET"})
     *  @author Philippe Basuyau
     */
    public function index(EntityManagerInterface $em): Response
    {
        $types = $em
            ->getRepository(Type::class)
            ->findAll();

            return $this->render('@Crypto/calcul/type/index.html.twig', [
                'types' => $types,
            ]);
    }//--- fin de la function index

    /**
     * --- AddAction ---
     * @Route("/calcul/type/add", name="ics_crypto_calcul_type_add")
     * @author Philippe Basuyau
     */
    public function addAction(Request $request, EntityManagerInterface $em): Response
    {
        $type = new Type();

        $form = $this->createForm(TypeType::class, $type);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $type = $form->getData();

            $type->setLibelle();

            $em->persist($type);
            $em->flush();

            $this->addFlash('success',"Le type de gain: ".$type->getLibelle().' a bien été créé');

            return $this->redirectToRoute('ics_crypto_calcul_type_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Crypto/calcul/type/form/form.html.twig', [
            'form' => $form->createView(),
            'type' => $type,
        ]);
    } //--- Fin de la function addAction

    /**
     * --- EditAction ---
     * @Route("/calcul/type/{id}/edit", name="ics_crypto_calcul_type_edit", methods={"GET", "POST"} )
     * @author Philippe Basuyau
     */
    public function editAction(ManagerRegistry $doctrine, EntityManagerInterface $em, Request $request, $id,  Type $type): Response
    {
        $type = $doctrine->getRepository(Type::class)->find($id);

        $form = $this->createForm(TypeType::class, $type);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $type = $form->getData();

            $em = $this->$em->getManager();
            $em->persist($type);
            $em->flush();

            $this->addFlash('success', "Le type de gain: ".$type->getLibelle().' a bien été modifiée');

            return $this->redirectToRoute('ics_crypto_calcul_type_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Crypto/calcul/type/form/form.html.twig', [
            'form' => $form->createView(),
            'type' => $type,
            ]);
    } //--- Fin de la function editAction

    /**
     * --- DeleteAction ---
     *
     * @Route("/calcul/type/{id}/delete", name="ics_crypto_calcul_type_delete", methods={"POST"})
     * @author Philippe Basuyau
     */
    public function deleteAction(Request $request, EntityManagerInterface $em, Type $type): Response
    {
        if ($this->isCsrfTokenValid('delete'.$type->getId(), $request->request->get('_token'))) {
            $em->remove($type);
            $em->flush();
        }
        $this->addFlash('warning', "Le type de gain: ".$type->getLibelle().'  a été supprimée.');

        return $this->redirectToRoute('ics_crypto_calcul_type_homepage', [], Response::HTTP_SEE_OTHER);
    }//-- Fin de la function Delete

}//--- Fin de la class TypeController
