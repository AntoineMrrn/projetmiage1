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
    //------------------------------------------------------------------------------------------------------------------------//

    /**
     * @Route("/categorie/terrainagricole", name="terrainagricole")
     */

    public function terrainagricole(EntityManagerInterface $em)
    {
        // Récupère le repository de Categorie et Bien
        $cr = $em->getRepository(Categorie::class);
        $br = $em->getRepository(Bien::class);

        // Récupère le titre des biens de la catégorie 1
        $biens_titre = [];
        $biens_titre = $br->findby(['categorie' => 1]);

        foreach ($biens_titre as $bien) {
            $liste_biens_titre[] = $bien->getTitre();
        }

        // Récupère le prix des biens de la catégorie 1
        $biens_prix = [];
        $biens_prix = $br->findby(['categorie' => 1]);

        foreach ($biens_prix as $bien) {
            $liste_biens_prix[] = $bien->getPrix();
        }

        // Récupère la surface des biens de la catégorie 1
        $biens_surface = [];
        $biens_surface = $br->findby(['categorie' => 1]);

        foreach ($biens_surface as $bien) {
            $liste_biens_surface[] = $bien->getSurface();
        }

        // Récupère le titre, le prix et la surface des biens de la catégorie 1
        /*
        $biens_données = [];
        $biens_données = $br->findby(['categorie' => 1]);

        foreach ($biens_données as $bien) {
            $liste_biens_données[] = $bien->getTitre();
            $liste_biens_données[] = $bien->getPrix();
            $liste_biens_données[] = $bien->getSurface();
        }
        */

        // Récupère la catégorie ayant l'ID 1
        $nomcategorie1 = $cr->find(1);

        // Renvoie la réponse contenant le rendu de la vue "categorie/pagecategorie.html.twig" et les données passées à la vue
        return $this->render('categorie/pagecategorie2.html.twig', [
            'nom_categorie' => $nomcategorie1->getNomCategorie(),

            'liste_biens' => ['titre' => $liste_biens_titre, 'prix' => $liste_biens_prix, 'surface' => $liste_biens_surface],
        ]);
    }

    //------------------------------------------------------------------------------------------------------------------------//

    /**
     * @Route("/categorie/prairie", name="prairie")
     */

    public function prairie(EntityManagerInterface $em)
    {
        // Récupère le repository de Categorie et Bien
        $cr = $em->getRepository(Categorie::class);
        $br = $em->getRepository(Bien::class);

        // Récupère l'id des biens de la catégorie 2
        $biens_id = [];
        $biens_id = $br->findby(['categorie' => 2]);

        foreach ($biens_id as $bien) {
            $liste_biens_id[] = $bien->getId();
        }


        // Récupère le titre des biens de la catégorie 2
        $biens_titre = [];
        $biens_titre = $br->findby(['categorie' => 2]);

        foreach ($biens_titre as $bien) {
            $liste_biens_titre[] = $bien->getTitre();
        }

        // Récupère le prix des biens de la catégorie 2
        $biens_prix = [];
        $biens_prix = $br->findby(['categorie' => 2]);

        foreach ($biens_prix as $bien) {
            $liste_biens_prix[] = $bien->getPrix();
        }

        // Récupère la surface des biens de la catégorie 2
        $biens_surface = [];
        $biens_surface = $br->findby(['categorie' => 2]);

        foreach ($biens_surface as $bien) {
            $liste_biens_surface[] = $bien->getSurface();
        }

        // Récupère la catégorie ayant l'ID 2
        $nomcategorie2 = $cr->find(2);

        // Renvoie la réponse contenant le rendu de la vue "categorie/pagecategorie.html.twig" et les données passées à la vue
        return $this->render('categorie/pagecategorie.html.twig', [
            'nom_categorie' => $nomcategorie2->getNomCategorie(),

            'liste_biens' => ['titre' => $liste_biens_titre, 'prix' => $liste_biens_prix, 'surface' => $liste_biens_surface],
        ]);
    }

    //------------------------------------------------------------------------------------------------------------------------//

    /**
     * @Route("/categorie/bois", name="bois")
     */

    public function bois(EntityManagerInterface $em)
    {
        // Récupère le repository de Categorie et Bien
        $cr = $em->getRepository(Categorie::class);
        $br = $em->getRepository(Bien::class);

        // Récupère le titre des biens de la catégorie 3
        $biens_titre = [];
        $biens_titre = $br->findby(['categorie' => 3]);

        foreach ($biens_titre as $bien) {
            $liste_biens_titre[] = $bien->getTitre();
        }

        // Récupère le prix des biens de la catégorie 3
        $biens_prix = [];
        $biens_prix = $br->findby(['categorie' => 3]);

        foreach ($biens_prix as $bien) {
            $liste_biens_prix[] = $bien->getPrix();
        }

        // Récupère la surface des biens de la catégorie 3
        $biens_surface = [];
        $biens_surface = $br->findby(['categorie' => 3]);

        foreach ($biens_surface as $bien) {
            $liste_biens_surface[] = $bien->getSurface();
        }

        // Récupère la catégorie ayant l'ID 3
        $nomcategorie3 = $cr->find(3);

        // Renvoie la réponse contenant le rendu de la vue "categorie/pagecategorie.html.twig" et les données passées à la vue
        return $this->render('categorie/pagecategorie.html.twig', [
            'nom_categorie' => $nomcategorie3->getNomCategorie(),

            'liste_biens' => ['titre' => $liste_biens_titre, 'prix' => $liste_biens_prix, 'surface' => $liste_biens_surface],
        ]);
    }

    //------------------------------------------------------------------------------------------------------------------------//

    /**
     * @Route("/categorie/batiment", name="batiment")
     */

    public function batiment(EntityManagerInterface $em)
    {
        // Récupère le repository de Categorie et Bien
        $cr = $em->getRepository(Categorie::class);
        $br = $em->getRepository(Bien::class);

        // Récupère le titre des biens de la catégorie 4
        $biens_titre = [];
        $biens_titre = $br->findby(['categorie' => 4]);

        foreach ($biens_titre as $bien) {
            $liste_biens_titre[] = $bien->getTitre();
        }

        // Récupère le prix des biens de la catégorie 4
        $biens_prix = [];
        $biens_prix = $br->findby(['categorie' => 4]);

        foreach ($biens_prix as $bien) {
            $liste_biens_prix[] = $bien->getPrix();
        }

        // Récupère la surface des biens de la catégorie 4
        $biens_surface = [];
        $biens_surface = $br->findby(['categorie' => 4]);

        foreach ($biens_surface as $bien) {
            $liste_biens_surface[] = $bien->getSurface();
        }


        // Récupère la catégorie ayant l'ID 4
        $nomcategorie4 = $cr->find(4);

        // Renvoie la réponse contenant le rendu de la vue "categorie/pagecategorie.html.twig" et les données passées à la vue
        return $this->render('categorie/pagecategorie.html.twig', [
            'nom_categorie' => $nomcategorie4->getNomCategorie(),

            'liste_biens' => ['titre' => $liste_biens_titre, 'prix' => $liste_biens_prix, 'surface' => $liste_biens_surface],
        ]);
    }

    //------------------------------------------------------------------------------------------------------------------------//

    /**
     * @Route("/categorie/exploitation", name="exploitation")
     */

    public function exploitation(EntityManagerInterface $em)
    {
        // Récupère le repository de Categorie et Bien
        $cr = $em->getRepository(Categorie::class);
        $br = $em->getRepository(Bien::class);

        // Récupère le titre des biens de la catégorie 5
        $biens_titre = [];
        $biens_titre = $br->findby(['categorie' => 5]);

        foreach ($biens_titre as $bien) {
            $liste_biens_titre[] = $bien->getTitre();
        }

        // Récupère le prix des biens de la catégorie 5
        $biens_prix = [];
        $biens_prix = $br->findby(['categorie' => 5]);

        foreach ($biens_prix as $bien) {
            $liste_biens_prix[] = $bien->getPrix();
        }

        // Récupère la surface des biens de la catégorie 5
        $biens_surface = [];
        $biens_surface = $br->findby(['categorie' => 5]);

        foreach ($biens_surface as $bien) {
            $liste_biens_surface[] = $bien->getSurface();
        }

        // Récupère la catégorie ayant l'ID 5
        $nomcategorie5 = $cr->find(5);

        // Renvoie la réponse contenant le rendu de la vue "categorie/pagecategorie.html.twig" et les données passées à la vue
        return $this->render('categorie/pagecategorie.html.twig', [
            'nom_categorie' => $nomcategorie5->getNomCategorie(),

            'liste_biens' => ['titre' => $liste_biens_titre, 'prix' => $liste_biens_prix, 'surface' => $liste_biens_surface],
        ]);
    }
}
