<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     *@Route("/", name="accueil")
     */
    public function homepage()
    {
        return $this->render('homepage.html.twig');
    }

    /**
     *@Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('contact.html.twig');
    }
}
