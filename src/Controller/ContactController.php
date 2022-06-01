<?php

namespace ICS\CryptoBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use ICS\CryptoBundle\Entity\Crypto\Users\Contact;
use ICS\CryptoBundle\Form\Type\Users\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/users/contact", name="ics_crypto_users_contact_homepage", methods={"GET"})
     *  @author Philippe Basuyau
     */
    public function index(EntityManagerInterface $em): Response
    {
        $contacts = $em
            ->getRepository(Contact::class)
            ->findAll();

            return $this->render('@Crypto/token/contact/index.html.twig', [
                'contacts' => $contacts,
            ]);
    }//--- Fin de la function index

    
    /**
     * --- AddAction ---
     * @Route("/users/contact/add", name="ics_crypto_users_contact_add")
     * @author Philippe Basuyau
     */
    public function addAction(Request $request, EntityManagerInterface $em): Response
    {
        $contact = new Contact();

        $form = $this->createForm(UserType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            $contact->setTel();
            $contact->setAdressMail();

            $em->persist($contact);
            $em->flush();

            $this->addFlash('success',"L'adresse mail : ".$contact->getAdressMail().' a bien été créé');

            return $this->redirectToRoute('ics_crypto_users_contact_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Crypto/users/contact/form/form.html.twig', [
            'form' => $form->createView(),
            'contact' => $contact,
        ]);
    } //--- Fin de la function addAction

    /**
     * --- EditAction ---
     * @Route("/users/contact/edit", name="ics_crypto_users_contact_edit", methods={"GET", "POST"} )
     * @author Philippe Basuyau
     */
    public function editAction(ManagerRegistry $doctrine, EntityManagerInterface $em, Request $request, $id,  Contact $contact): Response
    {
        $contact = $doctrine->getRepository(Contact::class)->find($id);

        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            $em = $this->$em->getManager();
            $em->persist($contact);
            $em->flush();

            $this->addFlash('success', "L'adresse mail' : ".$contact->getAdressMail().' a bien été modifiée');

            return $this->redirectToRoute('ics_crypto_users_contact_homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Crypto/users/contact/form/form.html.twig', [
            'form' => $form->createView(),
            'contact' => $contact,
            ]);
    } //--- Fin de la function editAction

    /**
     * --- DeleteAction ---
     *
     * @Route("/users/contact/delete", name="ics_crypto_contact_user_delete", methods={"POST"})
     * @author Philippe Basuyau
     */
    public function deleteAction(Request $request, EntityManagerInterface $em, Contact $contact): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contact->getId(), $request->request->get('_token'))) {
            $em->remove($contact);
            $em->flush();
        }
        $this->addFlash('warning', "L'adresse mail' : ".$contact->getAdressMail().'  a été supprimée.');

        return $this->redirectToRoute('ics_crypto_users_contact_homepage', [], Response::HTTP_SEE_OTHER);
    }//---Fin de la function Delete

}//--- Fin de la class ContactController
