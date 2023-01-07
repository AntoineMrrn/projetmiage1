<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BienRepository;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Environment;
use App\Entity\Bien;
use App\Entity\Categorie;
use Symfony\Component\Form\Forms;

class AccueilController extends AbstractController
{
    /**
     *@Route("/", name="accueil")
     */
    public function accueil(EntityManagerInterface $em)
    {
        $br = $em->getRepository(Bien::class);
        $cr = $em->getRepository(Categorie::class);

        /*
        //find les categories
        $categories = [];
        $categories = $cr->findAll();

        foreach ($categories as $category) {
            $categories[] = $category->getNomCategorie();
        }

        dd($categories);
        */

        /*
        //création de catégorie

        $categorie = new Categorie();
        $categorie ->setNomCategorie('Exploitation');

        $em->persist($categorie);
        $em->flush();

        dd($categories);
        */

        /*
        //création de bien
        $bien = new Bien();
        $bien->setTitre('Maison ancienne');
        $bien->setUrl('Maison-ancienne10');
        $bien->setCp(35420);
        $bien->setPrix(75000);
        $bien->setVille("Monthault");
        $bien->setDescription("ancienne maison a vendre");
        $bien->setSurface(160);

        $em->persist($bien);
        $em->flush();

        dd("bien ajouté!" . $bien);
        */

        //chercher bien 2 puis // modifier son code postal

        $bienSET = $br->find(8);
        $bienSET->setcp('999');
        $em->persist($bienSET);
        $em->flush();
        
        dd("bien modifié!");


        //return $this->render('home.html.twig');
    }
}

class AccueilController2 extends AbstractController
{
    public function accueil(BienRepository $bienRepository)
    {
        $count = $bienRepository->count([]);
        $bienfind2 = $bienRepository->find(2);
        $bienfindcp = $bienRepository->findBy(['cp' => 35000]);
        $bien8 = $bienRepository->findBy(['cp' => '35000', 'prix' => ['<', 50000]]);

        dd($bien8);

        //return $this->render('home.html.twig');
    }
}
