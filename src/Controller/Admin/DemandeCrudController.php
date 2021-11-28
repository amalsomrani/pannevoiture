<?php

namespace App\Controller\Admin;

use App\Entity\Demande;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Validator\Constraints\DateTime;

class DemandeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Demande::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('panne'),
            AssociationField::new('service'),
            DateTimeField::new('dateajout'),
            NumberField::new('longitude'),
            NumberField::new('altitude'),
            TextField::new('typevoiture')

        ];
    }

}
