<?php

namespace App\Controller\Admin;

use App\Entity\Compteur;
use App\Entity\Partenaire;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
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

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance instanceof Compteur) {
            $entityManager->persist($entityInstance);
            $entityManager->flush();
        }
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable( 'delete');
    }

}
