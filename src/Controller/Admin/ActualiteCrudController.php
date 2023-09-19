<?php

namespace App\Controller\Admin;

use App\Entity\Actualite;
use App\Entity\Competition;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use http\Url;

class ActualiteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Actualite::class;
    }


    public function configureFields(string $pageName): iterable
    {
            yield TextField::new('title', 'Titre de la compétition');
            yield TextField::new('description', 'Description de la compétition');
            yield UrlField::new('link', 'Lien de la compétition');
            yield ChoiceField::new('images', 'Sélectionner une image (image recommandé : 300x300)')
                ->setChoices($this->getImageChoices())
                ->setRequired(false);
    }

    private function getImageChoices(): array
    {
        $imagesCompetition = '../public/medias/images/actualite';
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
        if ($entityInstance instanceof Actualite) {
            $this->processUploadedImages($entityInstance);

            $entityManager->persist($entityInstance);
            $entityManager->flush();
        }
    }

    private function processUploadedImages(Actualite $competition): void
    {

    }

}
