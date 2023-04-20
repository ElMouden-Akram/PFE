<?php

namespace App\Controller\Admin;

use App\Entity\OffreEmploi;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OffreEmploiCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OffreEmploi::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setEntityLabelInPlural('Offre d\'emploi')
        ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    }
    
    //🚧ici on definie les input a avoir dans la page de modification et/ou table des info
    //check this video 🔥 : https://www.youtube.com/watch?v=6T8d1HFDaBk&list=PLUiuGjup8Vg5t20nu7aaJDnbHlhzXbbuN&index=28
    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id')
                // ->hideOnIndex(), //1
            TextField::new('titre'),
            TextField::new('ajouterPar.getFirstName','Partager par')
                ->setFormTypeOption('disabled','disabled'),  //2 : pour ne pas la modifier🚧
            TextField::new('ajouterPar.getLastName','')
                ->setFormTypeOption('disabled','disabled'),
            DateTimeField::new('date_ajout')
                ->setFormTypeOption('disabled','disabled'),
            TextareaField::new('Description')
                ->hideOnIndex() //3
                ->setFormType(CKEditorType::class)
        ];
    }
    
}
