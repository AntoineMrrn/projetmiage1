<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HelloController extends AbstractController
{
    /**
     *@Route("/hello/{prenom}/{department<\d+>?0}" , name="hello", methods={"GET","POST"})
     */

    public function hello($prenom, $department)
    {
        $pays_codes = [
            'FR' => 'France',
            'US' => 'Etats-Unis'
        ];

        $html = $this->render('hello.html.twig', [
            'prenom' => $prenom,
            'department' => $department,
            'pays' => ['FR', 'US'],
            'pays_codes' => $pays_codes,
            'bien' => [
                'id' => 234,
                'ville' => 'Rennes',
                'prix' => 500000
            ]
        ]);

        return new Response($html);
    }
}
