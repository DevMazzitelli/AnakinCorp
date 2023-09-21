<?php

namespace App\Controller;

use App\Entity\EquipeCallOfDuty;
use App\Entity\EquipeRocket;
use App\Repository\EquipeApexLegendsRepository;
use App\Repository\EquipeCallOfDutyRepository;
use App\Repository\EquipeRocketRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EquipeEsportController extends AbstractController
{
    // Rocket league
    #[Route('/equipe/rocketleague', name: 'app_equipe_rocketleague')]
    public function rocketleague(EquipeRocketRepository $equipeRocketRepository): Response
    {
        $equipeRocket = $equipeRocketRepository->findAll();

        return $this->render('equipe/rocketleague.html.twig', [
            'controller_name' => 'EquipeEsportController',
            'equipeRocket' => $equipeRocket,
        ]);
    }

    //Call of duty
    #[Route('/equipe/callofduty', name: 'app_equipe_callofduty')]
    public function callofduty(EquipeCallOfDutyRepository $equipeCallOfDutyRepository): Response
    {
        $equipeCallOfDuty = $equipeCallOfDutyRepository->findAll();
        return $this->render('equipe/callofduty.html.twig', [
            'controller_name' => 'EquipeEsportController',
            'equipeCallOfDuty' => $equipeCallOfDuty,
        ]);
    }

    //Apex Legends
    #[Route('/equipe/apexlegends', name: 'app_equipe_apexlegends')]
    public function apexlegends(EquipeApexLegendsRepository $equipeApexLegendsRepository): Response
    {
        $equipeApexLegends = $equipeApexLegendsRepository->findAll();
        return $this->render('equipe/apexlegends.html.twig', [
            'controller_name' => 'EquipeEsportController',
            'equipeApexLegends' => $equipeApexLegends,
        ]);
    }
}
