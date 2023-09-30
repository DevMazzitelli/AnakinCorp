<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        // Personnalisez les messages d'erreur en fonction du type d'erreur
        $errorMessage = '';

        if ($error instanceof AuthenticationException) {
            // Utilisez les détails spécifiques de l'exception pour déterminer le message
            if ($error->getMessageKey() === 'Bad credentials') {
                $errorMessage = 'Identifiants invalides. Veuillez réessayer.';
            } else {
                $errorMessage = 'Une erreur de connexion s\'est produite.';
            }
        }

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $errorMessage,
        ]);}

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route(path: '/mentions-legales', name: 'app_mentions')]
    public function mentions(): Response
    {
        return $this->render('security/mentions.html.twig');
    }

    #[Route(path: '/politique-confidentialite', name: 'app_politique')]
    public function politique(): Response
    {
        return $this->render('security/politique.html.twig');
    }
}
