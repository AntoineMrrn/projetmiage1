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


<hr/>

<p>Titre Biens :</p>
<ul>
    {% for bien in liste_bien_cat5_titre %}
        <li>{{ bien }}</li>
    {% endfor %}
</ul>

<p>Prix Biens :</p>
<ul>
    {% for bien in liste_bien_cat5_prix %}
        <li>{{ bien }}</li>
    {% endfor %}
</ul>

<p>Surface Biens :</p>
<ul>
    {% for bien in liste_bien_cat5_surface %}
        <li>{{ bien }}</li>
    {% endfor %}
</ul>

<div class="card bg-dark text-white text-center">
					<div class="class-body">
						<div class="row">
							<div class="col">
								<img src="https://picsum.photos/200/400" class="img-fluid" alt=""/>
								<div class="card-body">
									<h4 class="card-title">
										Magnifique maison
										<i class=""></i>
									</h4>
									<p class="card-text">
										description du biennnnnn
									</p>
									<a href="/hello" class="btn btn-primary btn-sn">Détails</a>
									<a href="#" class="btn btn-success btn-sn">Ajouter</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				------------------------- login page -----------

				<div class="main">
		<div class="register">
			<div class="col_1_of_list span_1_of_list login-left">
				<h3>Nouveau membre</h3>
				<p>En créant un compte, vous pourrez avoir plus de fonctionnalités tel que mettre en favoris des annonces.</p>
				<a class="acount-btn" href="sinscrire.php">Créer un compte</a>
			</div>
			<div class="col_1_of_list span_1_of_list login-right">
				<h3>Déjà membre ?</h3>
				<p>Si vous avez déjà un compte, merci de vous connecter</p>
				<form action="connexion.php" method="POST">
					<div>
						<span>Adresse email<label>*</label>
						</span>
						<input type="text" name="email" id="logemail">
					</div>
					<div>
						<span>Mot de passe<label>*</label>
						</span>
						<input type="password" name="mdp" id="logpwd">
					</div>
					<a class="forgot" href="mdp_oublie.php">Mot de passe oublié</a>
					<input type="submit" value="Login">
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clear"></div>
	</div>

	--------------- isncrption page --------

	<div class="main">
     <div class="register">
		  	  <form  action="inscription.php" method="POST" id="sinscrire">
				 <div class="register-top-grid">
					<h3>Vos informations</h3>
					 <div>
						<span>Prénom<label>*</label></span>
						<input onKeyUp="checknom()" type="text" name="prenom" id="prenom"> 
						<span id="erreurprenom"></span>
					 </div>
					 <div>
						<span>Nom<label>*</label></span>
						<input type="text" name="nom" id="insnom"> 
						<span id="erreurnom"></span>
					 </div>
					 <div>
						 <span>Email<label>*</label></span>
						 <input type="email" name="email" id="insemail"> 
						 <span id="erreurmail"></span>
					 </div>
					 <div class="clear"> </div>
					     <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="newsletter" checked="checked" id="insnewsletter"><i> </i>S'inscrire à la newsletter</label>
					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>Pour vous authentifier</h3>
							 <div>
								<span>Password<label>*</label></span>
								<input type="password" name="mdp" id="insmdp">
								<span id="erreurmdp"></span>
							 </div>
							 <div>
								<span>Retapez votre Password<label>*</label></span>
								<input type="password" name="mdp2" id="insmdp2">
								<span id="erreurmdp2"></span>
							 </div>
							 <div class="clear"> </div>
					 </div>
				<div class="clear"> </div>
				<div class="register-but">
					   <input type="submit" value="M'inscrire">
					   <div class="clear"> </div>
				   </form>
				</div>
		   </div>