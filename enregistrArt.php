<?php 
error_reporting(0);

	require_once("connect.php");
	if (isset($_POST['save'])) {
        if ($_POST['produit']!="" AND $_POST['categorie']!="" AND $_POST['dimension']!="" AND $_POST['quantite']!="" AND $_POST['prix_unit']!="") 
        {
           
        $type = $_POST['produit'];
        $categorie = $_POST['categorie'];
        $dimension = $_POST['dimension'];
        $quantite = $_POST['quantite'];
        $prix_unit = $_POST['prix_unit'];

$repq=$db->query("select * from article where categorie='$categorie' and dimension='$dimension'");
foreach ($repq as $nb);
 $quantiteTot='';
  $quantiteTot = $nb['quantite']+$_POST['quantite'];
/*$total_quantity += $item["quantity"];*/
if ($nb) {
$req=$db->query('UPDATE article SET quantite="'.$quantiteTot.'" WHERE categorie="'.$categorie.'" and dimension="'.$dimension.'"');
  
   }
  else{

    $reqt=$db->query("INSERT INTO `article` (`id_prod`, `type`, `categorie`, `dimension`, `quantite`, `prix_unit`) VALUES ('','$type','$categorie','$dimension','$quantite','$prix_unit')");

    if ($reqt) {
       ?> <SCRIPT LANGUAGE="Javascript">alert("L\'ajout  est effectué avec succés!");</SCRIPT> <?php
    }else{
        ?> <SCRIPT LANGUAGE="Javascript">alert("Echec");</SCRIPT> <?php
    }
  } 
	}
     else{
        ?> <SCRIPT LANGUAGE="Javascript">alert("veuillez remplir tous les champs");</SCRIPT> <?php
    }
    require_once("Article.php");
	}

?>