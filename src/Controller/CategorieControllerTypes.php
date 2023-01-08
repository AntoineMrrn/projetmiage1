<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Entity\Categorie;
use App\Entity\Bien;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Doctrine\ORM\EntityManagerInterface;

class CategorieControllerTypes extends AbstractController
{
    /**
     * @Route("/categorie/batiment", name="batiment")
     */

    public function batiment()
    {
        return $this->render('categorie/batiment.html.twig');
    }

    /**
     * @Route("/categorie/bois", name="bois")
     */

     public function bois()
     {
         return $this->render('categorie/bois.html.twig');
     }
     
    /**
     * @Route("/categorie/exploitation", name="exploitation")
     */

    public function exploitation()
    {
        return $this->render('categorie/exploitation.html.twig');
    }
    
    /**
     * @Route("/categorie/prairie", name="prairie")
     */

     public function prairie()
     {
         return $this->render('categorie/prairie.html.twig');
     }
     
    /**
     * @Route("/categorie/terrainagricole", name="terrainagricole")
     */

    public function terrainagricole()
    {
        return $this->render('categorie/terrainagricole.html.twig');
    }
    
}
