<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BienRepository;
use Twig\Environment;

class AccueilController extends AbstractController
{
    /**
     *@Route("/", name="accueil")
     */

    public function accueil(BienRepository $bienRepository)
    {
        $count = $bienRepository->count([]);
        $bienfind2 = $bienRepository->find(2);
        $bienfindcp = $bienRepository->findBy(['cp' => 35000]);
        $bien8 = $bienRepository->findBy(['cp' => '35000', 'price' => ['<', 50000]]);


        dd($bien8);

        //return $this->render('home.html.twig');
    }
}
