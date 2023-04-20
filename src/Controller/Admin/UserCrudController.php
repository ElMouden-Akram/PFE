<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Les utilisateurs')
            ->setEntityLabelInSingular('l\'utilisateur')
            ->setPaginatorPageSize(10)

    ;}
    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('First_Name','Prenom'),
            TextField::new('Last_Name','Nom'),
            ArrayField::new('Roles'),
            TextField::new('CNI'),
            TelephoneField::new('numTelephone'),
            // TextEditorField::new('description'),
        ];
    }
}
