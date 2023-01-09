<?php

namespace App\Controller;

use App\Entity\Administrateur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Form\RegistrationFormType;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class RegisterController extends AbstractController
{
    /**
     * @Route("/inscription_user", name="inscription_user")
     */

    public function inscription_user(Request $request)
    {
        return $this->render('register/inscription.html.twig');
    }
}
