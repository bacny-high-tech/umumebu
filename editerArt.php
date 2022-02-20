



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

         .iden
        {
          
            position:absolute;
            left:100px;
        }
        .envoie
        {
             height: 30px;
            width: 120px;
        }
         input
         {
          
             height: 20px;
         }
     
         fieldset{
          
             height: auto;
             margin-left: 335px;
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
  margin-top: 10px;
  float: left;
}
	</style>
  <link rel="stylesheet" type="text/css" href="css/style.css"> 
</head>

<body>
<?php
   include_once("entete.php");

   include_once("connect.php");

          if(isset($_GET['idpro'])){
          $idpr=$_GET['idpro']; 
          $reponse=$db->query("SELECT * FROM article WHERE id_prod='$idpr'");
          $li=$reponse->fetch(); 
          }
          
     ?>
	
	<div class="form">
        <center>
    <fieldset>
      <form method="post" action="modifierArt.php">
   <input type="hidden" name="id" value="<?php echo($li['id_prod']); ?>" size="60%" required/><br/><br>
        <label>TYPE PRODUIT:</label><input type="text" name="produit" value="<?php echo($li['type']); ?>" size="60%" required/><br/><br>
        <label>CATEGORIE:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="categorie" value="<?php echo($li['categorie']); ?>" size="60%" required/><br/><br>
        <label>DIMENSION:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="dimension" value="<?php echo($li['dimension']); ?>" size="60%" required/><br/><br>
        <label>QUANTITE:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="quantite" value="<?php echo($li['quantite']); ?>" size="60%" required/><br/><br>
        <label>PRIX UNITAIRE:</label><input type="text" name="prix_unit" value="<?php echo($li['prix_unit']); ?>" size="60%" required/><br/><br>
        <input type="submit" value="Modifier" name="edite" class="envoie">
    
      </form>
    </fieldset>
</center>
	</div>
  <center>
  <table border=1  cellspacing="0">
   <tr style="font-size:30px;"> <th colspan="8"> AFFICHE L'ARTICLE</th></tr>
     <tr>
       <th>ID</th>
       <th>TYPE PRODUIT</th>
       <th>CATEGORIE</th>
       <th>DIMENSION</th>
       <th>QUANTITE</th>
       <th>PRIX UNITAIRE</th>
       <th>SUPPRESSION</th>
       <th>MODIFICATION</th>
     </tr>

    <?php
        try{
      $reponse = $db->query('SELECT * FROM article where etat=1'); 
      while($ligne=$reponse->fetch()){ 
    ?>
        <tr>
           <td><?php echo($ligne['id_prod']); ?></td>
           <td><?php echo($ligne['type']); ?></td>
           <td><?php echo($ligne['categorie']); ?></td>
           <td><?php echo($ligne['dimension']); ?></td>
           <td><?php echo($ligne['quantite']); ?></td>
           <td><?php echo($ligne['prix_unit']); ?></td>
           <td style="background-color:#c0c0c0" cellspacing="0" border="0" align="left" ><a href="supprimerArt.php?idp=<?php echo($ligne['id_prod'])?>" >Supprimer</a></td>
           <td style="background-color:#c0c0c0" cellspacing="0" border="0" align="left" ><a href="editerArt.php?idp=<?php echo($ligne['id_prod'])?>" >Modifier</a></td>
        </tr>
     <?php } ?>

  </table>

  <?php  
}catch(Exception $e){
  die('<p> Erreur['.$e->getCode().']:'.$e->getMessage()."</p>");
}

include_once("pied.php");
?>
</center>
</body>
</html>