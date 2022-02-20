<?php 
  require_once("connect.php");

if (isset($_GET["ajouter"]))
{ 
$j=$_GET["ajouter"];
$sel = $db->query("select quantite from umamebu.article where id_prod='$j'");
foreach ($sel as  $vaz)


if ($vaz['quantite']>0) {

$reponse=$db->query("SELECT c.id_cl as idc, c.nom_cl as nom,c.prenom_cl as prenom,p.type as type, p.categorie as categ, p.dimension as dimension, p.quantite as qte, p.prix_unit as pu,p.id_prod as idpro FROM umamebu.article p, umamebu.client c where p.id_prod='$j'");
foreach ($reponse as $va)
  $idp=$va['idpro'];
  $type=$va['type'];
  $categorie=$va['categ'];
  $dim=$va['dimension'];
  $quantite=1;
  $pu=$va['pu'];
  $pt=$pu*$quantite;

$value=$idp.',,'.$type.',,'.$categorie.',,'.$dim.',,'.$quantite.',,'.$pu.',,'.$pt."\r\n";

$monFichier= 'fileTeste.txt';
file_put_contents($monFichier, $value, FILE_APPEND);
     $delai=1; 
       $url='vente.php';
       header("Refresh: $delai;url=$url");
}else{
    $erreur="<img src='vue.png'>&nbsp;&nbsp;L'article n'est pas disponible dans le stock";
   }
     }
    
?>

<center>      
    </center>
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
    height: auto;
    width: 100%;
    border:0px solid red; 
    background-color: hlightgray;
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
       </style>
</head>

<?php
  include("entete.php");
?>
<body>
  <center>
<div class="scrollable">
      
    <div style="background-color: gray; border: 0px solid blue; height: 40px; width: 1200px; margin-bottom: 10px;float: left;margin-left: 75px;"><B style="font-weight: bold; font-size: 30px; " >CHOIX DES ARTICLES</B>  </div>
    <div class="sear" style="float: right; color: red;padding-left: 0em; margin-right: 15em;border: 0px solid #c1c1c1; text-align: center;font-weight: bold;"><?php  if(isset($erreur)){ echo $erreur; } ?></div>
    <div id="prod"> 
  <div style="background-color: gray; border: 0px solid blue; height: 25px; width: 1200px; margin-bottom: 30px;">
  <div style=" height:20px; font-weight: bold;" id="td"><b>TYPE</b></div>
  <div style=" height:20px; font-weight: bold;" id="td"><b>CATEGORIE</b></div>
  <div style=" height:20px; font-weight: bold;" id="td"><b>DIMENSION</b></div>
  <div style=" height:20px; font-weight: bold;" id="td"><b>QUANTITE</b></div>
  <div style=" height:20px; font-weight: bold;" id="td"><b>PRIX UNITAIRE</b></div> 

    <?php 
    $reponse = $db->query('select * from umamebu.article where etat=1 order by id_prod asc');
      while($art=$reponse->fetch()){ 
        if ($art['id_prod']%2!=0) { ?>
        <div style="background-color: #c7c6c6;" id="tr">
          <div  style=" height: 20px;" id="td"><b><?php echo($art['type'])?></b></div>
          <div  style=" height: 20px;" id="td"><?php echo($art['categorie'])?></div>
          <div  style=" height: 20px;" id="td"><?php echo($art['dimension'])?></div>
          <div  style=" height: 20px;" id="td"><?php 
           $qte=$art['quantite'];
           if ( $qte>=1 && $qte<=10){
             echo $qte.'<b style="color:#f71454;">&nbsp;&nbsp;&nbsp;En cours de rupture</b></br>';
            }elseif ($qte>=1) {
              echo $qte.'&nbsp;&nbsp;&nbsp;&nbsp;<b style="color:green;">En Stock</b></br>';
            }else{
                  echo $qte.'&nbsp;&nbsp;&nbsp;&nbsp;<b style="color:gray;">Pas disponible</b></br>';
                 }

              ?></div>
              <div  style=" height: 20px;" id="td"><strong><?php echo($art['prix_unit']).'&nbsp;BIF'?></strong></div>
              <div  style=" height: 20px;" id="" width="300px" height="300px">
           <a href="vente.php?ajouter=<?php echo($art['id_prod'])?>">
            <img src="images/ajoutee.png" title="Ajouter l'article" /></a>
                
              </div>
                  </div>
          <?php }else { ?>
              <div style="background-color: #c2e1dd;" id="tr">
              <div  style=" height: 20px;" id="td"><b><?php echo($art['type'])?></b></div>
              <div  style=" height: 20px;" id="td"><?php echo($art['categorie'])?></div>
              <div  style=" height: 20px;" id="td"><?php echo($art['dimension'])?></div>
              <div  style=" height: 20px;" id="td"><?php 
                $qte=$art['quantite'];
                //echo $qte;
                if ( $qte>=1 && $qte<=10) {
                  echo $qte.'<b style="color:#f4a34c;"><img src="images/vue.png">En cours de rupture</b></br>';
                  //echo $qte;
                }elseif ($qte>=1) {
                  echo $qte.'&nbsp;&nbsp;&nbsp;&nbsp;<b style="color:green;">En Stock</b></br>';
                  //echo $qte;
                }else{
                  echo $qte.'&nbsp;&nbsp;&nbsp;&nbsp;<b style="color:gray;">Pas disponible</b></br>';
                  //echo $qte;
                }
              ?></div>
              <div  style=" height: 20px;" id="td"><strong><?php echo($art['prix_unit']).'&nbsp;BIF'?></strong></div>
              <div  style=" height: 20px;" id="" width="300px" height="300px">
           <a href="vente.php?ajouter=<?php echo($art['id_prod'])?>">
            <img src="images/ajoutee.png" title="Ajouter l'article" /></a>
                
              </div>
            </div>
         <?php }
                    } ?>
          </div>   
        <!-- </table> -->
        
      </div>
</center>
  <?php
    include("pied.php");
  ?>
</body>
</html>