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
        $builder = $factory->createBuilder(FormType::class, null, ['data_class' => Categorie::class]);
        $builder->setMethod('GET');

        $form = $builder->getForm();
        $form->add('NomCategorie', TextType::class, ['required' => true, 'label' => 'Nom de la catégorie *', 'attr' => ['class' => 'formcontrol', 'placeholder' => 'Tapez un nom pour cette catégorie']]);

        $formView = $form->createView();

        $c = new Categorie();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $c->setNomCategorie($data->getNomCategorie());

            $em->persist($c);

            $em->flush(); #flush peut être associé à plusieurs persist. Permettant de répercuter plusieurs mises à jour de la BDD en une seule fois.

        }

        $html = $this->render('categorie/add.html.twig', [
            'formView' => $formView
        ]);

        return new Response($html);
    }

    /**
     * @Route("/agence/categorie/modif/{id}", name="modifcategorie")
     */

    public function modifcategorie(FormFactoryInterface $factory, EntityManagerInterface $em, Request $request, $id)
    {
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

        $html = $this->render('categorie/modif.html.twig', [
            'id' => $id,
            'formView' => $formView
        ]);

        return new Response($html);
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
