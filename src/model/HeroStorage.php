<?php 

require_once("Hero.php");

interface HeroStorage{
	public function create(Hero $h);
	public function read($id);
	public function readAll();
	public function update($id, Hero $h);
	public function delete($id);
	public function deleteAll();
}
?>
