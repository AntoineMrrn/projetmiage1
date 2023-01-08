<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class LoginController extends AbstractController
{

    /**
     * @Route("/login_user", name="login_user")
     */

    public function login_user(Request $request)
    {
        return $this->render('login/login.html.twig');
    }

    /**
     * @Route("/inscription_user", name="inscription_user")
     */

     public function inscription_user(Request $request)
     {
         return $this->render('login/inscription.html.twig');
     }
}
