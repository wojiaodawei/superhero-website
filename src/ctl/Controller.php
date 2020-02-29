<?php

/*** Contrôleur du site ***/

/* Inclusion des classes nécessaires */
require_once("view/MainView.php");
require_once("model/Hero.php");

class Controller {

	protected $view;
	protected $router;
	protected $heroStorage;
	protected $accountStorage;
							
	public function __construct(Router $router, MainView $view, HeroStorage $hs, AccountStorage $as) {
		$this->router = $router;
		$this->view = $view;
		$this->heroStorage = $hs;
		$this->accountStorage = $as;
	}

	public function homePage(){
		$this->view->makeHomePage();
	}
	
	public function connection(array $post){
		$compte = $this->accountStorage->checkAuth($post['pseudo'], $post['password']);
		if ($compte !==null) {
			$_SESSION['user'] = $compte;
			$_SESSION['feedback'] = 'Vous êtes connecté';
			$this->router->POSTredirect($this->router->getHomeURL());
		} else {
			$_SESSION['feedback'] = 'La connexion a échoué';
			$this->router->POSTredirect($this->router->getConnectionFormURL());
		}
	}

	public function subscription(array $post){
		$compte = $this->accountStorage->read($post['pseudo']);
		if ($compte !== null) {
			$_SESSION['feedback'] = "{$post['pseudo']} existe déjà, choisissez un autre pseudo svp";
			$this->router->POSTredirect($this->router->getSubscribeFormURL());
		}else if (mb_strlen($post['pseudo'],'UTF-8')<5 or mb_strlen($post['pseudo'],'UTF-8')>20) {
			$_SESSION['feedback'] = "Pseudo trop court ou trop long";
			$this->router->POSTredirect($this->router->getSubscribeFormURL());
		}else if (mb_strlen($post['password'],'UTF-8')<6) {
			$_SESSION['feedback'] = "Mot de passe trop court";
			$this->router->POSTredirect($this->router->getSubscribeFormURL());
		}else if ($post['password']!==$post['confirm']){
			$_SESSION['feedback'] = 'Les mots de passe sont différents';
			$this->router->POSTredirect($this->router->getSubscribeFormURL());
		}else if (!isset($post['avatar']) or $post['avatar']===""){
			$_SESSION['feedback'] = 'Veuillez choisir un avatar';
			$this->router->POSTredirect($this->router->getSubscribeFormURL());
		}else{
			$login=$this->accountStorage->create(new Account($post['pseudo'],password_hash($post['password'],1),'user',$post['avatar']));
			$_SESSION['feedback'] = 'Vous êtes bien inscrit';
			$this->router->POSTredirect($this->router->getConnectionFormURL());
		}
	}

	public function profilPage($pseudo) {
		$compte = $this->accountStorage->read($pseudo);
		$dateCreation = $this->accountStorage->getCreationDate($pseudo);
		$heroes = $this->heroStorage->getHeroesCreatedBy($pseudo);
		if ($compte !== null) {
			$this->view->makeProfilPage($compte, $dateCreation, $heroes);
		}else{
			$this->pageNotFound();
		}
	}

	public function deconnection(){
		session_unset();
		session_destroy();
		$_SESSION['feedback'] = 'Vous êtes déconnecté';
		$this->router->POSTredirect($this->router->getHomeURL());
	}

	public function heroPage($id) {
		$h=$this->heroStorage->read($id);
		$dateCreation = $this->heroStorage->getCreationDate($id);
		if ($h!==null){
			$c=$this->accountStorage->read($h->getAuthor());
			$this->view->makeHeroPage($id,$h,$c,$dateCreation);
		}else
			$this->view->makeUnknownHeroPage();
	}

	public function allHeroesPage() {
		$this->view->makeQGPage($this->heroStorage->readAll());
	}
	
	public function aboutPage() {
		$this->view->makeAboutPage();
	}
	
	public function pageNotFound() {
		$this->view->makeNotFoundPage();
	}
	
	public function newHero() {
		if (isset($_SESSION['currentNewHero']))
			$builder = $_SESSION['currentNewHero'];
		else
			$builder = new HeroBuilder(array());
		$this->view->makeHeroCreationPage($builder);
	}

	public function saveNewHero(array $post){
		$builder = new HeroBuilder($post);
		$existe=false;
		foreach($this->heroStorage->readAll() as $id => $h){
			if($h->getName()===$post['nom'])
				$existe=true;
		}
		if ($builder->isValid() and !$existe) { 
			$nouveauHeros = $builder->createHero();
			$id = $this->heroStorage->create($nouveauHeros);
			$_SESSION['feedback'] = 'Super-héros créé avec succès';
			unset($_SESSION['currentNewHero']);
			$this->router->POSTredirect($this->router->getHeroURL($id));
		} else {
			$_SESSION['feedback'] = 'Formulaire invalide';
			$_SESSION['currentNewHero'] = $builder;
			$this->router->POSTredirect($this->router->getHeroCreationURL());
		}
		//$this->view->makeDebugPage($post);
	}

	public function askHeroDeletion($id) {
		$heros = $this->heroStorage->read($id);
		if ($heros === null) { 	/* L'animal n'existe pas en BD */
			$this->view->makeUnknownHeroPage();
		} else {
			$this->view->makeHeroDeletionPage($id);
		}
	}

	public function deleteHero($id) {
		$ok = $this->heroStorage->delete($id);
		if ($ok) {
			$_SESSION['feedback'] = 'Super-héros supprimé avec succès';
			$this->router->POSTredirect($this->router->getQGURL());
		} else { /* L'animal n'existe pas en BD */
			$_SESSION['feedback'] = 'Le super-héros n’a pu être supprimé';
			$this->router->POSTredirect($this->router->getHeroURL($id));
		}
	}

	public function askHeroModification($id) {
		$heros = $this->heroStorage->read($id);
		if ($heros === null) { 	/* L'animal n'existe pas en BD */
			$this->view->makeUnknownHeroPage();
		} else {
			$builder = new HeroBuilder(array());
			$this->view->makeHeroModificationPage($id, $heros, $builder);
		}
	}

	public function modifyHero($heroId, array $post) {
		$builder = new HeroBuilder($post);
		$herosModif = $builder->createHero();
		$ok = $this->heroStorage->update($heroId, $herosModif);
		if ($ok) {
			$_SESSION['feedback'] = 'Super-héros modifié avec succès';
		} else { /* L'animal n'existe pas en BD */
			$_SESSION['feedback'] = 'Le super-héros n’a pu être modifié';	
		}
		$this->router->POSTredirect($this->router->getHeroURL($heroId));
	}

	public function askPassWordModification($pseudo) {
		$compte = $this->accountStorage->read($pseudo);
		if ($compte === null) { 	/* Le compte n'existe pas en BD */
			$this->view->makeUnknownActionPage();
		} else {
			$this->view->makePassWordModificationPage($pseudo);
		}
	}

	public function modifyPassWord($pseudo, array $post) {
		if ($post['password']!==$post['confirm']){
			$_SESSION['feedback'] = 'Les mots de passe sont différents';
			$this->router->POSTredirect($this->router->getAskChangePassWordURL($pseudo));
		}else if (mb_strlen($post['password'],'UTF-8')<6) {
			$_SESSION['feedback'] = "Mot de passe trop court";
			$this->router->POSTredirect($this->router->getAskChangePassWordURL($pseudo));
		}else{
			$accountModified = $this->accountStorage->read($pseudo);
			$accountModified->setNewPassWord(password_hash($post['password'],1));
			$ok = $this->accountStorage->update($pseudo, $accountModified);
			if ($ok) {
				$_SESSION['feedback'] = 'Mot de passe modifié avec succès';
				$this->router->POSTredirect($this->router->getProfilURL($pseudo));
			} else { /* L'animal n'existe pas en BD */
				$_SESSION['feedback'] = 'Le mot de passe n’a pu être modifié';
				$this->router->POSTredirect($this->router->getAskChangePassWordURL($pseudo));
			}
		}
	}
}

?>
