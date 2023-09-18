<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class ImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Image::class;
    }

    public function configureFields(string $pageName): iterable
    {
            yield ImageField::new('imageCompetition', 'Image de compétition (image recommandé : 400x150)')
                ->setUploadDir('public/medias/images/competition')
                ->setRequired(false);

            yield ImageField::new('imagePartenaire', 'Image de partenaire (image recommandé : 550x200)')
                ->setUploadDir('public/medias/images/partenaire')
                ->setRequired(false);

            yield ImageField::new('imageActualite', 'Image d\'actualité (image recommandé : 300x300)')
                ->setUploadDir('public/medias/images/actualite')
                ->setRequired(false);

            yield ImageField::new('imageStreamer', 'Image de streamer (image recommandé : 330x175)')
                ->setUploadDir('public/medias/images/streamer')
                ->setRequired(false);
    }

}
