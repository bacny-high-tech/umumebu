<?php
include_once("connect.php");
if (isset($_POST['modifie'])) {	
	$id=$_POST['idcl'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$tel=$_POST['tel'];
	$adresse=$_POST['adresse'];
	$cni=$_POST['cni'];
	
		
	$req=$db->query('UPDATE client SET nom_cl="'.$nom.'",prenom_cl="'.$prenom.'",tel="'.$tel.'",adress="'.$adresse.'",CNI="'.$cni.'" WHERE id_cl="'.$id.'"');
	
	?>
	 <SCRIPT LANGUAGE="Javascript">	alert("Modifié avec succés!"); </SCRIPT>
	<?php
 
	header("location:Client.php");
	}
		
?>
