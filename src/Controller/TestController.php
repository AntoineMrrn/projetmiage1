<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;

class TestController
{

    /**
     *@Route("/test/{departement<\d+>?0}" , name="test", methods={"GET","POST"})
     */

    function index()
    {
        dd("Ca fonctionne page index");
    }
    function test(Request $request)
    {
        $dept = $request->attributes->get('dept', 0);
        return new Response("bien dans le departement " . $dept);

        //dd($request);
    }
}

/*class TestController
{
    protected $logger;
    function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    function index()
    {
        dd("Ca fonctionne");
    }
    function test(Request $request)
    {
        $dept = $request->query->get('departement', 0);
        $this->logger->info("message 1 de log");
        return new Response("bien dans le département " . $dept);
    }
}*/