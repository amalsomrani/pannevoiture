<?php
namespace App\Controller;

use App\Form\AjouterType;
use App\Entity\Remorquage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AjouterController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager ){
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/ajouter", name="ajouter")
     */
    public function index(Request $request , UserPasswordEncoderInterface $encoder ): Response
    {

        $notification = null;

        $remorquage = new Remorquage();
        $form = $this->createForm(AjouterType::class, $remorquage);
        $form ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            
            $file = $remorquage->getImage();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $entityManager = $this->getDoctrine()->getManager();
            $remorquage->setImage($fileName);
            
            $remorquage = $form->getData();
            $remorquage_find = $this->entityManager->getRepository(Remorquage::class)->findOneByEmail($remorquage->getEmail());

            if (!$remorquage_find){

                $password = $encoder->encodePassword($remorquage ,$remorquage ->getPassword());
                $remorquage ->setPassword($password);

            }

            $this->entityManager->persist($remorquage);
            $this->entityManager->flush();

            $notification = "Votre annoce  s'est bien déroulée";
        }else{
            $notification = "L'email utilié existe déja";
        }


        return $this->render('ajouter/index.html.twig', [
            'form' => $form->createView(),
            'notification' => $notification
        ]);
    }
}
