<?php

namespace ICS\CryptoBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use ICS\CryptoBundle\Entity\Crypto\Users\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * ---  Usser controller ---
 *
 * la gestion des users
 *
 * @see /views/users/user
 * @see /src/Entity/Crypto/Users/User.php
 * @see /src/Repository/UserRepository.php
 * @see /src/Service/UserService.php
 * @see /src/Form/Type/Users/userType.php
 *
 * @author Philippe Basuyau 
 */
class UserController extends AbstractController
{
    /**
     * @Route("/users/user", name="ics_crypto_users_user_homepage", methods={"GET"})
     * @author Philippe Basuyau
     */
    public function index(EntityManagerInterface $em): Response
    {
        $users = $em
            ->getRepository(User::class)
            ->findAll();

            return $this->render('users/user/index.html.twig', [
                'users' => $users,
            ]);
    }//--- Fin de la function index

    /**
     * --- AddAction ---
     * @Route("/users/user/add", name="ics_crypto_users_user_add")
     * @author Philippe Basuyau
     */
    public function addAction(Request $request, EntityManagerInterface $em): Response
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $user->setName();
            $user->setSurname();
            $user->setPlateformes();
            $user->setContacts();

            $em->persist($user);
            $em->flush();

            $this->addFlash('success',"L'utilisateur : ".$user->getName().".".$user->getSurname().' a bien été créé');

            return $this->redirectToRoute('crypto_users_user_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('users/user/form/form.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
        ]);
    } //--- Fin de la function addAction

    /**
     * --- EditAction ---
     * @Route("/users/user/edit", name="ics_crypto_users_user_edit", methods={"GET", "POST"} )
     * @author Philippe Basuyau
     */
    public function editAction(ManagerRegistry $doctrine, EntityManagerInterface $em, Request $request, $id,  User $user): Response
    {
        $user = $doctrine->getRepository(User::class)->find($id);

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $em = $this->$em->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', "L'utilisateur  ".$user->getName().".".$user->getSurname().' a bien été modifiée');

            return $this->redirectToRoute('crypto_users_user_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('users/user/form/form.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
            ]);
    } //--- Fin de la function editAction

    /**
     * --- DeleteAction ---
     *
     * @Route("/users/user/delete", name="ics_crypto_users_user_delete", methods={"POST"})
     * @author Philippe Basuyau
     */
    public function deleteAction(Request $request, EntityManagerInterface $em, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $em->remove($user);
            $em->flush();
        }
        $this->addFlash('warning', "L'utilisateur  :".$user->getName().".".$user->getSurname().'  a été supprimée.');

        return $this->redirectToRoute('crypto_users_user_homepage', [], Response::HTTP_SEE_OTHER);
    }//--- Fin de la function Delete

}//--- Fin de la class UserController

