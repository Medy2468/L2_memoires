<?php
	// Les parametres de connexions
	define("SERVEUR","localhost");
	define("DB_NAME","L2_memoires");
	define("USER","root");
	define("PASSWORD",'');

	// Definir le Domain Server Name(DSN)
	$dsn = 'mysql:host='.SERVEUR.';dbname='.DB_NAME.';charset=utf8';
	// Options de PDO pour la gestion des erreurs
	$tabOptions = array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	);

	// Création de l'instance PDO
	try{
		$ds = new PDO($dsn,USER,PASSWORD);
	}catch (PDOException $ex){
		die($ex ->getMessage());
	}
// Recherche sur Ajax, comment integrer ajax/json dans du php.