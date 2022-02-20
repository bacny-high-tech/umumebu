<?php   

require_once("connect.php");

if (isset($_POST['mode'])) {	
	$id=$_POST['id'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$date=$_POST['datenaiss'];
	$tel=$_POST['tel'];
	$adress=$_POST['adresse'];
	$niv=$_POST['niveau'];
	$fonction=$_POST['fonction'];
	$cni=$_POST['cni'];
	
		
	$req=$db->query('UPDATE employe SET nom="'.$nom.'",prenom="'.$prenom.'",date_naiss="'.$date.'",tel="'.$tel.'",adress="'.$adress.'",niveau_etude="'.$niv.'",fonction="'.$fonction.'",CNI="'.$cni.'" WHERE id_empl="'.$id.'"');
	
	?>
	 <SCRIPT LANGUAGE="Javascript">	alert("Modifié avec succés!"); </SCRIPT>
	<?php
 
	header("location:employe.php");
	}
		
?>