<?php 


	require_once("connect.php");
	if (isset($_POST['save'])) {
        if ($_POST['datecom']!="" AND $_POST['quantite']!="" AND $_POST['categorie']!="" AND $_POST['dimension']!="" AND $_POST['pt']!="") 
        {
        $idcl = $_POST['idcli']; 
        $idp = $_POST['idp'];  
        $datec = $_POST['datecom']; 
        $categorie = $_POST['categorie'];
        $dimension = $_POST['dimension'];
        $quantiteco = $_POST['quantite'];
        $prix_unit = $_POST['pt'];
    

    $reqt=$db->query("INSERT INTO `commande` (`id_com`, `id_cl`, `id_prod`, `date_com`, `quantite_com`, `categorie`, `dimension`, `prix_tot`) VALUES ('','$idcl','$idp','$datec','$quantiteco','$categorie','$dimension','$prix_unit')");

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
    require_once("commande.php");
	}

?>