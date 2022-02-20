<?php

try{
include_once("connect.php");

	$id=$_GET['idcl'];
	$etat=0;
	$req=$db->query('UPDATE client SET etat="'.$etat.'" WHERE id_cl="'.$id.'"');
	if ($req) {
		echo "La Supprission est effectuée avec succes";
	}else{
		echo "La suppression echoué"; 
	}
	
	header("location:Client.php");

	}catch(Exception $e){
	die('<p> Erreur['.$e->getCode().']:'.$e->getMessage()."</p>");
}
?>
