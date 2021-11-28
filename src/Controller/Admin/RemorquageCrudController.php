<?php

namespace App\Controller\Admin;

use App\Entity\Remorquage;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;

class RemorquageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Remorquage::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('nom'),
            TextareaField::new('description'),
            TextField::new('adresse'),
            TelephoneField::new('telephone'),
            EmailField::new('email'),
            NumberField::new('lon'),
            NumberField::new('lat'),
            ImageField::new('image')
            ->setBasePath('images/')
            ->setUploadDir('public/images')
            ->setUploadedFileNamePattern('[randomhash].[extension]'),
        ];
    }
    
}
