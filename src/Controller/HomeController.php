<?php

namespace App\Controller;

use App\Repository\ActualiteRepository;
use App\Repository\CompetitionRepository;
use App\Repository\PartenaireRepository;
use App\Repository\StreamerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CompetitionRepository $competitionRepository, PartenaireRepository $partenairesRepository, StreamerRepository $streamerRepository, ActualiteRepository $actualiteRepository): Response
    {
        $competitions = $competitionRepository->findAll();
        $partenaires = $partenairesRepository->findAll();
        $streamers = $streamerRepository->findAll();
        $actualites = $actualiteRepository->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'competitions' => $competitions,
            'partenaires' => $partenaires,
            'streamers' => $streamers,
            'actualites' => $actualites,
        ]);
    }

    #[Route('/actualites', name: 'app_actualites')]
    public function actualites(ActualiteRepository $actualiteRepository): Response
    {
        $actualites = $actualiteRepository->findAll();

        return $this->render('home/actualites.html.twig', [
            'controller_name' => 'HomeController',
            'actualites' => $actualites,
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
