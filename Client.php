
<!DOCTYPE html>
<html>
<head>
	<title>umamebu</title>
  <style >

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
    <form method="post" action="enregistrerClient.php">
      <label>NOM:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="nom" placeholder="Nom du Client"size="80%" required/><br/><br>
      <label>PRENOM:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="prenom" placeholder="Prenom du Client" size="80%" required/><br/><br>
      <label>TELEPHONE:</label> &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="tel" placeholder=" Numero du tel" size="80%" required/><br/><br>
      <label>ADRESSE:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="adresse" placeholder="Adresse du Client" size="80%" required/><br/><br>
      <label>CNI:</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="cni" placeholder=" Numero de la carte d'identite" size="80%" required/><br/><br>
      <p><input type="submit" value="ENREGISTRER" name="ajouter" class="envoie">
      <input type="reset" value="Reinitialiser" class="envoie"></p>
    </form>
    </fieldset>
</center>
	</div>
<?php } ?>
   <?php

   require_once("connect.php");

  $reponse=$db->query('SELECT * FROM umamebu.client where etat=1');
 try{ ?>

  <table border=1  cellspacing="0" style="center">
         <tr style="font-size:30px;"> <th colspan="8"> AFFICHAGE DES CLIENTS</th></tr>
     <tr>
       <th>ID</th>
       <th>Nom</th>
       <th>Prénom</th>
       <th>Téléphone</th>
       <th>Adresse</th>
       <th>CNI</th>
       <?php    if($_SESSION['NIV']==0){ 
           echo '<th colspan="2">Action</th>';
           } ?>
       
     </tr>

     <?php 
      while($ligne=$reponse->fetch()){ 
        $_SESSION['id_client']=$ligne['id_cl']; 
        $_SESSION['nom_client']=$ligne['nom_cl'];
        $_SESSION['prenom_client']=$ligne['prenom_cl'];
        ?>
        <tr>
           <td><?php echo($ligne['id_cl']); ?></td>
           <td><?php echo($ligne['nom_cl']); ?></td>
           <td><?php echo($ligne['prenom_cl']); ?></td>
           <td><?php echo($ligne['tel']); ?></td>
           <td><?php echo($ligne['adress']); ?></td>
           <td><?php echo($ligne['CNI']); ?></td>
            <?php    if(($_SESSION['NIV']==0)||($_SESSION['NIV']==2)){ ?>
           <td style="background-color:#c0c0c0" cellspacing="0" border="0" align="left" ><a href="supprimerClient.php?idcl=<?php echo($ligne["id_cl"])?>">Supprimer</a></td>
           <td style="background-color:#c0c0c0" cellspacing="0" border="0" align="left" >
            <a href="editerCl.php?idcl=<?php echo($ligne["id_cl"])?>">Modifier</a></td>
           
          <?php  } ?>
        </tr>
     <?php } ?>

  </table>

  <?php  
}catch(Exception $e){
  die('<p> Erreur['.$e->getCode().']:'.$e->getMessage()."</p>");
}
include_once("pied.php");
?>

</body>
</html>