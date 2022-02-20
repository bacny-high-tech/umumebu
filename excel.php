<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<style type="text/css">
  
  body{
    background-color: lightblue;
  }
  table{
    margin:auto;
    margin-top: 20%;
  }

</style>
<body>
<table border="1" cellpadding="0" cellspacing="0">

<?php
session_start();
// accès à la base de données ("serveur","utilisateur","mot de passe")
//mysql_connect("localhost","root","") or die("La connexion a échoué !");
include_once("connect.php");
// on sélectionne la base 
 //mysql_select_db("umamebu");
$today=date('d/m/Y')."&nbsp;".date('G', filemtime(__FILE__)).":".date('i:s');
// on initialise la première ligne du tableau, qui correspond au nom des champs
$xls_output = ' 
  <tbody>
  <tr ><strong style="font-size:25px;margin-left:20px;">Rapport des articles vendus&nbsp;&nbsp;'.$today=date('d/m/Y')."&nbsp;".date('G', filemtime(__FILE__)).":".date('i:s').'</strong> </tr>
              <tr style="font-weight: bold;" bgcolor="gray">
              <th>Id_article</th>
              <th>Id_commande</th>
              <th>Date commande</th>
              <th>Type produit</th>
              <th>Categorie</th>
              <th>Dimension</th>
              <th>Quantite</th>
              <th>Prix Total</th>
            </tr>';

$xls_output .= "\n";

//Requête SQL
  $re1 = $db->query("SELECT sum(Prix_Tot )as somme from umamebu.articlevendu where etat = 1");

  $fa=$re1->fetch();

//$re1 ="SELECT sum(Prix_Tot )as somme from articlevendu where etat = 1";
//$fa=$re1->fetch();
//$fa = mysql_query($re1) or die(mysql_error());

$requete=$db->query("SELECT id_artv, id_com, date_com, type, quantite_com, categorie, dimension, prix_tot FROM umamebu.articlevendu WHERE etat=1"); //requête
//$resultats = $requete->fetch(); //récupération des résultats

 //Boucle sur les resultats
while($ligne= $requete->fetch())
{
$xls_output .= "
<tr><td>".$ligne['id_artv']."</td><td>".$ligne['id_com']." </td><td>".$ligne['date_com']." </td><td>".$ligne['type']." </td><td>".$ligne['quantite_com']." </td><td>".$ligne['categorie']." </td><td>".$ligne['dimension']." </td><td>".$ligne['prix_tot']." </td></tr>";

}
/*$xls_output .= "<tr><td colspan='7'>Total Général</td><td style='border: 0px solid black; text-decoration: underline;font-size: 15px;font-weight: bold;'>".$result= round($fa['somme'],2) .""."Fbu"."</td><td></td></tr>";*/
/*$xls_output .= "
<tr><td colspan='8'>".$ligne['prix_tot']." </td></tr>";*/
$xls_output .= "</table>
</body>
</html>";
 header("Content-type: application/vnd.ms-excel"); 
header("Content-disposition: attachment; filename=Rapport.xls");
 header("Content-type: application/octet-stream" );
 print $xls_output;
exit; ?>