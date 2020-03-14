<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class CoreController extends AbstractController {


    /**
     * @Route("/", name="admin_index")
     */
    public function index() {
        return $this->render('admin/base.html.twig');
    }
}