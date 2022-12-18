<?php

namespace App\Controller\Admin;

use App\Entity\Country;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CountryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Country::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            yield TextField::new('countryCode'),
            yield TextField::new('name'),
            yield TextField::new('region'),
            yield TextField::new('officialName'),
            yield AssociationField::new('publicHolidays')->renderAsNativeWidget()
        ];
    }

}