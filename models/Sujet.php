<?php
require_once 'config.php';

	function insertSujet($libelle, $desc, $prob, $idDomaine){
		$req = "INSERT INTO sujet(libelleSujet, idDomaineF, problematique, description) VALUES ('$libelle',$idDomaine,'$prob','$desc') ";

		global $ds;

		return $ds ->exec($req);
	}
?>