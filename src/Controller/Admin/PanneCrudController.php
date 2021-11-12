<?php

namespace App\Controller\Admin;

use App\Entity\Panne;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PanneCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Panne::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('type'),
            DateField::new('date'),
            TextField::new('lieu')
        ];
    }
    
}
