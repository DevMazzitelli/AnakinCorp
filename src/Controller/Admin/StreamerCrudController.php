<?php

namespace App\Controller\Admin;

use App\Entity\Partenaire;
use App\Entity\Streamer;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class StreamerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Streamer::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            yield TextField::new('name', 'Nom'),
            yield UrlField::new('link', 'Lien du twitch'),
            yield ChoiceField::new('images', 'Sélectionner une image (image recommandé : 330x175)')
                ->setChoices($this->getImageChoices())
                ->setRequired(false)
        ];
    }

    private function getImageChoices(): array
    {
        $imagesCompetition = '../public/medias/images/streamer';
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
        if ($entityInstance instanceof Streamer) {
            $this->processUploadedImages($entityInstance);

            $entityManager->persist($entityInstance);
            $entityManager->flush();
        }
    }

    private function processUploadedImages(Streamer $competition): void
    {

    }
}
