<?php 


	require_once("connect.php");
	if (isset($_POST['ajouter'])) {
        if ($_POST['nom']!="" AND $_POST['prenom']!="" AND $_POST['tel']!="" AND $_POST['adresse']!="" AND $_POST['cni']!="") 
        {
           
        $nom_cl = $_POST['nom'];
        $prenom_cl = $_POST['prenom'];
        $tel = $_POST['tel'];
        $adress = $_POST['adresse'];
        $CNI = $_POST['cni'];
    

    $reqt=$db->query("INSERT INTO umamebu.client (nom_cl, prenom_cl, tel, adress, CNI) VALUES ('$nom_cl','$prenom_cl','$tel','$adress','$CNI')");

    if ($reqt) {
       ?> <SCRIPT LANGUAGE="Javascript">alert("L\'ajout  est effectué avec succés!");</SCRIPT> <?php
    }
        else{
        ?> <SCRIPT LANGUAGE="Javascript">alert("Echec");</SCRIPT> <?php
    }
	}
     else{
        ?> <SCRIPT LANGUAGE="Javascript">alert("veuillez remplir tous les champs");</SCRIPT> <?php
    }
    require_once("Client.php");
	}

?>