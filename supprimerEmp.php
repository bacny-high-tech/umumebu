<?php

try{
include_once("connect.php");

	$id=$_GET['idprod'];
	$etat=0;
	$req=$db->query('UPDATE employe SET etat="'.$etat.'" WHERE id_empl="'.$id.'"');
	if ($req) {
		echo "La Supprission est effectuée avec succes";
	}else{
		echo "La suppression echoué"; 
	}
	
	header("location:employe.php");

	}catch(Exception $e){
	die('<p> Erreur['.$e->getCode().']:'.$e->getMessage()."</p>");
}
?>

