<!DOCTYPE html>
<html>
<head>
	<title>umamebu</title>
	<style>
 
       .form{
       	      margin: auto;
             width:900px;
             height:600px
       }

         table
        {
          
            position:relative;
            left:300px;
            overflow: auto;
        }
        .cad{
          overflow: auto;
          width: auto;
          height: 435px;
          border: 1px solid #f1f1f1;
        }


	</style>
  <link rel="stylesheet" type="text/css" href="css/style.css"> 
</head>

<body>
<?php

session_start();
  // include("entete.php");
require_once 'connect.php';

if(isset($_GET['idcom'])){
  $idcom=$_GET["idcom"];
  //echo $idc;
}
$re1 = $db->query("SELECT sum(Prix_Tot )as somme from umamebu.articlevendu where etat = 1");
$fa=$re1->fetch();

  $reponse=$db->query("SELECT id_artv, id_com, date_com, type, quantite_com, categorie, dimension, prix_tot FROM umamebu.articlevendu WHERE etat=1");
 try{ ?>
<div class="cad">
  <table border=1  cellspacing="0">
         <tr style="font-size:30px;"> <th colspan="11"> Affichage des Articles Vendus</th></tr>
     <tr style="background-color: #aaa;">
       <th>ID_Artv</th>
       <th>ID_Comde</th>
       <th>Date Cde</th>
       <th>Type produit</th>
       <th>Catégorie</th>
       <th>Dimension</th>
       <th>Qté Cde</th>       
       <th>PT</th>
    <?php  if($_SESSION['NIV']==0){ echo '<th>Action</th>'; }  ?>
       
     </tr>

     <?php 
      while($ligne=$reponse->fetch()){ 
        if ($ligne['id_artv']%2!=0) { ?>
        <tr style="background-color: #c7c6c6;">
           <td><?php echo($ligne['id_artv']); ?></td>
           <td><?php echo($ligne['id_com']); ?></td>
           <td><?php echo($ligne['date_com']); ?></td>
           <td><?php echo($ligne['type']); ?></td>
           <td><?php echo($ligne['categorie']); ?></td>
           <td><?php echo($ligne['dimension']); ?></td>
            <td><?php echo($ligne['quantite_com']); ?></td>
            <td><?php echo($ligne['prix_tot']); ?></td>

          <?php  if($_SESSION['NIV']==0){ ?>
            <td style="background-color:#c0c0c0" cellspacing="0" border="0" align="left" >
            <a href="suppartv.php?idartv=<?php echo($ligne["id_artv"])?>">Supprimer</a></td>
        <?php   }  ?>
           
           
        </tr>

     <?php }else { ?>
             
          <tr style="background-color: #c2e1dd;">
           <td><?php echo($ligne['id_artv']); ?></td>
           <td><?php echo($ligne['id_com']); ?></td>
           <td><?php echo($ligne['date_com']); ?></td>
           <td><?php echo($ligne['type']); ?></td>
           <td><?php echo($ligne['categorie']); ?></td>
           <td><?php echo($ligne['dimension']); ?></td>
            <td><?php echo($ligne['quantite_com']); ?></td>
            <td><?php echo($ligne['prix_tot']); ?></td>

          <?php  if($_SESSION['NIV']==0){ ?>
          <td style="background-color:#c0c0c0" cellspacing="0" border="0" align="left" >
            <a href="suppartv.php?idartv=<?php echo($ligne["id_artv"])?>">Supprimer</a></td>
         <?php  }  ?>


        </tr>

         <?php }
       }
         
               ?>
<!--   <tr><td colspan="7">Total Général</td><td style="border: 0px solid black; text-decoration: underline;font-size: 15px;font-weight: bold;"><?php//echo $result= round($fa['somme'],2) .' '.'Fbu' ?></td><td></td></tr> -->
  <tr> <td colspan="9"> <a href="excel.php" style="font-size:20px; color: blue; font-weight: bold;">Exporter Excel</a></td></tr>    
  </table>
</div>
  <?php  
}catch(Exception $e){
  die('<p> Erreur['.$e->getCode().']:'.$e->getMessage()."</p>");
}

include("pied.php");

?>




</body>
</html>