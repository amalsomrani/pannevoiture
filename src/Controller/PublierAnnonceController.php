<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublierAnnonceController extends AbstractController
{
    /**
     * @Route("/publier/annonce", name="publier_annonce")
     */
    public function index(): Response
    {
        return $this->render('publier_annonce/index.html.twig', [
            'controller_name' => 'PublierAnnonceController',
        ]);
    }
}
