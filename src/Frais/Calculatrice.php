<?php

namespace App\Frais;

use Symfony\Component\HttpFoundation\Response;
use Cocur\Slugify\Slugify;
use Twig\Environment;

class Calculatrice
{
    public function calcul(float $prix)
    {
        return $prix * 1.1;
    }
}

class BienImmo
{
    public function affichePrix(string $num, int $prix, Calculatrice $calculatrice, Environment $twig)
    {
        $html = $twig->render("bien $num de prix " . $calculatrice->calcul($prix));
        return new Response($html);
    }
}
