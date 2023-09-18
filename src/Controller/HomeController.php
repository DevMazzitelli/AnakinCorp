<?php

namespace App\Controller;

use App\Repository\CompetitionRepository;
use App\Repository\PartenaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CompetitionRepository $competitionRepository, PartenaireRepository $partenairesRepository): Response
    {
        $competitions = $competitionRepository->findAll();
        $partenaires = $partenairesRepository->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'competitions' => $competitions,
            'partenaires' => $partenaires,

        ]);
    }

    #[Route('/actualites', name: 'app_actualites')]
    public function actualites(): Response
    {
        return $this->render('home/actualites.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/partenaire', name: 'app_partenaire')]
    public function partenaire(PartenaireRepository $partenairesRepository): Response
    {

        $partenaires = $partenairesRepository->findAll();

        return $this->render('home/partenaire.html.twig', [
            'controller_name' => 'HomeController',
            'partenaires' => $partenaires,
        ]);
    }
}
