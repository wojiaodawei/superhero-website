<?php

require_once("view/MainView.php");
require_once("view/PrivateView.php");
require_once("ctl/Controller.php");
require_once('model/HeroBuilder.php');
require_once('model/HeroStorage.php');

class Router {

	public function main($heroStorage,$accountStorage) {
		session_start();

		$feedback = isset($_SESSION['feedback'])? $_SESSION['feedback']: '';
		$_SESSION['feedback'] = '';

		$view = (isset($_SESSION['user']))?new PrivateView($this,$feedback,$_SESSION['user']):new MainView($this,$feedback);
		$controller = new Controller($this,$view,$heroStorage,$accountStorage);
		
		$id = isset($_GET['heros'])? $_GET['heros']: null;
		$profil = isset($_GET['profil'])? $_GET['profil']: null;
		$action = isset($_GET['action'])? $_GET['action']: null;

		if(sizeof($_GET)===0){
			$controller->homePage();
		}else if($profil !== null and $action !== null){
			switch($action){
				case "changerPW":
					$controller->askPassWordModification($profil);
					break;
				case "confirmerChangement":
					$controller->modifyPassWord($profil,$_POST);
					break;
				default:
					$view->makeUnknownActionPage();
					break;
			}
		}else if($profil !== null){
			$controller->profilPage($profil);
		}else if($action !== null){
			switch($action){
				case "inscription":
					$view->makeSubFormPage();
					break;
				case "confirmInscription":
					$controller->subscription($_POST);
					break;
				case "connexion":
					$view->makeLoginFormPage();
					break;
				case "confirmConnexion":
					$controller->connection($_POST);
					break;
				case "deconnexion":
					$controller->deconnection();
					break;
				case "qg":
					$controller->allHeroesPage();
					break;
				case "nouveau":
					$controller->newHero();
					break;
				case "aPropos":
					$controller->aboutPage();
					break;
				case 'sauverNouveau':
					$controller->saveNewHero($_POST);
					break;
				case 'modifier':
					if ($id === null)
						$view->makeUnknownActionPage();
					else
						$controller->askHeroModification($id);
					break;
				case 'confirmerModification':
					if ($id === null)
						$view->makeUnknownActionPage();
					else
						$controller->modifyHero($id,$_POST);
					break;
				case 'supprimer':
					if ($id === null)
						$view->makeUnknownActionPage();
					else
						$controller->askHeroDeletion($id);
					break;
				case 'confirmerSuppression':
					if ($id === null)
						$view->makeUnknownActionPage();
					else
						$controller->deleteHero($id);
					break;
				default:
					$view->makeUnknownActionPage();
					break;
			}
		}else if($id !== null){
			$controller->heroPage($id);
		}else 
			$controller->pageNotFound();
		$view->render();
	}
	
	public function getHomeURL() {
		return ".";
	}

	public function getSubscribeFormURL() {
		return ".?action=inscription#navigation";
	}

	public function getConfirmSubscriptionURL(){
		return ".?action=confirmInscription";
	}

	public function getConnectionFormURL() {
		return ".?action=connexion#navigation";
	}

	public function getConfirmConnectionURL() {
		return ".?action=confirmConnexion";
	}

	public function getQGURL() {
		return ".?action=qg#navigation";
	}

	public function getHeroURL($id){
		return "?heros={$id}#navigation";
	}
	
	public function getHeroCreationURL() {
		return "?action=nouveau#navigation";
	}

	public function getHeroSaveURL() {
		return "?action=sauverNouveau";
	}

	public function getHeroAskDeletionURL($id) {
		return "?heros={$id}&amp;action=supprimer#navigation";
	}

	public function getHeroDeletionURL($id) {
		return "?heros={$id}&amp;action=confirmerSuppression";
	}

	public function getHeroAskModificationURL($id) {
		return "?heros={$id}&amp;action=modifier#navigation";
	}

	public function getHeroModificationURL($id) {
		return "?heros={$id}&amp;action=confirmerModification";
	}

	public function getAboutURL() {
		return ".?action=aPropos#navigation";
	}

	public function getProfilURL($login){
		return ".?profil={$login}#navigation";
	}

	public function getAskChangePassWordURL($login){
		return ".?profil={$login}&amp;action=changerPW#navigation";
	}

	public function getChangePassWordURL($login){
		return ".?profil={$login}&amp;action=confirmerChangement";
	}

	public function getLogoutURL(){
		return ".?action=deconnexion";
	}

	public function POSTredirect($url) {
		header("Location: ".htmlspecialchars_decode($url), true, 303);
		die;
	}
}

?>
