<?php

try{
include_once("connect.php");

	$id=$_GET['idut'];
	$etat=0;
	$req=$db->query('UPDATE utilisateur SET etat="'.$etat.'" WHERE id_util="'.$id.'"');
	if ($req) {
	
	?>
	 <SCRIPT LANGUAGE="Javascript">	alert("Suppression effectue avec succés!"); </SCRIPT>
	<?php
 }else{
 	?>
	 <SCRIPT LANGUAGE="Javascript">	alert("Echec de Suppression!"); </SCRIPT>
	<?php
 }
	
	include_once("utilisateur.php");
exit();
	}catch(Exception $e){
	die('<p> Erreur['.$e->getCode().']:'.$e->getMessage()."</p>");
}

?>
	