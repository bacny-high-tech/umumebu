
<?php
require_once("connect.php");

if (isset($_POST['edite'])) {	
	$id=$_POST['idutil'];
    $log = $_POST['login'];
     $pass = $_POST['password'];
     $niveau = $_POST['niveau'];
	
		
	$req=$db->query('UPDATE utilisateur SET login="'.$log.'",password="'.$pass.'",niveau="'.$niveau.'" WHERE id_util="'.$id.'"');
	if ($req) {
		
	
	?>
	 <SCRIPT LANGUAGE="Javascript">	alert("Modifié avec succés!"); </SCRIPT>
	<?php
 }else{
 	?>
	 <SCRIPT LANGUAGE="Javascript">	alert("Echec de modification!"); </SCRIPT>
	<?php
 }

	require_once("utilisateur.php");
	}
	exit();	
?>