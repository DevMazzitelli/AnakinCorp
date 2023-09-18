<?php

namespace App\Controller\Admin;

use App\Entity\Competition;
use App\Entity\Partenaire;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(UserCrudController::class)->generateUrl(); // récupère l'url

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('AnakinCorp');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Accueil', 'fa fa-home', 'app_home');

        yield MenuItem::linkToCrud('Ajouter une image', 'fas fa-plus', \App\Entity\Image::class)->setAction(Crud::PAGE_NEW);


        yield MenuItem::subMenu('Compétitions', 'fas fa-trophy')->setSubItems(
            [
                MenuItem::linkToCrud('Toutes les compétitions', 'fas fa-list', Competition::class),
                MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Competition::class)->setAction(Crud::PAGE_NEW),
            ]
        );

        yield MenuItem::subMenu('Partenaires', 'fas fa-handshake')->setSubItems(
            [
                MenuItem::linkToCrud('Tous les partenaires', 'fas fa-list', Partenaire::class),
                MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Partenaire::class)->setAction(Crud::PAGE_NEW),
            ]
        );
    }
}
