<?php

try{
include_once("connect.php");

	$id=$_GET['idartv'];
	$etat=0;
	$req=$db->query('UPDATE articlevendu SET etat="'.$etat.'" WHERE id_artv="'.$id.'"');
	if ($req) {
		echo "La Supprission est effectuée avec succes";
	}else{
		echo "La suppression echoué"; 
	}
	
	header("location:ArticleVendu.php");

	}catch(Exception $e){
	die('<p> Erreur['.$e->getCode().']:'.$e->getMessage()."</p>");
}
?>