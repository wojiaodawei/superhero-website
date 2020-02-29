<?php
require_once("HeroStorage.php");

class HeroStorageStub implements HeroStorage{
	protected $heroesTab;
	
	public function __construct(){
		$this->heroesTab = array(
								"Batman" => new Hero("Batman","DC","le chevalier noir","http://media.dcentertainment.com/sites/default/files/styles/character_thumb_160x160/public/CharThumb_215x215_batman_52ab7a8c79da39.68474144.jpg?itok=iHwyI5Vh"),
								"Superman" => new Hero("Superman","DC","l'homme d'acier","http://media.dcentertainment.com/sites/default/files/styles/character_thumb_160x160/public/CharThumb_215x215_superman_52ab9ab32a25e2.57621569.jpg?itok=Y-ED_ba9"),
								"Spiderman" => new Hero("Spiderman","Marvel","l'homme araignée","http://i.annihil.us/u/prod/marvel/i/mg/9/30/538cd33e15ab7/standard_xlarge.jpg"),
								"Deadpool" => new Hero("Deadpool","Marvel","l'homme immortel","http://x.annihil.us/u/prod/marvel/i/mg/5/c0/537ba730e05e0/standard_xlarge.jpg"),
							);
	}
	
	public function read($name) {
		if(array_key_exists($name, $this->heroesTab)) {
			return $this->heroesTab[$name];
		}
		return null;
	}

	public function readAll() {
		return $this->heroesTab;
	}
	
	public function create(Hero $h){}
	public function update($id, Hero $h){}
	public function delete($id){}
	public function deleteAll(){}
}
?>
