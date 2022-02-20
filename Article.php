<!DOCTYPE html>
<html>
<head>
	<title>umamebu</title>
	<style>
 
      .form{
       	      
             width:1040px;
             height:600px;
             border: 1px solid black;
       }
      .envoie
        {
            height: 30px;
            width: 120px;
        }
         fieldset{
          
             height: auto;
             margin-left: 285px;
             float: left;
             border: 0px solid blue;
             background-color: #b8b8b8;
         }
label{
  font-weight: bold;
   float: left;
}
table{
  width: 670px;
  margin-left: 325px;
  float: left;
}

	</style>
  <link rel="stylesheet" type="text/css" href="css/style.css"> 
</head>

<body>
<?php
   include("entete.php");
   ?>
	  <?php    if(($_SESSION['NIV']==0)||($_SESSION['NIV']==2)){ ?>
	<div class="form">
    <center>
    <fieldset>
      <form method="post" action="enregistrArt.php">
        <label>TYPE PRODUIT:</label><input type="text" name="produit" placeholder="Type produit"size="80%" required/><br/><br>
        <label>CATEGORIE:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="categorie" placeholder="categorie du produit" size="80%" required/><br/><br>
        <label>DIMENSION:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="dimension" placeholder=" dimension " size="80%" required/><br/><br>
        <label>QUANTITE:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="quantite" placeholder="Quantite du produit" size="80%" required/><br/><br>
        <label>PRIX UNITAIRE:</label><input type="text" name="prix_unit" placeholder="Prix du produit" size="80%" required/><br/><br>
        <p><input type="submit" value="Valider" name="save" class="envoie">
        <input type="reset" value="Mettre à zero" class="envoie"></p>

      </form>
    </fieldset>
</center>
	</div>
<?php } ?>
<?php
   require_once("connect.php");

  $reponse=$db->query('SELECT * FROM umamebu.article where etat=1');
 try{ ?>
<center>
  <table border=1  cellspacing="0">
         <tr style="font-size:20px;"> <th colspan="8"> AFFICHE L'ARTICLE</th></tr>
     <tr>
       <th>ID</th>
       <th>Type Produit</th>
       <th>Catégorie</th>
       <th>Dimension</th>
       <th>Quantité</th>
       <th>Prix Unitaire</th>
        <?php    if(($_SESSION['NIV']==0)||($_SESSION['NIV']==2)){ 
            echo '<th colspan="2">Action</th>'; 
             }  ?>
       
     </tr>

     <?php 
      while($ligne=$reponse->fetch()){ ?>
        <tr>
           <td><?php echo($ligne['id_prod']); ?></td>
           <td><?php echo($ligne['type']); ?></td>
           <td><?php echo($ligne['categorie']); ?></td>
           <td><?php echo($ligne['dimension']); ?></td>
           <td><?php echo($ligne['quantite']); ?></td>
           <td><?php echo($ligne['prix_unit']); ?></td>
           <?php    if($_SESSION['NIV']==0){ ?>
           <td style="background-color:#c0c0c0" cellspacing="0" border="0" align="left" ><a href="supprimerArt.php?idprod=<?php echo($ligne['id_prod'])?>" >Supprimer</a></td>
           <?php  }  ?>

           <?php    if(($_SESSION['NIV']==0)||($_SESSION['NIV']==2)){ ?>
            <td style="background-color:#c0c0c0" cellspacing="0" border="0" align="left" ><a href="editerArt.php?idpro=<?php echo($ligne["id_prod"])?>"> Modifier</a></td> 
           <?php  }  ?>
           
        </tr>
     <?php } ?>

  </table>

  <?php  
}catch(Exception $e){
  die('<p> Erreur['.$e->getCode().']:'.$e->getMessage()."</p>");
}

include("pied.php");

?>

</center>

</body>
</html>