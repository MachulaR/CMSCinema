<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{

    /**
     * @Route("/")
     * @Route("/login", name="login")
     */
    public function login(Request $request, AuthenticationUtils $authenticationUtils, AuthorizationCheckerInterface $authChecker){

        if (true === $authChecker ->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('dashboard');
        }

        $error = $authenticationUtils -> getLastAuthenticationError();
        $lastUserName = $authenticationUtils -> getLastUsername();

        return $this->render('login/login.html.twig', [
            'error' => $error,
            'last_username' => $lastUserName,
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout(){

    }


}