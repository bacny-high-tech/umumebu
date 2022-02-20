<?php 
 require_once("connect.php");

          if(isset($_GET['idut'])){
          $idut=$_GET['idut']; 
          $reponse=$db->query("SELECT * FROM utilisateur WHERE id_util='$idut'");
          $li=$reponse->fetch(); 
          }
          

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
             height:200px;
             border:0px solid red;
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

  <div class="form">
            <center>
 <fieldset>
  <form method="POST" action="modifierutil.php">
    <label style="float: left;"></label>
      <input type="hidden" name="idutil" placeholder=" entrer le mot de passe " size="30%" value="<?php echo($li['id_util']); ?>" required/>
    <label style="float: left;">LOGIN:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="login" value="<?php echo($li['login']); ?>" placeholder="entrer le login" size="30%" required/><br/><br>
    <label style="float: left;">MOT DE PASSE:</label>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password" value="<?php echo($li['password']); ?>" placeholder=" entrer le mot de passe " size="30%" required/><br/><br>
    <label style="float: left;" >NIVEAU:</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="niveau" placeholder=" Entrer le niveau" size="30%" value="<?php echo($li['niveau']); ?>" required/><br/><br>
       
    <p><input type="submit" class="envoie" name="edite" value="Modifier">
     </p>
      
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
         <tr style="font-size:30px;"> <th colspan="11"> AFFICHAGE DES EMPLOIYES</th></tr>
     <tr>
       <th>ID</th>                          
       <th>LOGIN</th>
       <th>MOT DE PASSE</th>
       <th>NIVEAU</th>
        <th colspan="2">ACTION</th>

     </tr>

     <?php 
      while($ligne=$reponse->fetch()){ ?>
        <tr>  
           <td><?php echo($ligne['nom'].''.$ligne['prenom']); ?></td>
           <td><?php echo($ligne['login']); ?></td>
           <td><?php echo($ligne['password']); ?></td>
           <td><?php echo($ligne['niveau']); ?></td>
           <td style="background-color:#c0c0c0" cellspacing="0" border="0" align="left" ><a href="supprimerutil.php?idut=<?php echo($ligne['id_util'])?>" >Supprimer</a></td>
           <td style="background-color:#c0c0c0" cellspacing="0" border="0" align="left" ><a href="editutil.php?idut=<?php echo($ligne['id_util'])?>" >Modifier</a></td>
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