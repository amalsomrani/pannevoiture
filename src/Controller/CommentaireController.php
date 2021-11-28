<?php

namespace App\Controller;

use App\Entity\Service;
use App\Entity\Commentaire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommentaireController extends AbstractController

  {
    /**
     * @Route("/commentaire", name="commentaire")
     */
     private $entityManager;

     public function __construct(EntityManagerInterface $entityManager ){
     $this->entityManager = $entityManager;
     }

public function index(): Response
{
    $commentaire = $this->entityManager->getRepository(Service::class)->findAll();
    return $this->render('commentaire/index.html.twig', [
        'commentaire' =>$commentaire  
    ]);
}

   
    public function add(Request $request)
    {
        $post_id = $request->request->get('post_id');

        $user = $this->getUser();

        $post = $this->getDoctrine()
                ->getRepository(Service::class)
                ->find($post_id);

        $commentaire = new Commentaire();
        $commentaire->setText($request->request->get('Commentaire'));
        $commentaire->setUser($user);
       
        $commentaire->setDate(new \DateTimeInterface());

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($commentaire);
        $entityManager->flush();

        $post_id = $post->getId();

        return $this->redirectToRoute('service',[
            'id' =>  $post_id
        ]);
    }
}