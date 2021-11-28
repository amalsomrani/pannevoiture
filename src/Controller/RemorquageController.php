<?php

namespace App\Controller;
use App\Form\AjouterType;
use App\Entity\Remorquage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

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
    /**
     *  @IsGranted("ROLE_USER")
     * @Route("/remorquage/{id}", name="remorquage_show")
    */
    public function remorquage_show($id)
    {
        $remorquage = $this->getDoctrine()
                      ->getRepository(Remorquage::class)
                      ->findOneBy(['id'=>$id]);
                      return $this->render('remorquage/show.html.twig', [
                        'remorquage' => $remorquage
                    ]);
    }
 
     /**
     *  @IsGranted("ROLE_USER")
     * @Route("/remorquage/{id}", name="remorquage_itineraire")
    */
    public function remorquage_itineraire($id)
    {
        $remorquage = $this->getDoctrine()
                      ->getRepository(Remorquage::class)
                      ->findOneBy(['id'=>$id]);
                      return $this->render('remorquage/itineraire.html.twig', [
                        'remorquage' => $remorquage
                    ]);
    }
     /**
     * @Route("/remorquage/new", name="new_remorquage")
     * 
     */
    public function new(Request $request) {
        $remorquage = new Remorquage();
      
        $form = $this->createForm(AjouterType::class,$remorquage);

        $form->handleRequest($request);
  
        if($form->isSubmitted() && $form->isValid()) {
          $remorquage = $form->getData();
  
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->persist($remorquage);
          $entityManager->flush();
  
          return $this->redirectToRoute('remorquage');
        }
        return $this->render('remorquage/new.html.twig',['form' => $form->createView()]);
    }

      

     

    /**
     * 
     * @Route("/remorquage/edit/{id}", name="edit_remorquage")
     * 
     */
    public function edit(Request $request, $id) {
        $remorquage = new Remorquage();
        $remorquage = $this->getDoctrine()->getRepository(Remorquage::class)->find($id);
  
        $form = $this->createForm(AjouterType::class,$remorquage);
  
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
  
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->flush();
  
          return $this->redirectToRoute('remorquage');
        }
  
        return $this->render('remorquage/edit.html.twig', ['form' => $form->createView()]);
      }

   /**
    * 
     * @Route("/remorquage/delete/{id}",name="delete_remorquage")
     * 
     */
    public function delete(Request $request, $id) {
        $remorquage = $this->getDoctrine()->getRepository(Remorquage::class)->find($id);
  
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($remorquage);
        $entityManager->flush();
  
        $response = new Response();
        $response->send();

        return $this->redirectToRoute('remorquage');
      }

}
