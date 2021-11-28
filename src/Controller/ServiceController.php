<?php

namespace App\Controller;

use App\Entity\Service;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ServiceController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager ){
        $this->entityManager = $entityManager;
    }
    /** 
     * @Route("/service", name="service")
     */
    public function index(): Response
    {
        $service = $this->entityManager->getRepository(Service::class)->findAll();

        return $this->render('service/index.html.twig', [
            'service' =>$service
        ]);
    }
     /** 
     * @Route("/service/{id}", name="service_show")
     */
    public function show(Service $service, Request $request, EntityManagerInterface  $manager)
    {
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $commentaire->setDate(new \DateTime())
                     ->setService($service);

            $manager->persist($commentaire);
            $manager->flush();

            return $this->redirectToRoute('service_show', ['id' => $service->getId()]);
        }

        return $this->render('service/show.html.twig', [

            'service' => $service,
            'commentaireForm' => $form->createView()



        ]);
    }


}