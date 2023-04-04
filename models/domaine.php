<?php
	require_once 'config.php';

	function getDomaines(){
		$req = "SELECT * FROM domaine ORDER BY nomDomaine"; // Il va trier en ordre croissant sur le nom et si on met DESC à la fin de nomDomaine ça sera en ordre decroissant.
		global $ds; // Pour avoir accès à la varibale ds definie dans config.php voilà pourquoi on met global.
		// Exécuter la requette
		$exe = $ds ->query($req);
		// Récupération de l'exécution de la requette
		// Si ça retourne un seul element alors on met Fetch() mais s'il y a plusieurs on met fetchAll().
		$tabDomaines = $exe->fetchAll();
		return $tabDomaines;
	}