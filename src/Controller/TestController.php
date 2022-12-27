<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TestController
{
    function index()
    {
        dd("Ca fonctionne page index");
    }
    function test(Request $request)
    {
        $departement = $request->attributes->get('departement', 0);
        return new Response("bien dans le departement " . $departement);

        //dd($request);
    }
}
