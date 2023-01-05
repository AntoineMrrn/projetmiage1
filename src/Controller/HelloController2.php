<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HelloController2 extends AbstractController
{
    /**
     *@Route("/hello2/{prenom}" , name="hello2", methods={"GET","POST"})
     */

    public function hello2($prenom, Environment $twig)
    {
        $html = $twig->render('hello2.html.twig', [
            'prenom' => $prenom,
            'bien1' => ['id' => 234, 'ville' => 'Rennes', 'prix' => 500000],
            'bien2' => ['id' => 731, 'ville' => 'Cesson', 'prix' => 300000]
        ]);

        return new Response($html);
    }
}
