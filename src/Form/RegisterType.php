<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class,[
            "label" => false
        ])
        ->add('prenom', TextType::class,[
            "label" => false
        ])
        ->add('telephone', TelType::class,[
            "label" => false
        ])
        ->add('adresse', TextType::class,[
            "label" => false
        ])
        ->add('date', DateType::class,[
            "label" => false
        ])
        ->add('email', EmailType::class,[
            "label" => false
        ])
        ->add('password', RepeatedType::class,[
            'invalid_message' => 'le mot de passe et la confirmation devient etre identique',
            'label' => 'votre mot de passe',
            'required' => true ,
            'first_options' => [
            'label' =>'Mot de passe',
             'attr' =>[ 
                 'placeholder' => 'Merci de saisie votre mot de passe',
             ]
             ],
             'second_options' => [
                'label' =>' Confirmer votre mot de passe',
                 'attr' =>[ 
                     'placeholder' => 'Merci de confirmer votre mot de passe',
                 ]
                 ]
        ])
        ->add('submit', SubmitType::class,[
            'label' => 'inscrit'
        ])
        
        
    ;
}

public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults([
        'data_class' => User::class,
    ]);
}
}