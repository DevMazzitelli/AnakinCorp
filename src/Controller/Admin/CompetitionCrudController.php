<?php

namespace App\Controller\Admin;

use App\Entity\Competition;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class CompetitionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Competition::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('title', 'Titre');
        yield TextField::new('type', 'Quelle genre de compétition ?');
        yield DateTimeField::new('date', 'Date de la compétition');
        yield UrlField::new('link', 'Lien vers la compétition');
        yield ChoiceField::new('images', 'Sélectionner une image (image recommandé : 400x150)')
            ->setChoices($this->getImageChoices())
            ->setRequired(false);
    }

    private function getImageChoices(): array
    {
        $imagesCompetition = '../public/medias/images/competition';
        $imageChoices = [];

        // Lire les fichiers dans le dossier des images
        $imageFiles = scandir($imagesCompetition);

        foreach ($imageFiles as $imageFile) {
            // Exclure les fichiers "." et ".."
            if ($imageFile !== '.' && $imageFile !== '..') {
                $imageChoices[$imageFile] = $imageFile;
            }
        }

        return $imageChoices;
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance instanceof Competition) {
            $this->processUploadedImages($entityInstance);

            $entityManager->persist($entityInstance);
            $entityManager->flush();
        }
    }

    private function processUploadedImages(Competition $competition): void
    {

    }
}
