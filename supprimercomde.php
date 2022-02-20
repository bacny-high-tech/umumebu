<?php

try{
include_once("connect.php");

	$id=$_GET['idcom'];
	$etat=0;
	$req=$db->query('UPDATE commande SET etat="'.$etat.'" WHERE id_com="'.$id.'"');
	if ($req) {
		echo "La Supprission est effectuée avec succes";
	}else{
		echo "La suppression echoué"; 
	}
	
	header("location:commande.php");

	}catch(Exception $e){
	die('<p> Erreur['.$e->getCode().']:'.$e->getMessage()."</p>");
}
?>