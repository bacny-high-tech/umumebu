<?php   

require_once("connect.php");

if (isset($_POST['edite'])) {	
	$id=$_POST['id'];
	$produit=$_POST['produit'];
	$categorie=$_POST['categorie'];
	$dimension=$_POST['dimension'];
	$quantite=$_POST['quantite'];
	$pu=$_POST['prix_unit'];
		
	$req=$db->query('UPDATE article SET type="'.$produit.'",categorie="'.$categorie.'",dimension="'.$dimension.'",quantite="'.$quantite.'",prix_unit="'.$pu.'" WHERE id_prod="'.$id.'"');
	
	?>
	 <SCRIPT LANGUAGE="Javascript">	alert("Modifié avec succés!"); </SCRIPT>
	<?php
 
	header("location:Article.php");
	}
		
?>