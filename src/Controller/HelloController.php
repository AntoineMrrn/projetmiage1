<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use App\Entity\Bien;
use App\Entity\Categorie;

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

    /**
     *@Route("/hello2/{prenom}" , name="hello2", methods={"GET","POST"})
     */

    public function hello2($prenom, Environment $twig, EntityManagerInterface $em)
    {
        $br = $em->getRepository(Bien::class);
        $cr = $em->getRepository(Categorie::class);

        //afficher titre biens de la catégorie 5

        $biensCAT5_titre = [];
        $biensCAT5_titre = $br->findby(['categorie' => 5]);

        foreach ($biensCAT5_titre as $bien) {
            $biensCAT5Finish_titre[] = $bien->getTitre();
        }

        //afficher prix biens de la catégorie 5

        $biensCAT5_prix = [];
        $biensCAT5_prix = $br->findby(['categorie' => 5]);

        foreach ($biensCAT5_prix as $bien) {
            $biensCAT5Finish_prix[] = $bien->getPrix();
        }

        //afficher surface biens de la catégorie 5

        $biensCAT5_surface = [];
        $biensCAT5_surface = $br->findby(['categorie' => 5]);

        foreach ($biensCAT5_surface as $bien) {
            $biensCAT5Finish_surface[] = $bien->getSurface();
        }

        //recuperer la catégorie d'id 5
        $nomcategorie5 = $cr->find(5);

        return $this->render('hello2.html.twig', [

            'nom_categorie' => $nomcategorie5->getNomCategorie(),
            'liste_bien_cat5' => ['titre' => $biensCAT5Finish_titre, 'prix' => $biensCAT5Finish_prix, 'surface' => $biensCAT5Finish_surface]
        ]);
    }
}
