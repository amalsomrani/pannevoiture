<?php

namespace App\Form;

use App\Entity\Demande;
use App\Entity\Panne;
use App\Entity\Service;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DemandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('dateajout', DateType::class,[

            'label'=>'Date de demande'
        ])
        ->add('typevoiture', TextType::class,[

            'label'=>'type voiture'
        ])
        ->add('longitude', TextType::class,[

            'label'=>'lieu'
        ])
        
        ->add('service', EntityType::class,['class'=>Service::class,
             'choice_label'=>'nom',
            'label'=>'nom de service'
        ])

        ->add('panne',EntityType::class,['class' => Panne::class,
        'choice_label' => 'type'  ])
   

        ->add('submit', SubmitType::class,[
            'label'=> "envoyer",
            'attr' => [

                'class'=>'btn w-100 text-white btn-lg bg-dark',
            ]
        ])
       ;
    
}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(array(
            'data_class' => Demande::class,
    
        ));
    }
}
