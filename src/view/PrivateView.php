<?php

class PrivateView extends MainView{

	protected $compte;

	public function __construct(Router $router, $feedback, Account $compte){
		parent::__construct($router, $feedback);
		$this->compte=$compte;
		$this->imgheader = '<img src="img/new_bg.jpg" alt="banniere" />';
	}

	public function getCoMenu(){
		$login=$this->compte->getLogin();
		$menu = array(
			$this->router->getProfilURL($login) => "<img class='avatar' src='{$this->compte->getAvatar()}' alt='Avatar de {$login}' />Profil de {$login}",
			$this->router->getLogoutURL() => "Déconnexion",
		);
		return $menu;
	}

	public function getNavMenu(){
		$menu = array(
			$this->router->getHomeURL() => 'Accueil',
			$this->router->getQGURL() => 'Quartier Général',
			$this->router->getHeroCreationURL() => 'Nouveau héros',
			$this->router->getAboutURL() => 'À propos',
		);
		return $menu;
	}

	public function makeHomePage() {
		$this->title = "Bienvenue {$this->compte->getLogin()}";
		$this->content = "<h1 class='titre'>Bienvenue {$this->compte->getLogin()} !</h1>
		<article id='privatehome'>Vous êtes dans le plus grand rassemblement de super-héros de tous les temps !<br />
		Ici, il n'y aucune discrimination, Marvel et DC sont les bienvenus !</article>";
	}
	
	public function makeHeroPage($id, $h, $compteCreateur, $date){
		$name = $h->getName();
		$this->title = "Profil de ".$name;
		$this->content = "<h1 class='titre'>Page sur {$name}</h1>";
		$this->content.= "<article id='heroprofil'>";
		$this->content.= "<div id='herocontainer'><div id='tete'><img src='{$h->getPhoto()}' alt='image de {$name}' />
							<p>{$name}</p></div>";
		$this->content.="<div id='herodesc'><p>{$h->getDesc()}</p><p>Créé par :  <a href='{$this->router->getProfilURL($h->getAuthor())}'>{$h->getAuthor()}<img src='{$compteCreateur->getAvatar()}' alt='Avatar de {$h->getAuthor()}' class='avatar' /></a>  le {$date}</p></div></div>";
		if($this->compte->getStatus()==="admin" or $this->compte->getLogin()===$h->getAuthor()){
			$this->content.="<div id='allows'>";
			$this->content.='<a class="button" href="'.$this->router->getHeroAskModificationURL($id).'">Modifier</a>';
			$this->content.='<a class="button" href="'.$this->router->getHeroAskDeletionURL($id).'">Supprimer</a>';
			$this->content.="</div>";
		}
		$this->content.="<a class='button' href='{$this->router->getQGURL()}'>Revenir au QG</a>";
		$this->content.= "</article>";
	}

	public function makeProfilPage($c, $date, $heroes){
		$name = $c->getLogin();
		$this->title = "Profil de ".$name;
		$this->content = "<h1 class='titre'>Profil de {$name}</h1>";
		$this->content .= "<article id='profiluser'>";
		if ($this->compte->getLogin() === $name){
			if ($c->getStatus() === "admin")
				$this->content .= "Vous êtes administrateur<br/>";
			$this->content .= "Votre avatar : <img class='avatar' src='{$c->getAvatar()}' alt='Avatar de {$name}' />";
			$this->content .= "<br />Héros que vous avez ajoutés : ";
			if($heroes !== null){
				foreach($heroes as $h){
					$this->content .= "<a class='profiluserheroes' href='{$this->router->getHeroURL($h['id'])}'>{$h['name']}</a>";
				}
			}
			else
				$this->content .= "0 pour le moment";
			$this->content .= "<br />Compte créé le : {$date}";
			$this->content.='<a class="button" href="'.$this->router->getAskChangePassWordURL($name).'">Changer de mot de passe</a>';
			$this->content .= "</article>";
		}
		else{
			if ($c->getStatus() === "admin")
				$this->content .= "{$name} est administrateur<br/>";
			$this->content .= "Avatar de {$name} : <img class='avatar' src='{$c->getAvatar()}' alt='Avatar de {$name}' />";			
			$this->content .= "<br />Héros ajoutés par {$name} : ";
			if($heroes !== null){
				foreach($heroes as $h){
					$this->content .= "<a class='profiluserheroes' href='{$this->router->getHeroURL($h['id'])}'>{$h['name']}</a>";
				}
			}
			else
				$this->content .= "0 pour le moment";
			$this->content .= "<br />Compte créé le : {$date}";
			$this->content .= "</article>";
		}
	}
}
?>
