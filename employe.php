<!DOCTYPE html>
<html>
<head>
	<title>umamebu</title>
  <link rel="stylesheet" type="text/css" href="css/style.css"> 
  <style type="text/css">

      .form{
              margin: auto;
             width:900px;
             height:600px;
             border:1px solid red;
             float: left;
       }

      #tab{
          margin-top: 100px;
          border:1px solid black;
          float: left;
          margin-left: 200px;
        }
      .envoie
        {
            height: 30px;
            width: 120px;
        }
   fieldset{
         height: auto;
         margin-left: 380px;
        float: left;
        border: 0px solid blue;
        background-color: #b8b8b8;

         }

  </style>
  
</head>
<body>

   <?php
   include("entete.php");
   ?>

  <div class="form">
            <center>
    <fieldset>
      <form method="post" action="enregistrerEmp.php">
        <label>NOM:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="nom" placeholder="Nom de l'employe"size="50%" required/><br/><br>
        <label>PRENOM:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="prenom" placeholder="Prenom de l'employe" size="50%" required/><br/><br>
        <label style="float: left;">DATE NAISSANCE:</label>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" name="datenaiss" placeholder=" Date de Naissance " size="50%" required/><br/><br>
        <label>TELEPHONE:</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="tel" placeholder=" Numero du tel" size="50%" required/><br/><br>
        <label>ADRESSE:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="adresse" placeholder="Adresse de l'employe" size="50%" required/><br/><br>
        <label>NIVEAU:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="niveau" placeholder=" Niveau d'etude" size="50%" required/><br/><br>
        <label>FONCTION:</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="fonction" placeholder=" fonction" size="50%" required/><br/><br>
        <label>CNI:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="cni" placeholder=" Numero de la carte d'identite" size="50%" required/>
        <p><input type="submit" value="AJOUTER" name="ajout" class="envoie"></p>
      
      </form>
    </fieldset>
</center>
	</div>

 <?php

 require_once("connect.php");

  $reponse=$db->query('SELECT * FROM employe where etat=1');
 try{ ?>
<div id="tab">

  <table border=1 cellspacing="0">
         <tr style="font-size:30px;"> <th colspan="11"> AFFICHAGE DES EMPLOIYES</th></tr>
     <tr>
       <th>ID</th>                          
       <th>NOM</th>
       <th>PRENOM</th>
       <th>DATE NAISSANCE</th>
       <th>TELEPHONE</th>
       <th>ADRESSE</th>
       <th>NIVEAU</th>
       <th>FONCTION</th>
       <th>CNI</th>
        <th colspan="2">ACTION</th>

     </tr>

     <?php 
      while($ligne=$reponse->fetch()){ ?>
        <tr>
           <td><?php echo($ligne['id_empl']); ?></td>
           <td><?php echo($ligne['nom']); ?></td>
           <td><?php echo($ligne['prenom']); ?></td>
           <td><?php echo($ligne['date_naiss']); ?></td>
           <td><?php echo($ligne['tel']); ?></td>
           <td><?php echo($ligne['adress']); ?></td>
           <td><?php echo($ligne['niveau_etude']); ?></td>
           <td><?php echo($ligne['fonction']); ?></td>
           <td><?php echo($ligne['CNI']); ?></td>
           <td style="background-color:#c0c0c0" cellspacing="0" border="0" align="left" ><a href="supprimerEmp.php?idprod=<?php echo($ligne['id_empl'])?>" >Supprimer</a></td>
           <td style="background-color:#c0c0c0" cellspacing="0" border="0" align="left" ><a href="editEmp.php?idEm=<?php echo($ligne['id_empl'])?>" >Modifier</a></td>
        </tr>
     <?php } ?>

  </table>
</div>
  <?php  
}catch(Exception $e){
  die('<p> Erreur['.$e->getCode().']:'.$e->getMessage()."</p>");
}

include_once("pied.php");
?>

</body>
</html>