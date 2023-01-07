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

use Doctrine\ORM\EntityManagerInterface;

class BienController extends AbstractController
{
    /**
     * @Route("/agence/bien/add", name="addbien")
     */

    public function add(FormFactoryInterface $factory, EntityManagerInterface $em, Request $request)
    {
        $builder = $factory->createBuilder(FormType::class, null, ['data_class' => 'Bien.class']);
        $builder->setMethod('GET');

        $form = $builder->getForm();
        
        $form = $builder->getForm();
        $form->add('titre', TextType::class, ['required' => true, 'label' => 'Titre du bien *', 'attr' => ['class' => 'formcontrol', 'placeholder' => 'Tapez un titre pour ce bien']])
            ->add('prix', IntegerType::class, ['required' => true, 'label' => 'Prix du bien en euro (€) *', 'attr' => ['class' => 'formcontrol', 'placeholder' => 'Tapez un prix pour ce bien']])
            ->add('cp', IntegerType::class, ['required' => true, 'label' => 'Code postal du bien *', 'attr' => ['class' => 'formcontrol', 'placeholder' => 'Tapez un code postal pour ce bien']])
            ->add('categorie', EntityType::class, ['required' => true, 'label' => 'Catégorie du bien *', 'class' => Categorie::class, 'choice_label' => 'nom'])
            ->add('surface', IntegerType::class, ['required' => false, 'label' => 'Surface en km² du bien ', 'attr' => ['class' => 'formcontrol', 'placeholder' => 'Tapez une surface en km² pour ce bien']])
            ->add('url', TextType::class, ['required' => false, 'label' => 'Url du bien ', 'attr' => ['class' => 'formcontrol', 'placeholder' => 'Tapez une url pour ce bien']])
            ->add('ville', TextAreaType::class, ['required' => false, 'label' => 'Ville du bien ', 'attr' => ['class' => 'formcontrol', 'placeholder' => 'Tapez une localisation pour ce bien']])
            ->add('description', TextAreaType::class, ['required' => false, 'label' => 'Description du bien ', 'attr' => ['class' => 'formcontrol', 'placeholder' => 'Tapez une description pour ce bien']]);

        $formView = $form->createView();

        $b = new Bien();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $b->setTitre($data->getTitre());
            $b->setPrix($data->getPrix());
            $b->setCp($data->getCp());
            $b->setCategorie($data->getCategorie());
            $b->setSurface($data->getSurface());
            $b->setUrl($data->getUrl());
            $b->setVille($data->getLocalisation());
            $b->setDescription($data->getDescription());

            $em->persist($b);

            $em->flush(); #flush peut être associé à plusieurs persist. Permettant de répercuter plusieurs mises à jour de la BDD en une seule fois.

        }

        //return $this->render('bien/add.html.twig', [
        //     'formView' => $formView
        // ]);
    }
}
