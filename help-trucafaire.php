<?php

// redirects to the "homepage" route
 return $this->redirectToRoute('homepage');
 // redirectToRoute is a shortcut for:
 // return new RedirectResponse($this->generateUrl('homepage'));
 // does a permanent HTTP 301 redirect
 return $this->redirectToRoute('homepage', [], 301);
 // if you prefer, you can use PHP constants instead of hardcoded numbers
 return $this->redirectToRoute('homepage', [], Response::HTTP_MOVED_PERMANENTLY);
 // redirect to a route with parameters
 return $this->redirectToRoute('app_lucky_number', ['max' => 10]);
 // redirects to a route and maintains the original query string parameters
 return $this->redirectToRoute('blog_show', $request->query->all());
 // redirects to the current route (e.g. for Post/Redirect/Get pattern):
 return $this->redirectToRoute($request->attributes->get('_route'));
 // redirects externally
 return $this->redirect('http://symfony.com/doc');

 //-------------

 // Sauvegarder un attribue dans une session
 $session->set('nom-attribue', 'valeur-attribue');
 // récupérer une valeur d'un attribue
 $my_attribute = $session->get('nom-attribue');
 /*Le Deuxiéme argument est la valeur par défaut de l'attribue
 de la session si elle n'existe pas */
 $my_attribute = $session->get('nom-attribue', 'valeur-pa-defaut');
 // Retourne la valeur de notre attribue de session avant de le supprimer
 $my_value = $session->remove('nom-attribue');
 // Supprime tous les attribues de la session
 $session->clear();
 // Retourne la valeur de notre attribue de session avant de le supprimer
 $my_value = $session->remove('nom-attribue');

 
 <div class="col">
 <div class="card">
     <img src= {{img}}  class="img-fluid" alt=""/>
     <div class="card-body">
         <h4 class="card-title">{{ text }}     <i class="{{ icon }}"></i></h4>
         <p class="card-text">description du bien</p>
         <a href="#" class="btn btn-primary btn-sn">Détails</a>
         <a href="#" class="btn btn-success btn-sn">Ajouter</a>
     </div>
 </div>
</div>

//afficher toutes les categories
$categories = [];
$categories = $cr->findAll();

foreach ($categories as $category) {
    $categoriesfinish[] = $category->getNomCategorie();
}

dd($categoriesfinish);

#----
'liste_bien_cat5_titre' => $biensCAT5Finish_titre,
'liste_bien_cat5_prix' => $biensCAT5Finish_prix,
'liste_bien_cat5_surface' => $biensCAT5Finish_surface,