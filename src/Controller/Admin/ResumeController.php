<?php

namespace App\Controller\Admin;

use App\Entity\Resume;
use App\Entity\User;
use App\Form\ProfileType;
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
}