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
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CompetitionRepository $competitionRepository, PartenaireRepository $partenairesRepository, StreamerRepository $streamerRepository, ActualiteRepository $actualiteRepository, CompteurRepository $compteurRepository, Request $request, SessionInterface $session): Response
    {

        $cookiesAccepted = $session->get('cookiesAccepted');

        if (!$cookiesAccepted) {
            // Si l'utilisateur n'a pas encore accepté les cookies, marquez-le dans la session
            $session->set('cookiesAccepted', true);
        }

        $cookiesAccepted = $request->cookies->get('cookiesAccepted');
        $hasAcceptedCookies = $cookiesAccepted === 'true';


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
            'hasAcceptedCookies' => $hasAcceptedCookies,
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
