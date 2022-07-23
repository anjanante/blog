<?php

namespace App\Controller\Admin;

use App\Entity\Articles;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ArticlesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Articles::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Article')
            ->setEntityLabelInPlural('Articles')
            ->setDateFormat('d/m/Y à H:i')
            // ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
        ;
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            TextField::new('Titre'),
            TextEditorField::new('contenu'),
            DateTimeField::new('created_at')
        ];
    }
}
