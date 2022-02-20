<?php
  include("entete.php");
?>
<?php 
  require_once("connect.php");
if(isset($_GET['idc'])){
  $idc=$_GET["idc"];
  //echo $idc;
}
$_SESSION['idc']=$_GET["idc"];
$idcli=$_SESSION['idc'];
if (isset($_GET["ajouter"]))
{
$j=$_GET["ajouter"];
$sel = $db->query("select quantite from umamebu.article where id_prod='$j'");
foreach ($sel as  $vaz)

if ($vaz['quantite']>0) {

$reponse=$db->query("SELECT c.id_cl as idc, c.nom_cl as nom,c.prenom_cl as prenom,p.type as type, p.categorie as categ, p.dimension as dimension, p.quantite as qte, p.prix_unit as pu, e.nom as nome,e.prenom as prenome FROM umamebu.employe e, umamebu.article p, umamebu.client c where p.id_prod='$j'");
foreach ($reponse as  $va)

  $idclient=$va['idc'];
  $type=$va['type'];
  $categorie=$va['categ'];
  $dim=$va['dimension'];
  $quantite=1;
  $pu=$va['pu'];
  $pt=$pu*$quantite;

$value=$idclient.',,'.$type.',,'.$categorie.',,'.$dim.',,'.$quantite.',,'.$pu.',,'.$pt."\r\n";

/*$v=var_dump($value);
echo $value;*/
$monFichier= 'fileTeste.txt';
file_put_contents($monFichier, $value, FILE_APPEND);
     $delai=1; 
       $url='vente.php';
       header("Refresh: $delai;url=$url");
}else{
    $erreur="<img src='vue.png'>&nbsp;&nbsp;L'article n'est pas disponible dans le stock";
  //echo $erreur;
       }
  }

?>

<!-- 
  ******************************************************************************************
  ******************************************************************************************
  ******************************************************************************************
  ******************************************************************************************
 -->
<!DOCTYPE html>
<html>
<head>
	<title>umamebu </title>
    <link rel="stylesheet" type="text/css" href="css/style.css"> 
       <style type="text/css">
           #prod{
    height: 100%;
    width: 100%;
    border:0px solid red; 
    background-color: lightgray;
    float: left;
  }
  #tr{
    width: 1200px;
    height: auto;
    border: 0px solid black;
    float: left;
    margin: 20px 0px 0px 0px;
  }
   #td{
    width: 200px;
    height: 20px;
    border: 0px solid black;
    margin: 0px 20px 0px 0px;
    float: left;
    text-align: left;
  }
  #mot{

border:0px solid #0066CC ;
width: 500px;
height: 500px;
border: 1px dotted green;
padding:70px 40px 70px 0px;
float:middle;
font-size:48px;
font-weight:bold;
color:#0e0a87;
text-shadow:40px 30px 5px #37c78f;
font-style:italic;
font-family:Georgia,"Times New Roman", Times, serif;
opacity:1;
}
a{
  text-decoration: none;
}
#pied{
width:100%;
height:50px;
border:0px;
margin-top:20px;
padding:0px;
float:left;
background-color:#888;
text-align: center;
position: absolute;
}
       </style>
</head>


<body>
  <center>
<div class="scrollable">
      
<div style="background-color: gray; border: 0px solid blue; height: 40px; width: 1200px; margin-bottom: 10px;float: left;margin-left: 75px;"><b style="font-weight: bold; font-size: 30px;">CHOIX DE TYPES DE PAYEMENT</b>  </div>
    
         <table width="1090" border=0 cellpadding="0" cellspacing="20">
        <tr><?php 

        $reponse = $db->query('select * from umamebu.modepayement');
             foreach ($reponse as  $mode)
              $_SESSION['e']=$mode['modeID'];
                $re= $_SESSION['e'];
                $_SESSION['n']=$mode['nom_mode'];
                $non=$_SESSION['n'];
                //echo $non;
              if ($re=1 and $non='LUMICACH' ) {
                
                 echo '<td width="161" height="150"><a href="payement.php?idmod='.$re.' ID_client='.$idc.'Nom_mode='.$non.'" > <img src="images/lumicashpayer.png" TITLE="PAYER AVEC LUMICASH" width="300" height="200" /></a> </td>';
                } 
            
               if ($re=2 and $non='ECOCASH') {

                 echo '<td width="161" height="150"><a href="payement.php?idmod='.$re.'ID_client='.$idc.'Nom_mode='.$non.'" > <img src="images/ecokashi.png" TITLE="PAYER AVEC ECOCASH" width="300" height="200" /></a> </td>'; }?>
                    
                  </tr>
                 <tr>

                <?php  if ($re=3 and $non='CASH') {
                 echo '<td width="161" height="150"><a href="payement.php?idmod='.$re.'ID_client='.$idc.' Nom_mode='.$non.'" > <img src="images/cash.png" TITLE="PAYER CASH" width="300" height="200" /></a> </td>';} 

                  if ($re=4 and $non='BORDEREAU') {
                 echo '<td ><a href="payement.php?idmod='.$re.' ID_client='.$idcli.' Nom_mode='.$non.'" > <b id="mot" TITLE="PAYER VIA LA BANQUE">BORDEREAU</b></a> </td>';} 

                  ?></tr>
      </table>
      </div>
</center>
  <?php

    // include("pied.php");
  ?>
<div id=pied>
   <div class="copyright text-center">
   <b> <p>&copy; 2020 All rights reserved || Burundi-Bujumbura , Ntahangwa , Zone Industriel Avenue d'Uvira - umamabu.bi@gmail.com , +257 71 577 531</p></b>
  </div>
  
 </div>
</body>
</html>