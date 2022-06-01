<?php

namespace ICS\CryptoBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use ICS\CryptoBundle\Entity\Crypto\Comptes\TypePlateforme;
use ICS\CryptoBundle\Form\Type\Comptes\TypeplateformeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * --- TypePlateforme controller ---
 *
 * les TypePlateforme de plateForme (sur pc, sur mobile, sur tablette)  
 *
 * @see /views/comptes/typePlateforme
 * @see /src/Entity/Crypto/comptes/TypePlateforme.php
 * @see /src/Repository/TypePlateformeRepository.php
 * @see /src/Service/TypePlateformeService.php
 * @see /src/Form/Type/Comptes/TypePlateformeType.php
 *
 * @author Philippe Basuyau 
 */
class TypePlateformeController extends AbstractController
{
    /**
     * @Route("/comptes/typeplateforme", name="ics_crypto_comptes_typeplateforme_homepage", methods={"GET"})
     *  @author Philippe Basuyau
     */
    public function index(EntityManagerInterface $em): Response
    {
        $typePlateformes = $em
            ->getRepository(TypePlateforme::class)
            ->findAll();

            return $this->render('@Crypto/comptes/typeplateforme/index.html.twig', [
                'typePlateformes' => $typePlateformes,
            ]);
    }//--- Fin de la function index

    /**
     * --- AddAction ---
     * @Route("/comptes/typeplateforme/add", name="ics_crypto_comptes_typeplateforme_add")
     * @author Philippe Basuyau
     */
    public function addAction(Request $request, EntityManagerInterface $em): Response
    {
        $typeplateforme = new TypePlateforme();

        $form = $this->createForm(TypeplateformeType::class, $typeplateforme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeplateforme = $form->getData();

            $typeplateforme->setLibelle();

            $em->persist($typeplateforme);
            $em->flush();

            $this->addFlash('success',"Le type de plateforme : ".$typeplateforme->getlibelle().' a bien été créé');

            return $this->redirectToRoute('ics_crypto_comptes_typeplateforme_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Crypto/comptes/typeplateforme/form/form.html.twig', [
            'form' => $form->createView(),
            'typeplateforme' => $typeplateforme,
        ]);
    } //--- Fin de la function addAction

    /**
     * --- EditAction ---
     * @Route("/comptes/typeplateforme/edit", name="ics_crypto_comptes_typeplateforme_edit", methods={"GET", "POST"} )
     * @author Philippe Basuyau
     */
    public function editAction(ManagerRegistry $doctrine, EntityManagerInterface $em, Request $request, $id,  TypePlateforme $typeplateforme): Response
    {
        $typeplateforme = $doctrine->getRepository(TypePlateforme::class)->find($id);

        $form = $this->createForm(TypeplateformeType::class, $typeplateforme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeplateforme = $form->getData();

            $em = $this->$em->getManager();
            $em->persist($typeplateforme);
            $em->flush();

            $this->addFlash('success', "Le type de plateforme : ".$typeplateforme->getlibelle().' a bien été modifiée');

            return $this->redirectToRoute('ics_crypto_comptes_typeplateforme_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Crypto/comptes/typeplateforme/form/form.html.twig', [
            'form' => $form->createView(),
            'typeplateforme' => $typeplateforme,
            ]);
    } //--- Fin de la function editAction

    /**
     * --- DeleteAction ---
     *
     * @Route("/comptes/typeplateforme/delete", name="ics_crypto_comptes_typeplateforme_delete", methods={"POST"})
     * @author Philippe Basuyau
     */
    public function deleteAction(Request $request, EntityManagerInterface $em, TypePlateforme $typeplateforme): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeplateforme->getId(), $request->request->get('_token'))) {
            $em->remove($typeplateforme);
            $em->flush();
        }
        $this->addFlash('warning', "Le type de plateforme : ".$typeplateforme->getlibelle().'  a été supprimée.');

        return $this->redirectToRoute('ics_crypto_comptes_typeplateforme_homepage', [], Response::HTTP_SEE_OTHER);
    }//--- Fin de la function Delete

}//--- Fin de la class TypePlateformeController
