<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormRenderer;

class BienController extends AbstractController
{
    /**
     *@Route("/agence/bien/add", name="add")
     */

    public function add(FormFactoryInterface $factory)
    {
        $builder = $factory->createBuilder();

        $builder->add('name')
            ->add('description')
            ->add('prix')
            ->add('categorie');

        $form = $builder->getForm();

        $formView = $form->createView();

        return $this->render('bien/add.html.twig', [
            'formView' => $formView
        ]);
    }
}
