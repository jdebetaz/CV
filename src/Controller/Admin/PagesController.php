<?php

namespace App\Controller\Admin;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends BaseController
{
    /**
     * @Route("/admin", name="admin_home")
     */
    public function index(): Response
    {
        return $this->render('admin/pages/index.html.twig', [
            'controller_name' => 'AdminPagesController',
            'menu' => 'home',
        ]);
    }
}
