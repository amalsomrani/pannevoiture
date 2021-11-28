<?php

namespace App\Form;

use App\Entity\Panne;
use App\Entity\Service;
use App\Entity\Remorquage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class AjouterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class,[
            "label" => false
        ])
        
        ->add('telephone', TelType::class,[
            "label" => false
        ])
        ->add('adresse', TextType::class,[
            "label" => false
        ])
        ->add('zoneintervention', TextType::class,[
            "label" => false
        ])
        ->add('joursdetravail', TextType::class,[
            "label" => false
        ])
        ->add('image', FileType::class,[
            "label" => false
        ])
        ->add('profession', TextType::class,[
            "label" => false
        ])
        
       
        ->add('submit', SubmitType::class,[
            'label' => 'Ajouter'
        ])
        
        
    ;
}

public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults([
        'data_class' => Remorquage::class,
    ]);
}
}
