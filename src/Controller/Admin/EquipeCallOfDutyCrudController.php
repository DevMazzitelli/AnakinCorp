<?php

namespace App\Controller\Admin;

use App\Entity\EquipeCallOfDuty;
use App\Entity\EquipeRocket;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EquipeCallOfDutyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EquipeCallOfDuty::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('firstname', 'Prénom');
        yield TextField::new('lastname', 'Nom');
        yield TextareaField::new('presentationIRL', 'Présentation IRL');
        yield TextareaField::new('presentationIG', 'Présentation IG');
        yield ChoiceField::new('images', 'Sélectionner une image (image recommandé : 400x150)')
            ->setChoices($this->getImageChoices())
            ->setRequired(false);
    }

    private function getImageChoices(): array
    {
        $imagesCompetition = '../public/medias/images/equipeCallOfDuty';
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
        if ($entityInstance instanceof EquipeCallOfDuty) {
            $this->processUploadedImages($entityInstance);

            $entityManager->persist($entityInstance);
            $entityManager->flush();
        }
    }

    private function processUploadedImages(EquipeCallOfDuty $competition): void
    {

    }

}