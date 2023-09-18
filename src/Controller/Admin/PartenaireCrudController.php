<?php

namespace App\Controller\Admin;

use App\Entity\Competition;
use App\Entity\Partenaire;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class PartenaireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Partenaire::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            yield TextField::new('name', 'Nom du partenaire'),
            yield UrlField::new('link', 'Lien vers le partenaire'),
            yield TextareaField::new('description', 'Description du partenaire'),
            yield UrlField::new('twitter', 'Twitter du partenaire'),
            yield UrlField::new('twitch', 'Twitch du partenaire'),
            yield UrlField::new('discord', 'Discord du partenaire'),
            yield ChoiceField::new('images', 'Sélectionner une image (image recommandé : 400x150)')
                ->setChoices($this->getImageChoices())
                ->setRequired(false)
        ];
    }

    private function getImageChoices(): array
    {
        $imagesCompetition = '../public/medias/images/partenaire';
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
        if ($entityInstance instanceof Partenaire) {
            $this->processUploadedImages($entityInstance);

            $entityManager->persist($entityInstance);
            $entityManager->flush();
        }
    }

    private function processUploadedImages(Partenaire $competition): void
    {

    }
}
