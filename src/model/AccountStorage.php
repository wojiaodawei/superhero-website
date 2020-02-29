<?php 

interface AccountStorage{
	public function checkAuth($login, $password);
}
?>
