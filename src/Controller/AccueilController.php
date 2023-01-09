<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Bien;

class AccueilController extends AbstractController
{
    /**
     *@Route("/", name="accueil")
     */
    public function accueil(EntityManagerInterface $em)
    {
        // Récupération du repository de l'entité Bien
        $br = $em->getRepository(Bien::class);

        // Récupération de tous les biens de la base de données
        $allbiens = [];
        $allbiens = $br->findAll();

        // Création d'un tableau contenant les titres de tous les biens
        foreach ($allbiens as $bien) {
            $allbiens_titre[] = $bien->getTitre();
        }

        // Création d'un tableau contenant les descriptions de tous les biens
        foreach ($allbiens as $bien) {
            $allbiens_description[] = $bien->getDescription();
        }

        // Création d'un tableau contenant les id de tous les biens
        foreach ($allbiens as $bien) {
            $allbiens_id[] = $bien->getID();
        }

        // Création d'un tableau contenant les id de tous les biens (sera utilisé pour recup les images)
        foreach ($allbiens as $bien) {
            $allbiens_references[] = $bien->getReference();
        }

        // Obtention de 3 int aléatoire (un array), qu'on va ensuite réutiliser pour chercher dans le tableau des titres et description)
        $random_keys = array_rand($allbiens_titre, 3);

        return $this->render('home.html.twig', [

            'randomkey_titre1' => $allbiens_titre[$random_keys[0]], 'randomkey_titre2' => $allbiens_titre[$random_keys[1]], 'randomkey_titre3' => $allbiens_titre[$random_keys[2]],
            'randomkey_desc1' => $allbiens_description[$random_keys[0]], 'randomkey_desc2' => $allbiens_description[$random_keys[1]], 'randomkey_desc3' => $allbiens_description[$random_keys[2]],
            'randomkey_id1' => $allbiens_id[$random_keys[0]], 'randomkey_id2' => $allbiens_id[$random_keys[1]], 'randomkey_id3' => $allbiens_id[$random_keys[2]],
            'randomkey_ref1' => $allbiens_references[$random_keys[0]], 'randomkey_ref2' => $allbiens_references[$random_keys[1]], 'randomkey_ref3' => $allbiens_references[$random_keys[2]]
        ]);
    }

    /**
     *@Route("/contact", name="contact")
     */

    public function contact()
    {
        return $this->render('contact.html.twig');
    }

    /**
     *@Route("/homepage", name="homepage")
     */

     public function homepage()
     {
         return $this->render('homepage.html.twig');
     }
}
