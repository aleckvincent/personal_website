<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\ProfileType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class CoreController extends AbstractController {


    /**
     * @Route("/", name="admin_index")
     */
    public function index(Request $request) {
        
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['first_name' => 'Aleck']);

        $form = $this->createForm(ProfileType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $this->addFlash('notice', 'Informations du profil mis à jour.');
            return $this->redirectToRoute('admin_index');
        }

        return $this->render('admin/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}