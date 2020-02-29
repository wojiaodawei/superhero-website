<?php

class Account{
	protected $login;
	protected $mdp;
	protected $status;
	protected $avatar;
	
	function __construct($login, $mdp, $status, $avatar='skin/super-icons/aquaman.png') {
		$this->login = $login;
		$this->mdp = $mdp;
		$this->status = $status;
		$this->avatar = $avatar;
	}

	public function getLogin(){
		return $this->login;
	}

	public function getPassWord(){
		return $this->mdp;
	}

	public function getStatus(){
		return $this->status;
	}
	
	public function getAvatar(){
		return $this->avatar;
	}

	public function setNewPassWord($newPW){
		$this->mdp = $newPW;
	}
}

?>
