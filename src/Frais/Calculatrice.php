<?php

namespace App\Frais;

use Symfony\Component\HttpFoundation\Response;
use Cocur\Slugify\Slugify;
use Twig\Environment;

class Calculatrice
{
    protected $taux;

    public function __construct(float $taux)
    {
        $this->taux = $taux;
    }
    public function calcul(float $prix)
    {
        return $prix * $this->taux;
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
