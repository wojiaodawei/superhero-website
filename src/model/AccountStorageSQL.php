<?php

require_once("AccountStorage.php");
require_once("Account.php");

class AccountStorageSQL implements AccountStorage{

	protected $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	
	public function checkAuth($login, $password){
		$query = 'SELECT `login`, `mdp`, `status`, `avatar` FROM `comptes` WHERE `login` = :login;';
		$st = $this->pdo->prepare($query);
		$st->execute(array(':login' => $login));
		$arr = $st->fetch();
		if (!$arr or !password_verify($password,$arr['mdp']))
			return null;
		return new Account($arr['login'], $arr['mdp'], $arr['status'], $arr['avatar']);
	}

	public function init() {
		$query = '
			DROP TABLE IF EXISTS `comptes`;
			CREATE TABLE `comptes` (
			  `login` varchar(15) DEFAULT NULL,
			  `mdp` varchar(255) DEFAULT NULL,
			  `status` varchar(255) DEFAULT NULL,
			  `avatar` varchar(255) DEFAULT "skin/super-icons/aquaman.png",
			  PRIMARY KEY (`login`)
			) DEFAULT CHARSET=utf8mb4;
		';
		$this->pdo->exec($query);
	}

	public function reinit() {
		$this->init();
		$this->create(new Account("DavidC",'$2y$10$f4JutW2HnPUDHNM0SBfcdugagT.fEdNVfBOgnb.wmpFFa75w/G/R6',"admin",'skin/super-icons/dead-pool.png'));
		$this->create(new Account("PierreB",'$2y$10$8hf1FKJFsK8sc1bW9YsI0ufkODNRAYukCFRh.6GxF86CMgkTEBx1q',"admin",'skin/super-icons/green-arrow.png'));
	}

	public function read($login){
		$query = 'SELECT `login`, `mdp`, `status`, `avatar` FROM `comptes` WHERE `login` = :login;';
		$st = $this->pdo->prepare($query);
		$st->execute(array(':login' => $login));
		$arr = $st->fetch();
		if (!$arr)
			return null;
		return new Account($arr['login'], $arr['mdp'], $arr['status'], $arr['avatar']);
	}

	public function readAll() {
		$query = 'SELECT `login`, `mdp`, `status`, `avatar` FROM `comptes`;';
		$st = $this->pdo->prepare($query);
		$st->execute();
		$heroes = array();
		while ($arr = $st->fetch()) {
			$heroes[$arr['login']] = new Hero($arr['login'], $arr['mdp'], $arr['status'], $arr['avatar']);
		}
		return $heroes;
	}

	public function create(Account $c) {
		$query = 'INSERT INTO `comptes`(`login`,`mdp`,`status`,`avatar`) VALUES (:login, :mdp, :status, :avatar);';
		$st = $this->pdo->prepare($query);
		$st->execute(array(
			':login' => $c->getLogin(),
			':mdp' => $c->getPassWord(),
			':status' => $c->getStatus(),
			':avatar' => $c->getAvatar(),
		));
		return $c->getLogin();
	}

	public function delete($login) {
		$query = 'DELETE FROM `comptes` WHERE `login` = :login';
		$st = $this->pdo->prepare($query);
		$st->execute(array(':login' => $login));
		return $st->rowCount() !== 0;
	}

	public function getCreationDate($login){
		$query = 'SELECT `created_at` FROM `comptes` WHERE `login` = :login;';
		$st = $this->pdo->prepare($query);
		$st->execute(array(':login' => $login));
		$arr = $st->fetch();
		if (!$arr)
			return null;
		return $arr['created_at'];
	}

	public function update($login, Account $c) {
		$query = 'UPDATE `comptes` SET `mdp`= :mdp WHERE `login`= :login ;';
		$st = $this->pdo->prepare($query);
		$st->execute(array(
			':mdp' => $c->getPassWord(),
			':login' => $login,
		));
		return $st->rowCount() !== 0;
	}

	public function deleteAll(){}

}

?>
