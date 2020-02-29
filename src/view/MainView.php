<?php

require_once("Router.php");
require_once("model/Hero.php");

class MainView {

	protected $router;
	protected $title;
	protected $imgheader;
	protected $content;
	protected $js;
	protected $feedback;

	public function __construct(Router $router, $feedback) {
		$this->router = $router;
		$this->title = null;
		$this->imgheader = '<img src="skin/img/banniere.jpg" alt="banniere" />';
		$this->content = null;
		$this->js = "";
		$this->feedback = $feedback;
	}

	public function render(){
		include("squelette.php");
	}

	public function getCoMenu(){
		$menu = array(
			$this->router->getSubscribeFormURL() => 'Inscription',
			$this->router->getConnectionFormURL() => 'Connexion',
		);
		return $menu;
	}

	public function getNavMenu(){
		$menu = array(
			$this->router->getHomeURL() => 'Accueil',
			$this->router->getQGURL() => 'Quartier Général',
			$this->router->getAboutURL() => 'À propos',
		);
		return $menu;
	}

	/******************************************************************************/
	/* Méthodes de génération des pages                                           */
	/******************************************************************************/

	public function makeHomePage() {
		$this->title = "Accueil";
		$this->content = "<h1 class='titre'>Bienvenue à tous les fans de super-héros !</h1>
		<blockquote>&ldquo; Un super-héros est un type de justicier se distinguant par des pouvoirs surhumains ou surnaturels, ou parfois juste un bon entraînement et des capacités physiques hors du commun. &rdquo;</blockquote>";
	}

	public function makeSubFormPage(){
		$this->title = "Inscription";
		$this->content = "<h1 class='titre'>Remplissez le formulaire d'inscription</h1>";
		$this->content .= '<form method="post" action="'.$this->router->getConfirmSubscriptionURL().'">
						    <label for="pseudo">* Pseudo :</label><input name="pseudo" type="text" id="pseudo" placeholder="Entre 5 et 20 caractères"/>
<label for="avatars">* Choisissez votre avatar :</label>
<select onchange="getElementById(\'avatars\').value = this.value">
<option value="" selected="selected">Choisissez votre avatar ici</option>
<option value="skin/super-icons/aquaman.png" style="background-image:url(skin/super-icons/aquaman.png);">Aquaman</option>
<option value="skin/super-icons/avengers.png" style="background-image:url(skin/super-icons/avengers.png);">Avengers</option>
<option value="skin/super-icons/batman.png" style="background-image:url(skin/super-icons/batman.png);">Batman</option>
<option value="skin/super-icons/captain-america.png" style="background-image:url(skin/super-icons/captain-america.png);">Captain America</option>
<option value="skin/super-icons/captain-marvel.png" style="background-image:url(skin/super-icons/captain-marvel.png);">Captain Marvel</option>
<option value="skin/super-icons/captain-obvious.png" style="background-image:url(skin/super-icons/captain-obvious.png);">Captain Obvious</option>
<option value="skin/super-icons/cat-woman.png" style="background-image:url(skin/super-icons/cat-woman.png);">Catwoman</option>
<option value="skin/super-icons/dare-devil.png" style="background-image:url(skin/super-icons/dare-devil.png);">Daredevil</option>
<option value="skin/super-icons/dead-pool.png" style="background-image:url(skin/super-icons/dead-pool.png);">Deadpool</option>
<option value="skin/super-icons/fantastic-four.png" style="background-image:url(skin/super-icons/fantastic-four.png);">Les 4 Fantastiques</option>
<option value="skin/super-icons/flash.png" style="background-image:url(skin/super-icons/flash.png);">Flash</option>
<option value="skin/super-icons/greatest-american-hero.png" style="background-image:url(skin/super-icons/greatest-american-hero.png);">Les meilleurs héros américains</option>
<option value="skin/super-icons/green-arrow.png" style="background-image:url(skin/super-icons/green-arrow.png);">L\'archer vert</option>
<option value="skin/super-icons/green-lantern.png" style="background-image:url(skin/super-icons/green-lantern.png);">Green Lantern</option>
<option value="skin/super-icons/hulk-1.png" style="background-image:url(skin/super-icons/hulk-1.png);">Hulk</option>
<option value="skin/super-icons/hulk-2.png" style="background-image:url(skin/super-icons/hulk-2.png);">Hulk</option>
<option value="skin/super-icons/incredibles.png" style="background-image:url(skin/super-icons/incredibles.png);">Les indestructibles</option>
<option value="skin/super-icons/iron-man-1.png" style="background-image:url(skin/super-icons/iron-man-1.png);">Iron Man</option>
<option value="skin/super-icons/iron-man-2.png" style="background-image:url(skin/super-icons/iron-man-2.png);">Iron Man</option>
<option value="skin/super-icons/kickass.png" style="background-image:url(skin/super-icons/kickass.png);">Kickass</option>
<option value="skin/super-icons/punisher.png" style="background-image:url(skin/super-icons/punisher.png);">Punisher</option>
<option value="skin/super-icons/red-tornado.png" style="background-image:url(skin/super-icons/red-tornado.png);">Red Tornado</option>
<option value="skin/super-icons/robin.png" style="background-image:url(skin/super-icons/robin.png);">Robin</option>
<option value="skin/super-icons/roschach.png" style="background-image:url(skin/super-icons/roschach.png);">Rorschach</option>
<option value="skin/super-icons/spiderman.png" style="background-image:url(skin/super-icons/spiderman.png);">Spiderman</option>
<option value="skin/super-icons/superman.png" style="background-image:url(skin/super-icons/superman.png);">Superman</option>
<option value="skin/super-icons/thor.png" style="background-image:url(skin/super-icons/thor.png);">Thor</option>
<option value="skin/super-icons/wonder-woman.png" style="background-image:url(skin/super-icons/wonder-woman.png);">Wonder Woman</option>
<option value="skin/super-icons/xmen.png" style="background-image:url(skin/super-icons/xmen.png);">Xmen</option>
</select>
<input type="hidden" name="avatar" id="avatars" size="0" />
							<label for="password">* Mot de Passe :</label><input type="password" name="password" id="password" placeholder="Au moins 6 caractères"/>
							<label for="confirm">* Confirmez le mot de passe :</label><input type="password" name="confirm" id="confirm" />
   						 Les champs précédés d\'un * sont obligatoires
    					<button type="submit">S\'inscrire</button></form>';
	}

	public function makeLoginFormPage(){
		$this->title = "Connexion";
		$this->content = "<h1 class='titre'>Remplissez le formulaire de connexion</h1>";
		$this->content .= '<form method="post" action="'.$this->router->getConfirmConnectionURL().'">
							<label for="pseudo">Pseudo :</label><input name="pseudo" type="text" id="pseudo" />
							<label for="password">Mot de Passe :</label><input type="password" name="password" id="password" />
							<button type="submit">Connexion</button></form>';
	}

	public function makeQGPage(array $listeHeroes) {
		$this->title = "QG des super-héros";
		$this->js = '<script type="text/javascript" src="js/qg.js"></script>';
		$this->content = "<h1 class='titre'>Bienvenue dans le QG des super-héros !<br /><br />
						Retrouvez tous vos super-héros ci-dessous</h1>";
		$this->content.="<ul id='listeHeros'>";
		foreach($listeHeroes as $id => $hero) {
			$name = $hero->getName();
			$classe = ($hero->getFirme()==='Marvel')?"marvel":"dc";
			$this->content.="<li class='hero'><a href='{$this->router->getHeroURL($id)}' class='nomHeros {$classe}'>{$name}</a><a href='{$this->router->getHeroURL($id)}' class='display'><img src='{$hero->getPhoto()}' alt='image de {$name}' class='{$classe}'/></a>
<span class='hidden {$classe}'><a>{$hero->getFirme()} Comics</a><a href='{$this->router->getHeroURL($id)}'>Voir la description de {$name}</a></span></li>";
		}
		$this->content.="</ul>";
	}

	public function makeHeroPage($id, $h, $compteCreateur, $date){
		$name = $h->getName();
		$this->title = "Profil de ".$name;
		$this->content = "<h1 class='titre'>Page sur {$name}</h1>";
		$this->content.= "<article id='heroprofil'>";
		$this->content.= "<div id='herocontainer'><div id='tete'><img src='{$h->getPhoto()}' alt='image de {$name}' />
							<p>{$name}</p></div>";
		$this->content.="<div id='herodesc'><p>{$h->getDesc()}</p><p>Créé par :  <a href='{$this->router->getProfilURL($h->getAuthor())}'>{$h->getAuthor()}<img src='{$compteCreateur->getAvatar()}' alt='Avatar de {$h->getAuthor()}' class='avatar' /></a>  le {$date}</p></div></div>";
		$this->content.="<a class='button' href='{$this->router->getQGURL()}'>Revenir au QG</a>";
		$this->content.= "</article>";
	}
	
	public function makeUnknownHeroPage(){
		$this->title = "Erreur : héros inconnu";
		$this->content = "<h1 class='titre'>...Aïe aïe aïe...</h1>";
		$this->content.= "<article>";
		$this->content.= "<h3 class='heros404'>Le super-héros demandé n'est pas encore né...</h3>";
		$this->content.= "</article>";
	}

	public function makeHeroCreationPage(HeroBuilder $builder) {
		$data = $builder->getData();
		$s = "<h1 class='titre'>Ajoutez votre super-héros ici</h1>";
		$s .= '<form action="'.$this->router->getHeroSaveURL().'" method="POST">';
		$nameRef = $builder->getNameRef();
		$s .= '<label for="nameInput">'.strtoupper($nameRef).' :</label> <br /><input type="text" name="'.$nameRef.'" id="nameInput" placeholder="Entrez le nom ici" value="'.$data[$nameRef].'" />';
		$firmRef = $builder->getFirmRef();
		$s .= '<label for="firmInput">'.strtoupper($firmRef).' (Marvel ou DC Comics) :</label> <br /><input type="text" name="'.$firmRef.'" id="firmInput" placeholder="Entrez la firme ici" value="'.$data[$firmRef].'" />';
		$descRef = $builder->getDescRef();
		$s .= '<label for="descInput">'.strtoupper($descRef).' :</label><br /><textarea cols="30" rows="5" name="'.$descRef.'" id="descInput" placeholder="Entrez la description de votre super-héros ici" value="'.$data[$descRef].'" ></textarea>';
		$imgRef = $builder->getImageRef();
		$s .= '<label for="imgInput">'.strtoupper($imgRef).' :</label> <br /><input type="url" name="'.$imgRef.'" id="imgInput" placeholder="Entrez le lien vers l\'image ici" value="'.$data[$imgRef].'" />';
		$s .= '<button type="submit">Créer</button>';
		$s .= "</form>\n";

		$error = $builder->getError();
		if ($error !== '' && $error !== null) {
			$s .= '<div class="error">'.$error."</div>";
		}

		$this->title = 'Ajoutez un nouveau héros';
		$this->content = $s;
	}
	
	public function makeUnknownActionPage(){
		$this->title = "Erreur : action inconnue";
		$this->content = "<h1 class='titre'>Vous avez essayé de faire une action non prévue. :/</h1>";
	}

	public function makeHeroDeletionPage($id) {
		$this->title = 'Supprimer un super-héros';
		$this->content.= '<form action="'.$this->router->getHeroDeletionURL($id).'" method="POST">';
		$this->content.= '<p>Voulez-vous vraiment supprimer ce super-héros ?</p>';
		$this->content.="<div id='allows'>";
		$this->content.= '<a class="button" href="'.$this->router->getHeroURL($id).'">Annuler</a>';
		$this->content.= '<button type="submit">Confirmer la suppression</button>';
		$this->content.="</div>";
		$this->content.= '</form>';
	}

	public function makeHeroDeletedPage() {
		$this->title = 'Suppression effectuée';
		$this->content = '<article><h1>Le super-héros a été correctement supprimé.</h1></article>';
	}
	
	public function makeHeroModificationPage($id,Hero $h, HeroBuilder $builder) {
		$data = $builder->getData();
		$this->title = 'Modifier un super-héros';
		$this->content = "<h1 class='titre'>Modifiez votre super-héros ici</h1>";
		$this->content.= '<form action="'.$this->router->getHeroModificationURL($id).'" method="POST">';
		$nameRef = $builder->getNameRef();
		$this->content .= '<label for="nameInput">'.strtoupper($nameRef).' :</label> <br /><input type="text" name="'.$nameRef.'" id="nameInput" placeholder="Entrez le nom ici" value="'.$h->getName().'" />';
		$firmRef = $builder->getFirmRef();
		$this->content .= '<label for="firmInput">'.strtoupper($firmRef).' (Marvel ou DC Comics) :</label> <br /><input type="text" name="'.$firmRef.'" id="firmInput" placeholder="Entrez la firme ici" value="'.$h->getFirme().'" />';
		$descRef = $builder->getDescRef();
		$this->content .= '<label for="descInput">'.strtoupper($descRef).' :</label><br /><textarea cols="30" rows="5" name="'.$descRef.'" id="descInput" placeholder="Entrez la description de votre super-héros ici" >'.$h->getDesc().'</textarea>';
		$imgRef = $builder->getImageRef();
		$this->content .= '<label for="imgInput">'.strtoupper($imgRef).' :</label> <br /><input type="url" name="'.$imgRef.'" id="imgInput" placeholder="Entrez le lien vers l\'image ici" value="'.$h->getPhoto().'" />';
		$this->content.="<div id='allows'>";
		$this->content.= '<a class="button" href="'.$this->router->getHeroURL($id).'">Annuler</a>';
		$this->content.= '<button type="submit">Confirmer la modification</button>';
		$this->content.="</div>";
		$this->content.= '</form>';
	}

	public function makeHeroModifiedPage() {
		$this->title = 'Modification effectuée';
		$this->content = '<article><h1>Le super-héros a été correctement modifié.</h1></article>';
	}

	public function makeProfilPage($c, $date, $heroes){
		$name = $c->getLogin();
		$this->title = "Profil de ".$name;
		$this->content = "<h1 class='titre'>Profil de {$name}</h1>";
		$this->content .= "<article id='profiluser'>";
		if ($c->getStatus() === "admin")
			$this->content .= "{$name} est administrateur<br/>";
		$this->content .= "Avatar de {$name} : <img class='avatar' src='{$c->getAvatar()}' alt='Avatar de {$name}' />
		<br />Compte créé le : {$date}";
		$this->content .= "<br />Héros ajoutés par {$name} : ";
		if($heroes !== null){
			foreach($heroes as $h){
				$this->content .= "<a class='profiluserheroes' href='{$this->router->getHeroURL($h['id'])}'>{$h['name']}</a>";
			}
		}
		else
			$this->content .= "0 pour le moment";
		$this->content .= "</article>";
	}

	public function makePassWordModificationPage($pseudo) {
		$this->title = 'Changez le mot de passe';
		$this->content = "<h1 class='titre'>Changez votre mot de passe ici</h1>";
		$this->content.= '<form action="'.$this->router->getChangePassWordURL($pseudo).'" method="POST">';
		$this->content.= '<label for="password">* Nouveau mot de passe :</label><input type="password" name="password" id="password" placeholder="Au moins 6 caractères"/>
							<label for="confirm">* Confirmez le mot de passe :</label><input type="password" name="confirm" id="confirm" />
   						 Les champs précédés d\'un * sont obligatoires';
		$this->content.="<div id='allows'>";
		$this->content.= '<a class="button" href="'.$this->router->getProfilURL($pseudo).'">Annuler</a>';
		$this->content.= '<button type="submit">Confirmer la modification</button></form>';
		$this->content.="</div>";
		$this->content.= '</form>';
	}

	public function makePassWordModifiedPage() {
		$this->title = 'Modification effectuée';
		$this->content = '<article><h1>Votre mot de passe a été correctement modifié.</h1></article>';
	}

	public function makeAboutPage(){
		$this->title = "A propos";
		$this->content = "<h1 class='titre'>Ce mini-site vous est proposé par 21306226 et 21301373 !</h1>";
		$this->content.= "<article>";
		$this->content.= "<section class='apropos'>Il s'agit d'un mini-site portant sur les super-héros, créé dans le cadre de la L3 Informatique pour l'unité d'enseignement <i>Technologies Internet</i>.<br />
Il permet de voir tout un <a href='{$this->router->getQGURL()}'>Quartier Général de super-héros</a>, et il est possible d'en savoir d'avantage en allant sur la page d'un héros en particulier. On peut notamment y retrouver <i>sa description</i>, <i>sa date d'ajout</i>, ou <i>le pseudo de son créateur</i>. De plus, on peut aller voir le profil de ce dernier où sont indiqués <i>les héros qu'il a ajouté</i>, <i>depuis quand il est membre</i>, et <i>son avatar</i>. En effet, lorsque l'utilisateur s'inscrit, il doit choisir un avatar entre <u>une trentaine d'icônes de super-héros</u>, et choisir un pseudo qui n'est pas encore pris par un membre du site.<br />
Si l'utilisateur est connecté, ce-dernier a accès à une nouvelle page, <a>Nouveau Héros</a>, permettant d'ajouter un nouveau super-héros, qui ne se trouverait pas encore dans le QG. Il peut modifier et supprimer ses propres super-héros (ceux qu'il a ajouté), mais pas ceux des autres.
<br />
Les administrateurs <a href='{$this->router->getProfilURL("CrazyBane")}'>CrazyBane (21306226)</a> et <a href='{$this->router->getProfilURL("uftos")}'>uftos (21301373)</a> peuvent quant à eux modifier et supprimer n'importe quel super-héros du QG.
<br />
L'utilisateur connecté peut aussi accéder à sa page profil où il peut changer son mot de passe.
<br />Bientôt, il sera aussi possible de changer son avatar, et de rechercher directement un héros ou un utilisateur par son nom dans une barre de recherche.</section>
							<table>
   <caption>Sources :</caption>

   <thead>
       <tr>
           <th>Images</th>
           <th>Polices de Comics</th>
       </tr>
   </thead>
   <tbody>
       <tr>
           <td><a href='http://marvel.com/' target='_blank'>Marvel</a></td>
           <td><a href='http://www.dafont.com' target='_blank'>DaFont</a></td>
       </tr>
       <tr>
           <td><a href='http://www.dccomics.com/' target='_blank'>DC Comics</a></td>
           <td></td>
       </tr>
   </tbody>
</table>
<section class='apropos'>Nous avons choisi le bleu et le rouge comme couleurs directrices de notre site pour illustrer le mélange Marvel/DC Comics de nos super-héros dans le QG (Le rouge et le blanc représentant Marvel, et le bleu et le noir représentant DC).</section>
							<p id='notabene'>Bientôt, sera créé le plus grand QG de Vilains !!!</p>";
		$this->content.= "</article>";
	}
	
	public function makeNotFoundPage(){
		$this->title = "Erreur 404";
		$this->content = "<h1 class='titre'>Error 404<br />Costume not found. :/</h1>";
		$this->content = '<img id="galerie" src="img/galerie.jpg" alt="galerie de super-héros" />';
	}
	
	public function makeDebugPage($variable) {
		$this->title = 'Debug';
		$this->content = '<pre>'.var_export($variable, true).'</pre>';
	}
}
