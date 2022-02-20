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
            height: 40px;
            width: 150px;
        }

         .corps{
          width: auto;
          height: 400px;
          border: 0px solid blue;
          float: left;
          margin: 0px 0px 15px 290px;
          overflow: auto;

         }
	</style>
  <link rel="stylesheet" type="text/css" href="css/style.css"> 
</head>

<body>
<?php
   include("entete.php");
 
   require_once("connect.php");
  $reponse=$db->query('SELECT c.nom_cl as nomcl,c.prenom_cl as prenomcl, co.* FROM umamebu.commande co,umamebu.client c where c.id_cl=co.id_cl and co.etat=1 order by id_com');
 try{ ?> 
  <div class="corps">
<center>
        <div class="search">
        <form method="post" action="recherch_comande.php" enctype="multipart/form-data">
        <input type="text" class="rech" name="rechercher" placeholder="recherche" value=''/>
        <input type="submit" value="Rechercher">
        </form>
      </div>
  <table border=1  cellspacing="0">
    <tr style="font-size:30px;"> <th colspan="11"> Affichage des Commandes</th></tr>
     <tr>
       <th>ID Cde</th>
       <th>Nom client</th>
       <th>Date Payement</th>
       <th>Type payement</th>
       <th>Num. Trans.</th>
       <th>Prix Tot.</th>
       <th colspan="3">Action</th>
     </tr>
     <?php 
      while($ligne=$reponse->fetch()){ 
        $id_com=$ligne['id_com'];
        $id_cl=$ligne['id_cl'];
        ?>
        <tr>
           <td><?php echo($ligne['id_com']); ?></td>
           <td><?php echo($ligne['nomcl'].'&nbsp;'.$ligne['prenomcl']); ?></td>
           <td><?php echo($ligne['date_paie']); ?></td>
           <td><?php echo($ligne['type_paie']); ?></td>
           <td><?php echo($ligne['num_trans']); ?></td>
           <td><?php echo($ligne['montant']); ?></td>
           <?php if($_SESSION['NIV']==0){ ?>
            <td style="background-color:#c0c0c0" cellspacing="0" border="0" align="left" >
              <a href="ArticleVendu.php?idcom=<?php echo($ligne["id_com"])?> "> Détails</a></td>
           <td style="background-color:#c0c0c0" cellspacing="0" border="0" align="left" >
            <a href="supprimercomde.php?idcom=<?php echo $id_com; ?>">Supprimer</a></td>
          <?php }  ?>
              
               <td style="background-color:#c0c0c0" cellspacing="0" border="0" align="left" ><a href="Facture.php?idcom=<?php echo $id_com; ?>" >Facture</a></td>
        </tr>
     <?php } ?>

  </table>
</center>
</div>
  <?php  
}catch(Exception $e){
  die('<p> Erreur['.$e->getCode().']:'.$e->getMessage()."</p>");
} 
include("pied.php");

?>
</body>
</html>