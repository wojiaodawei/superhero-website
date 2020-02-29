<?php

require_once("Hero.php");
require_once("HeroStorage.php");

class HeroStorageFile implements HeroStorage {

	private $db;
	private $file;
	private $curid;

	public function __construct($file) {
		$this->file = $file;
		if (file_exists($this->file)) {
			$this->db = unserialize(base64_decode(file_get_contents($this->file)));
		} else {
			$this->db = array();
		}
		end($this->db);
		$lastkey = key($this->db);
		if ($lastkey === null)
			$this->curid = 0;
		else
			$this->curid = intval($lastkey) + 1;
	}

	public function __destruct() {
		file_put_contents($this->file, base64_encode(serialize($this->db)));
	}

	public function init() {
		$this->db = array();
		$this->curid = 1;
	}

	public function reinit() {
		$this->init();
		$this->create(new Hero("Batman","DC","le chevalier noir","http://media.dcentertainment.com/sites/default/files/styles/character_thumb_160x160/public/CharThumb_215x215_batman_52ab7a8c79da39.68474144.jpg?itok=iHwyI5Vh"));
		$this->create(new Hero("Superman","DC","l'homme d'acier","http://media.dcentertainment.com/sites/default/files/styles/character_thumb_160x160/public/CharThumb_215x215_superman_52ab9ab32a25e2.57621569.jpg?itok=Y-ED_ba9"));
		$this->create(new Hero("Spiderman","Marvel","l'homme araignée","http://i.annihil.us/u/prod/marvel/i/mg/9/30/538cd33e15ab7/standard_xlarge.jpg"));
		$this->create(new Hero("Deadpool","Marvel","l'homme immortel","http://x.annihil.us/u/prod/marvel/i/mg/5/c0/537ba730e05e0/standard_xlarge.jpg"));
	}
	
	public function create(Hero $h) {
		$id = "{$this->curid}"; // attention : l'id est une chaîne
		if (array_key_exists($id, $this->db))
			throw new Exception("The next id is already used");
		$this->db[$id] = $h;
		$this->curid++;
		return $id;
	}

	public function read($id) {
		if (array_key_exists($id, $this->db))
			return $this->db[$id];
		else
			return null;
	}

	public function readAll() {
		return $this->db;
	}

	public function update($id, Hero $h) {
		if (array_key_exists($id, $this->db)) {
			$this->db[$id] = $h;
			return true;
		}
		return false;
	}

	public function delete($id) {
		if (array_key_exists($id, $this->db)) {
			unset($this->db[$id]);
			return true;
		}
		return false;
	}

	public function deleteAll() {
		$this->db = array();
	}

}

?>
