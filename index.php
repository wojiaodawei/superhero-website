<?php
	set_include_path("./src");

	require_once("Router.php");
	require_once("model/HeroStorageMySQL.php");
	require_once("model/AccountStorageSQL.php");
	require_once('???/mysql_config.php');

	$dsn = "mysql:host=".$MYSQL_HOST.";port=".$MYSQL_PORT.";dbname=".$MYSQL_DB.";charset=utf8";
	$user = $MYSQL_USER;
	$pass = $MYSQL_PASSWORD;
	$pdo = new PDO($dsn, $user, $pass);
	
	$heroStorage = new HeroStorageMySQL($pdo);
	$accountStorage = new AccountStorageSQL($pdo);

	$r = new Router();
	$r->main($heroStorage,$accountStorage);
?>

