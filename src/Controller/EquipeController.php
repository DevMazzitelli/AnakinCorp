<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EquipeController extends AbstractController
{
    #[Route('/equipe', name: 'app_equipe')]
    public function index(): Response
    {
        return $this->render('equipe/index.html.twig', [
            'controller_name' => 'EquipeController',
        ]);
    }

    // Rocket league
    #[Route('/equipe/rocketleague', name: 'app_equipe_rocketleague')]
    public function rocketleague(): Response
    {
        return $this->render('equipe/rocketleague.html.twig', [
            'controller_name' => 'EquipeController',
        ]);
    }

    //Call of duty
    #[Route('/equipe/callofduty', name: 'app_equipe_callofduty')]
    public function callofduty(): Response
    {
        return $this->render('equipe/callofduty.html.twig', [
            'controller_name' => 'EquipeController',
        ]);
    }

    //Apex Legends
    #[Route('/equipe/apexlegends', name: 'app_equipe_apexlegends')]
    public function apexlegends(): Response
    {
        return $this->render('equipe/apexlegends.html.twig', [
            'controller_name' => 'EquipeController',
        ]);
    }
}
