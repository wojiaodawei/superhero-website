<?php

require_once("model/Hero.php");

class HeroBuilder {

	protected $data;
	private $error;

	public function __construct(array $data) {
		if (!isset($data['nom']))
			$data['nom'] = '';
		if (!isset($data['firme']))
			$data['firme'] = '';
		if (!isset($data['description']))
			$data['description'] = '';
		if (!isset($data['photo']))
			$data['photo'] = '';
		$this->data = $data;
		$this->error = null;
	}

	public function getData() {
		return $this->data;
	}

	public function getError() {
		return $this->error;
	}

	public function createHero() {
		return new Hero($this->data['nom'], $this->data['firme'], $this->data['description'], $this->data['photo'], $_SESSION['user']->getLogin());
	}

	public function isValid() {
		$this->error = '';
		if ($this->data['nom'] === '') {
			$this->error .= 'Le nom ne doit pas être vide. ';
		}
		if ($this->data['firme'] === '') {
			$this->error .= 'La firme ne doit pas être vide. ';
		}
		if ($this->data['description'] === '') {
			$this->error .= 'La description ne doit pas être vide. ';
		}
		if ($this->data['photo'] === '' or (filter_var($this->data['photo'], FILTER_VALIDATE_URL) === FALSE)) {
			$this->error .= "L'URL de l'image est soit non renseignée soit invalide. ";
		}
		return $this->error === '';
	}

	public function getNameRef() {
		return 'nom';
	}

	public function getFirmRef() {
		return 'firme';
	}

	public function getDescRef() {
		return 'description';
	}

	public function getImageRef() {
		return 'photo';
	}
}

?>
