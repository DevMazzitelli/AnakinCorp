<?php

namespace App\Controller;

use App\Repository\CompteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompteurController extends AbstractController
{
    #[Route('/compteur', name: 'app_compteur')]
    public function index(CompteurRepository $compteurRepository): Response
    {
        $compteur = $compteurRepository->findOneBy( ['id' => '1']);

        $content = [
            'nbrJoueur' => $compteur->getNbrJoueur(),
            'nbrMembre' => $compteur->getNbrMembre(),
            'nbrEquipe' => $compteur->getNbrEquipe(),
            'nbrStaff' => $compteur->getNbrStaff(),
        ];
        return new JsonResponse($content);
    }
}
