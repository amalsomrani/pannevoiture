<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MecancienController extends AbstractController
{
    /**
     * @Route("/mecancien", name="mecancien")
     */
    public function index(): Response
    {
        return $this->render('mecancien/index.html.twig', [
            'controller_name' => 'MecancienController',
        ]);
    }
}
