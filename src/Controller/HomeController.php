<?php

namespace App\Controller;

use App\Entity\Mecancien;
use App\Entity\Remorquage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/remorquage/{id}", name="remorquage_show")
    */
    public function remorquage_show($id)
    {
        $remorquage = $this->getDoctrine()
                      ->getRepository(Remorquage::class)
                      ->findOneBy(['id'=>$id]);
                      return $this->render('remorquage/remorquage_show.html.twig', [
                        'remorquage' => $remorquage
                    ]);
}
 /**
     * @Route("mecncien/{id}", name="mecancien_show")
    */
    public function mecancien_show($id)
    {
        $mecancien = $this->getDoctrine()
                      ->getRepository(Mecancien::class)
                      ->findOneBy(['id'=>$id]);
                      return $this->render('mecncien/mecancien_show.html.twig', [
                        'mecncien' => $mecancien
                    ]);
}
}
