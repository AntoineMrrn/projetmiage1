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

        //afficher id biens de la catégorie 5

        $biensCAT5_id = [];
        $biensCAT5_id = $br->findby(['categorie' => 5]);

        foreach ($biensCAT5_id as $bien) {
            $biensCAT5Finish_id[] = $bien->getId();
        }

        //recuperer la catégorie d'id 5
        $nomcategorie5 = $cr->find(5);

        //------------------------------

        $br = $em->getRepository(Bien::class);

        $allbiens = [];
        $allbiens = $br->findAll();

        foreach ($allbiens as $bien) {
            $allbiens_titre[] = $bien->getTitre();
        }
        foreach ($allbiens as $bien) {
            $allbiens_description[] = $bien->getDescription();
        }
    
        $random_keys = array_rand($allbiens_titre, 3);

        return $this->render('hello2.html.twig', [

            'nom_categorie' => $nomcategorie5->getNomCategorie(),
            'liste_bien_cat5' => ['id' => $biensCAT5Finish_id, 'titre' => $biensCAT5Finish_titre, 'prix' => $biensCAT5Finish_prix, 'surface' => $biensCAT5Finish_surface],
            'liste_biens_all' => ['titre' => $allbiens_titre],
            
            'randomkey_1' => $allbiens_titre[$random_keys[0]], 'randomkey_2' => $allbiens_titre[$random_keys[1]], 'randomkey_3' => $allbiens_titre[$random_keys[2]],
            'randomkey_desc1' => $allbiens_description[$random_keys[0]], 'randomkey_desc2' => $allbiens_description[$random_keys[1]], 'randomkey_desc3' => $allbiens_description[$random_keys[2]]
        ]);
    }
}
