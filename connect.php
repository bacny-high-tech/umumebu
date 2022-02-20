<?php
try{
	$db=new PDO('mysql:host=localhost;dbname = umamebu','root','');
	$db->query('SET NAMES utf-8');
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	// echo"vous etes deja connecté a la base de données<br>";

}catch(Exception $e){
	die('<p>Erreur,la connection à la base de données a echoué :'.$e->getMessage().'</p>');
}
?>
