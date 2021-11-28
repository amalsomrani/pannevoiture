<?php

namespace App\Controller;

use App\Entity\Mecancien;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class MecancienController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager ){
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/mecancien", name="mecancien")
     */
    public function index(): Response
    {
        $mecancien = $this->entityManager->getRepository(Mecancien::class)->findAll();
        return $this->render('mecancien/index.html.twig', [
            'mecancien' =>$mecancien  
        ]);
    }
    /**
     *  @IsGranted("ROLE_USER")
     * @Route("/mecancien/{id}", name="mecancien_show")
    */
    public function mecancien_show($id)
    {
        $mecancien = $this->getDoctrine()
                      ->getRepository(Mecancien::class)
                      ->findOneBy(['id'=>$id]);
                      return $this->render('mecancien/show.html.twig', [
                        'mecancien' => $mecancien
                    ]);
    }
}

