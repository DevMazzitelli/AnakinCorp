<?php

namespace App\Controller;

use App\Repository\ActualiteRepository;
use App\Repository\CompetitionRepository;
use App\Repository\CompteurRepository;
use App\Repository\PartenaireRepository;
use App\Repository\StreamerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CompetitionRepository $competitionRepository, PartenaireRepository $partenairesRepository, StreamerRepository $streamerRepository, ActualiteRepository $actualiteRepository, CompteurRepository $compteurRepository, Request $request): Response
    {

        $cookiesAccepted = $request->cookies->get('cookiesAccepted');

        if (!$cookiesAccepted) {
            // Si l'utilisateur n'a pas encore accepté les cookies, définissez le cookie
            $response = new Response();
            $response->headers->setCookie(new Cookie('cookiesAccepted', 'true', time() + 365 * 24 * 60 * 60)); // Le cookie expire dans un an
            $response->send();
        }

        $competitions = $competitionRepository->findAll();
        $partenaires = $partenairesRepository->findAll();
        $streamers = $streamerRepository->findAll();
        $actualites = $actualiteRepository->findAll();
        $compteurs = $compteurRepository->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'competitions' => $competitions,
            'partenaires' => $partenaires,
            'streamers' => $streamers,
            'actualites' => $actualites,
            'compteurs' => $compteurs,
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

    #[Route('/competition', name: 'app_competition')]
    public function competition(CompetitionRepository $competitionRepository): Response
    {

        $competitions = $competitionRepository->findAll();

        return $this->render('home/competition.html.twig', [
            'controller_name' => 'HomeController',
            'competitions' => $competitions,
        ]);
    }
}
