<?php

namespace App\Controller\Admin;

use App\Entity\Compteur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class CompteurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Compteur::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield integerField::new('nbrJoueur', 'Nombre de joueurs/ses');
        yield integerField::new('nbrMembre', 'Nombre de membres');
        yield integerField::new('nbrEquipe', 'Nombre d\'équipes');
        yield integerField::new('nbrStaff', 'Nombre de staffs');
    }

}
