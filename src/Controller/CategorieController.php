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

class CategorieController extends AbstractController
{
    /**
     * @Route("/agence/categorie/add", name="addcategorie")
     */

    public function addcategorie(FormFactoryInterface $factory, EntityManagerInterface $em, Request $request)
    {
        # Création du formulaire de création de catégorie
        $builder = $factory->createBuilder(FormType::class, null, ['data_class' => Categorie::class]);

        # Définition de la méthode HTTP du formulaire en GET
        $builder->setMethod('GET');

        # Récupération du formulaire
        $form = $builder->getForm();

        # Ajout d'un champ de saisie de texte pour le nom de la catégorie au formulaire
        $form->add('NomCategorie', TextType::class, ['required' => true, 'label' => 'Nom de la catégorie *', 'attr' => ['class' => 'formcontrol', 'placeholder' => 'Tapez un nom pour cette catégorie']]);

        # Création de la vue du formulaire
        $formView = $form->createView();

        $c = new Categorie();

        # Gestion de la soumission du formulaire
        $form->handleRequest($request);

        # Vérification de la validité du formulaire et de l'existence d'une soumission
        if ($form->isSubmitted() && $form->isValid()) {

            # Récupération des données du formulaire
            $data = $form->getData();

            # Attribution du nom de la catégorie à l'objet de la catégorie
            $c->setNomCategorie($data->getNomCategorie());

            # Enregistrement de la nouvelle catégorie en base de données
            $em->persist($c);

            # Mise à jour de la base de données
            $em->flush();
        }

        return $this->render('categorie/add.html.twig', [
            'formView' => $formView
        ]);
    }

    /**
     * @Route("/agence/categorie/modif/{id}", name="modifcategorie")
     */

    public function modifcategorie(FormFactoryInterface $factory, EntityManagerInterface $em, Request $request)
    {
        /*
        $builder = $factory->createBuilder(FormType::class, null, ['data_class' => Categorie::class]);
        $builder->setMethod('GET');

        $form = $builder->getForm();
        $form->add('NomCategorie', TextType::class, ['required' => true, 'label' => 'Nom de la catégorie *', 'attr' => ['class' => 'formcontrol', 'placeholder' => 'Tapez un nom pour cette catégorie']]);

        $formView = $form->createView();

        $cr = $em->getRepository(Categorie::class);
        $c = $cr->find($id);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $c->setNomCategorie($data->getNomCategorie());

            $em->persist($c);

            $em->flush(); #flush peut être associé à plusieurs persist. Permettant de répercuter plusieurs mises à jour de la BDD en une seule fois.

        }
        */

        return $this->render('categorie/modif.html.twig');
    }

    /**
     * @Route("/agence/categorie/suppr", name="supprcategorie")
     */

    public function supprcategorie(FormFactoryInterface $factory, EntityManagerInterface $em, Request $request)
    {
        /*
        $builder = $factory->createBuilder(FormType::class, null, ['data_class' => Categorie::class]);
        $builder->setMethod('GET');

        $form = $builder->getForm();
        $form->add('NomCategorie', TextType::class, ['required' => true, 'label' => 'Nom de la catégorie *', 'attr' => ['class' => 'formcontrol', 'placeholder' => 'Tapez un nom pour cette catégorie']]);

        $formView = $form->createView();

        $cr = $em->getRepository(Categorie::class);
        $c = $cr->find($id);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $c->setNomCategorie($data->getNomCategorie());

            $em->persist($c);

            $em->flush(); #flush peut être associé à plusieurs persist. Permettant de répercuter plusieurs mises à jour de la BDD en une seule fois.

        }

        return $this->render('categorie/suppr.html.twig', [
            'id' => $id,
            'formView' => $formView
        ]);
        */

        return $this->render('categorie/suppr.html.twig');
    }

    /**
     * @Route("/agence/categorie/suppr/fini", name="supprcategoriefini")
     */

    public function supprcategoriefini(FormFactoryInterface $factory, EntityManagerInterface $em, Request $request, $id)
    {
        return $this->render('categorie/supprfini.html.twig');
    }
}
