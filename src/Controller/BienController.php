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

class BienController extends AbstractController
{

    //---------- Page des biens ----------//

    /**
     * @Route("/bien/{id<\d+>?0}", name="bien")
     */

    public function bien(FormFactoryInterface $factory, EntityManagerInterface $em, Request $request, $id)
    {
        $br = $em->getRepository(Bien::class);
        $cr = $em->getRepository(Categorie::class);

        // Récupère le prix des biens de la catégorie 2
        $bien = $br->find($id);
        if ($bien == null) {
            return $this->render('404.html.twig');
        }
        $bien_titre = $bien->getTitre();
        $bien_prix = $bien->getPrix();
        $bien_cp = $bien->getCp();
        $bien_description = $bien->getDescription();
        $bien_surface = $bien->getSurface();
        $bien_reference = $bien->getReference();
        $bien_type = $bien->getType();



        return $this->render('bien/bien.html.twig', [
            'id' => $id,
            'titre' => $bien_titre,
            'prix' => $bien_prix,
            'cp' => $bien_cp,
            'description' => $bien_description,
            'surface' => $bien_surface,
            'reference' => $bien_reference,
            'type' => $bien_type,
        ]);
    }

    //---------- Gestion des biens ---------//

    /**
     * @Route("/agence/bien/add", name="addbien")
     */

    public function addbien(FormFactoryInterface $factory, EntityManagerInterface $em, Request $request)
    {
        return $this->render('bien/add.html.twig');
    }

    /**
     * @Route("/agence/modif/add", name="modif")
     */

    public function modifbien(FormFactoryInterface $factory, EntityManagerInterface $em, Request $request)
    {
        return $this->render('bien/modif.html.twig');
    }

    /**
     * @Route("/agence/bien/suppr}", name="suppr")
     */

    public function supprbien(FormFactoryInterface $factory, EntityManagerInterface $em, Request $request)
    {
        /*

        $builder = $factory->createBuilder(FormType::class, null, ['data_class' => Bien::class]);
        $builder->setMethod('GET');

        $form = $builder->getForm();
        $form->add('titre', TextType::class, ['required' => true, 'label' => 'Titre du bien *', 'attr' => ['class' => 'formcontrol', 'placeholder' => 'Tapez un titre pour ce bien']]);

        $formView = $form->createView();

        $br = $em->getRepository(Bien::class);
        $b = $br->find($id);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($b);

            $em->flush(); #flush peut être associé à plusieurs persist. Permettant de répercuter plusieurs mises à jour de la BDD en une seule fois.

        }

        */
        
        return $this->render('bien/suppr.html.twig');
    }

    /**
     * @Route("/agence/bien/suppr/fini", name="supprbienfini")
     */

     public function supprbienfini(FormFactoryInterface $factory, EntityManagerInterface $em, Request $request, $id)
     {
         return $this->render('bien/supprfini.html.twig');
     }
}
