<?php 
 require_once("connect.php");
?>
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
          margin-left: 350px;
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


  $reponse=$db->query("SELECT *  FROM employe where etat=1");
   ?>

  <div class="form">
            <center>
 <fieldset>
  <form method="POST" action="enregistrerUtil.php">
    <label style="float: left;">NOM ET PRENOM:</label>
        <select name="utilisateur" >
    <option selected> </option>
     <?php  
     foreach($reponse as $cl) 
      {
      
      echo '<option value="'.$cl['id_empl'].'">'.$cl['id_empl'].'&nbsp;'.$cl['nom'].'&nbsp;'.$cl['prenom'].' </option>';
    }
    echo '</select>';

        ?><br/><br>
    <label style="float: left;">LOGIN:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="login" placeholder="entrer le login" size="30%" required/><br/><br>
    <label style="float: left;">MOT DE PASSE:</label>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password" placeholder=" entrer le mot de passe " size="30%" required/><br/><br>
    <label style="float: left;" >NIVEAU:</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="niveau" placeholder=" Entrer le niveau" size="30%" min="0" max="3" value="1" required/><br/><br>
       
    <p><input type="submit" class="envoie" name="ajout" value="AJOUTER">
      <input type="reset" value="Reinitialiser" class="envoie"></p>
      
      </form>
    </fieldset>
</center>
	</div>
   <?php

  $reponse=$db->query("SELECT e.id_empl as id_empl, e.nom as nom, e.prenom as prenom, u.login as login, u.password as password, u.niveau as niveau FROM employe e, utilisateur u where e.id_empl=u.id_util and u.etat=1");
 try{ 
   ?>

<div id="tab">

  <table border=1 cellspacing="0">
         <tr style="font-size:30px;"> <th colspan="11"> AFFICHAGE DES UTILISATEURS</th></tr>
     <tr>
       <th>CLIENT</th>                          
       <th>LOGIN</th>
       <th>MOT DE PASSE</th>
       <th>NIVEAU</th>
        <th colspan="2">ACTION</th>

     </tr>

     <?php 
      while($ligne=$reponse->fetch()){ ?>
        <tr>  
           <td><?php echo($ligne['nom'].'&nbsp;'.$ligne['prenom']); ?></td>
           <td><?php echo($ligne['login']); ?></td>
           <td><?php echo($ligne['password']); ?></td>
           <td><?php echo($ligne['niveau']); ?></td>
           <td style="background-color:#c0c0c0" cellspacing="0" border="0" align="left" ><a href="supprimerutil.php?idut=<?php echo($ligne['id_empl'])?>" >Supprimer</a></td>
           <td style="background-color:#c0c0c0" cellspacing="0" border="0" align="left" ><a href="editutil.php?idut=<?php echo($ligne['id_empl'])?>" >Modifier</a></td>
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