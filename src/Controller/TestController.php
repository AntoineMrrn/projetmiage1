<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;
use App\Repository\BienRepository;

class TestController extends AbstractController
{
    function index()
    {
        dd("Ca fonctionne");
    }

    public function accueil(BienRepository $bienRepository)
    {
        dd($bienRepository->count([]));
    }

    /**
     *@Route("/test/{departement<\d+>?0}" , name="test", methods={"GET","POST"})
     */

    function test(Request $request)
    {
        $dept = $request->attributes->get('departement');
        return new Response("bien dans le département " . $dept);
    }
}

class TestController2
{
    protected $logger;
    function __construct()
    {
    }
    function index()
    {
        dd("Ca fonctionne");
    }
    function test(Request $request, LoggerInterface $logger)
    {
        $dept = $request->query->get('departement', 0);
        $logger->info("message 1 de log");
        return new Response("bien dans le département " . $dept);
    }
}
