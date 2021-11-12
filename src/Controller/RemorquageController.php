<?php

namespace App\Controller;

use App\Entity\Remorquage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RemorquageController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager ){
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/remorquage", name="remorquage")
     */
    public function index(): Response
    {
        $remorquage = $this->entityManager->getRepository(Remorquage::class)->findAll();
        return $this->render('remorquage/index.html.twig', [
            'remorquage' =>$remorquage  
        ]);
    }
}
