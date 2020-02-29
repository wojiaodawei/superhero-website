<?php

require_once("model/Hero.php");
require_once("model/HeroStorage.php");


class HeroStorageMySQL implements HeroStorage {

	protected $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	
	public function init() {
		$query = '
			DROP TABLE IF EXISTS `heroes`;
			CREATE TABLE `heroes` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `name` varchar(255) DEFAULT NULL,
			  `firm` varchar(255) DEFAULT NULL,
			  `description` varchar(255) DEFAULT NULL,
			  `img_url` varchar(255) DEFAULT NULL,
			  `author` varchar(30) DEFAULT NULL,
			  `created_at` TIMESTAMP,
			  PRIMARY KEY (`id`)
			) DEFAULT CHARSET=utf8mb4;
		';
		$this->pdo->exec($query);
	}

	public function reinit() {
		$this->init();
		$this->create(new Hero("Batman","DC","le chevalier noir","http://media.dcentertainment.com/sites/default/files/styles/character_thumb_160x160/public/CharThumb_215x215_batman_52ab7a8c79da39.68474144.jpg?itok=iHwyI5Vh","DavidC"));
		$this->create(new Hero("Superman","DC","l'homme d'acier","http://media.dcentertainment.com/sites/default/files/styles/character_thumb_160x160/public/CharThumb_215x215_superman_52ab9ab32a25e2.57621569.jpg?itok=Y-ED_ba9","PierreB"));
		$this->create(new Hero("Spiderman","Marvel","l'homme araignée","http://i.annihil.us/u/prod/marvel/i/mg/9/30/538cd33e15ab7/standard_xlarge.jpg","DavidC"));
		$this->create(new Hero("Deadpool","Marvel","l'homme immortel","http://x.annihil.us/u/prod/marvel/i/mg/5/c0/537ba730e05e0/standard_xlarge.jpg","PierreB"));
	}

	public function read($id) {
		$query = 'SELECT `name`, `firm`, `description`, `img_url`, `author` FROM `heroes` WHERE `id` = :id;';
		$st = $this->pdo->prepare($query);
		$st->execute(array(':id' => $id));
		$arr = $st->fetch();
		if (!$arr)
			return null;
		return new Hero($arr['name'], $arr['firm'], $arr['description'], $arr['img_url'], $arr['author']);
	}

	public function readAll() {
		$query = 'SELECT `id`, `name`, `firm`, `description`, `img_url`, `author` FROM `heroes`;';
		$st = $this->pdo->prepare($query);
		$st->execute();
		$heroes = array();
		while ($arr = $st->fetch()) {
			$heroes[$arr['id']] = new Hero($arr['name'], $arr['firm'], $arr['description'], $arr['img_url'], $arr['author']);
		}
		return $heroes;
	}

	public function create(Hero $h) {
		$query = 'INSERT INTO `heroes` (`name`, `firm`, `description`, `img_url`, `author`) VALUES (:name, :firm, :description, :img_url, :author);';
		$st = $this->pdo->prepare($query);
		$st->execute(array(
			':name' => $h->getName(),
			':firm' => $h->getFirme(),
			':description' => $h->getDesc(),
			':img_url' => $h->getPhoto(),
			':author' => $h->getAuthor(),
		));
		return $this->pdo->lastInsertId();
	}

	public function delete($id) {
		$query = 'DELETE FROM `heroes` WHERE `id` = :id';
		$st = $this->pdo->prepare($query);
		$st->execute(array(':id' => $id));
		return $st->rowCount() !== 0;
	}

	public function getCreationDate($id){
		$query = 'SELECT `created_at` FROM `heroes` WHERE `id` = :id;';
		$st = $this->pdo->prepare($query);
		$st->execute(array(':id' => $id));
		$arr = $st->fetch();
		if (!$arr)
			return null;
		return $arr['created_at'];
	}

	public function update($id, Hero $h) {
		$query = 'UPDATE `heroes` SET `name` = :name, `firm` = :firm, `description` = :description, `img_url` = :img_url WHERE `id` = :id;';
		$st = $this->pdo->prepare($query);
		$st->execute(array(
			':name' => $h->getName(),
			':firm' => $h->getFirme(),
			':description' => $h->getDesc(),
			':img_url' => $h->getPhoto(),
			':id' => $id,
		));
		return $st->rowCount() !== 0;
	}

	public function getHeroesCreatedBy($login){
		$query = 'SELECT `id`, `name` FROM `heroes` WHERE `author` = :login;';
		$st = $this->pdo->prepare($query);
		$st->execute(array(':login' => $login));
		$arr = $st->fetchAll();
		if (!$arr)
			return null;
		return $arr;
	}

	public function deleteAll(){}
}

?>
