<?php

namespace App\Controller\Admin;

use App\Entity\Resume;
use App\Entity\User;
use App\Form\ProfileType;
use App\Form\ResumeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/resume")
 */
class ResumeController extends AbstractController {


    /**
     * @Route("/", name="admin_resume_list")
     */
    public function list() {

       $repo = $this->getDoctrine()->getRepository(Resume::class);
      

        return $this->render('admin/resume/list.html.twig', [
            'schools' => $repo->findBy(['type' => 'School']),
            'works' => $repo->findBy(['type' => 'Work'])
        ]);
    }

     /**
     * @Route("/save", name="admin_resume_save")
     */
    public function save(Request $request)
    {
        $resume = new Resume();
        $form = $this->createForm(ResumeType::class, $resume);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($resume);
            $em->flush();
            $this->addFlash('notice', 'Nouvel élément ajouté au CV.');
            return $this->redirectToRoute('admin_resume_list');
        }
        return $this->render('admin/resume/save.html.twig', [
            'form' => $form->createView()
        ]);
    }
}