<?php
class Hero{
	protected $nom;
	protected $firme;
	protected $description;
	protected $photo;
	protected $creationDate;
	protected $modifDate;
	protected $auteur;
	
	public function __construct($n,$f,$d,$p,$auteur/*,$creationDate=null/*, $modifDate=null*/){
		$this->nom = $n;
		$this->firme = $f;
		$this->description = $d;
		$this->photo = $p;
		$this->auteur = $auteur;
		/*$date = new DateTime();
		$this->creationDate = $creationDate !== null? $creationDate: $date->getTimestamp();
		$this->modifDate = $modifDate !== null? $modifDate: new DateTime();*/
	}
	
	public function getName(){
		return $this->nom;
	}
	
	public function getFirme(){
		return $this->firme;
	}
	
	public function getDesc(){
		return $this->description;
	}
	
	public function getPhoto(){
		return $this->photo;
	}
	
	public function getAuthor() {
		return $this->auteur;
	}
	
	public function getCreationDate() {
		return $this->creationDate;
	}

	public function getModifDate() {
		return $this->modifDate;
	}
		
	/*public function setName($name) {
		if (!self::isNameValid($name))
			throw new Exception("Invalid color name");
		$this->name = $name;
		$this->modifDate =date(DATE_RFC2822);
	}*/
}
?>
