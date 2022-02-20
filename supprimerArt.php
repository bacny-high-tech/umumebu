<?php

try{
include_once("connect.php");

	$id=$_GET['idprod'];
	$etat=0;
	$req=$db->query('UPDATE article SET etat="'.$etat.'" WHERE id_prod="'.$id.'"');
	if ($req) {
		echo "La Supprission est effectuée avec succes";
	}else{
		echo "La suppression echoué"; 
	}
	
	header("location:Article.php");

	}catch(Exception $e){
	die('<p> Erreur['.$e->getCode().']:'.$e->getMessage()."</p>");
}
?>
