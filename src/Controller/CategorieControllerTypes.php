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
     * @Route("/categorie/{id<\d+>?0}", name="categorie")
     */

    public function categorie(EntityManagerInterface $em, $id)
    {
        // Récupère le repository de Categorie et Bien
        $cr = $em->getRepository(Categorie::class);
        $br = $em->getRepository(Bien::class);

        // Récupère la catégorie d'id ID
        $categorie = $cr->find($id);
        if ($categorie == null) {
            return $this->render('404.html.twig');
        }
        $categorie_id = $categorie->getId();


        // Récupère le titre des biens de la catégorie ID
        $biens_titre = [];
        $biens_titre = $br->findby(['categorie' => $id]);

        foreach ($biens_titre as $bien) {
            $liste_biens_titre[] = $bien->getTitre();
        }

        // Récupère le prix des biens de la catégorie ID
        $biens_prix = [];
        $biens_prix = $br->findby(['categorie' => $id]);

        foreach ($biens_prix as $bien) {
            $liste_biens_prix[] = $bien->getPrix();
        }

        // Récupère l'id des biens de la catégorie ID
        $biens_id = [];
        $biens_id = $br->findby(['categorie' => $id]);

        foreach ($biens_id as $bien) {
            $liste_biens_id[] = $bien->getId();
        }

        // Récupère l'id des biens de la catégorie ID
        $biens = [];
        $biens = $br->findby(['categorie' => $id]);

        foreach ($biens as $bien) {
            $biens_données[] = $bien->getTitre();
        }

        // Renvoie la réponse contenant le rendu de la vue "categorie/pagecategorie.html.twig" et les données passées à la vue
        return $this->render('categorie/pagecategorie.html.twig', [
            'nom_categorie' => $categorie->getNomCategorie(),

            'liste_biens' => ['titre' => $liste_biens_titre, 'prix' => $liste_biens_prix, 'id' => $liste_biens_id],
        ]);
    }
}
