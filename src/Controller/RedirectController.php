<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UrlShortnerRepository;

class RedirectController extends AbstractController
{
    /**
     * @Route("/redirect/{slug}", name="redirect")
     */
    public function index(UrlShortnerRepository $urlShortnerRepository, string $slug): Response
    {
        $redirect = $urlShortnerRepository->findOneBy(['slug' => $slug]);
        if (!$redirect) {
            return $this->redirectToRoute('home', [], 302);
        }
        return $this->redirect($redirect->getUrl());
    }
}
