<?php

namespace App\Controller\Admin;

use App\Entity\PublicHolidays;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PublicHolidaysCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PublicHolidays::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
