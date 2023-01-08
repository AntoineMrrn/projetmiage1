<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class LoginController9 extends AbstractController
{

     /**
     * @Route("/login9", name="login9")
     */
    
    public function login(Request $request)
    {
        return $this->render('login/login.html.twig');
    }
}
