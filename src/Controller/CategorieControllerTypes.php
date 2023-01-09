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

use Knp\Component\Pager\PaginatorInterface;

use Doctrine\ORM\EntityManagerInterface;

class CategorieControllerTypes extends AbstractController
{
    /**
     * @Route("/categorie/{id<\d+>?0}", name="categorie")
     */

    public function categorie(EntityManagerInterface $em, $id, PaginatorInterface $paginator, Request $request)
    {
        // Récupère le repository de Categorie et Bien
        $cr = $em->getRepository(Categorie::class);
        $br = $em->getRepository(Bien::class);

        // Récupère la catégorie d'id ID
        $categorie = $cr->find($id);

        $biens = $br->findby(['categorie' => $id]);
        if ($biens == null) {
            return $this->render('404.html.twig');
        }

        $biens_pagination = $paginator->paginate(
            $biens, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            3 /*limit per page*/
        );

        // Renvoie la réponse contenant le rendu de la vue "categorie/pagecategorie.html.twig" et les données passées à la vue
        return $this->render('categorie/pagecategorie.html.twig', [
            'nom_categorie' => $categorie->getNomCategorie(),

            'biens' => $biens_pagination,
        ]);
    }
}
