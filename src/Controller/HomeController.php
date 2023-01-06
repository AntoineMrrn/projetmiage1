<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HomeController extends AbstractController
{
    /**
     *@Route("/homepage" , name="homepage", methods={"GET","POST"})
     */

    public function index(Environment $twig)
    {
        $html = $twig->render('home.html.twig');

        return new Response($html);
    }
}
