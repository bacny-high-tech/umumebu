<!DOCTYPE html>
<html>
<head>
	<title>umamebu</title>
  <style >

      .form{
              margin: auto;
             width:900px;
             height:600px
       }

        .envoie
        {
             height: 30px;
            width: 120px;
        }
         fieldset{
          
             height: auto;
             margin-left: 385px;
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

    include_once("connect.php");

          if(isset($_GET['idcl'])){
          $idcl=$_GET['idcl']; 
          $reponse=$db->query("SELECT * FROM client WHERE id_cl='$idcl'");
          $li=$reponse->fetch(); 
          }
          
   ?>
  <?php
   include("entete.php");
   ?>

  <div class="form">
    <center>
    <fieldset>
      <form method="post" action="modifierclient.php">
        <input type="hidden" name="idcl" placeholder="id" value="<?php echo($li['id_cl']); ?>" required/>
        <label>NOM:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="nom" placeholder="Nom du Client"size="50%" value="<?php echo($li['nom_cl']); ?>" required/><br/><br>
        <label>PRENOM:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="prenom" placeholder="Prenom du Client" size="50%" value="<?php echo($li['prenom_cl']); ?>" required/><br/><br>
        <label>TELEPHONE:</label> <input type="text" name="tel" placeholder=" Numero du tel" size="50%" value="<?php echo($li['tel']); ?>" required/><br/><br>
        <label>ADRESSE:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="adresse" placeholder="Adresse du Client" size="50%" value="<?php echo($li['adress']); ?>" required/><br/><br>
        <label>CNI:</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="cni" placeholder=" Numero de la carte d'identite" size="50%" value="<?php echo($li['CNI']); ?>" required/><br/><br>
        <p><input type="submit" value="MODIFIER" name="modifie"/>
        

      </form>
    </fieldset>
</center>
	</div>

   <?php
  $reponse=$db->query('SELECT * FROM client where etat=1');
 try{ ?>
<center>
  <table border=1  cellspacing="0" style="center">
         <tr style="font-size:30px;"> <th colspan="8"> AFFICHE LES CLIENTS</th></tr>
     <tr>
       <th>ID</th>
       <th>NOM</th>
       <th>PRENOM</th>
       <th>TELEPHONE</th>
       <th>ADRESSE</th>
       <th>CNI</th>
       <th>SUPPRESSION</th>
       <th>MODIFICATION</th>
     </tr>

     <?php 
      while($ligne=$reponse->fetch()){ ?>
        <tr>
           <td><?php echo($ligne['id_cl']); ?></td>
           <td><?php echo($ligne['nom_cl']); ?></td>
           <td><?php echo($ligne['prenom_cl']); ?></td>
           <td><?php echo($ligne['tel']); ?></td>
           <td><?php echo($ligne['adress']); ?></td>
           <td><?php echo($ligne['CNI']); ?></td>
           <td style="background-color:#c0c0c0" cellspacing="0" border="0" align="left" ><a href="supprimerClient.php?idcl=<?php        echo($ligne['id_cl'])?>" >Supprimer</a></td>
           <td style="background-color:#c0c0c0" cellspacing="0" border="0" align="left" ><a href="editerCl.php?idcl=<?php 
                     echo($ligne['id_cl'])?>" >Modifier</a></td>
        </tr>
     <?php } ?>

  </table>
</center>
  <?php  
}catch(Exception $e){
  die('<p> Erreur['.$e->getCode().']:'.$e->getMessage()."</p>");
}
include_once("pied.php");
?>

</body>
</html>