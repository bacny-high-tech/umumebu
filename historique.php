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

 ?> 

      <center style="padding-bottom: 50px;" >

              <form method="POST" action="" enctype="multipart/form-data">
              <table cellpadding="15">  
              <tr><b style="font-size:20px; ">CONSULTER VOTRE HISTORIQUE ICI</b></tr>
                <tr>  <td><b>Titre:</b> </td><td>
                  <select name="choix" style="width:135px; height:22px;" >
                <option style="background-color:#c0c0c0;font-weight:bold;" value="0" >
                  
                  <option>Article</option>
                  <option>Client</option>
                  <option >Commande</option>
                  <option >Vente</option>
                </option>    
                </select>
                </td>
                <td></td><td><input type=submit name="histo" value="Afficher"></td>
                </tr>
              </table>
              </form>

      </center>

<center>
   <?php 
 include("connect.php");
if (isset($_POST['histo'])) {
    $pers=$_POST['choix'];
                    
            if ($pers=="Article") { 
      $reponse = $db->query('select * from article where  etat=0');
              ?>

                  <table border=1  cellspacing="0">
         <tr style="font-size:20px;"> <th colspan="8"> HISTORIQUE DES PRODUITS</th></tr>
     <tr>
       <th>ID</th>
       <th>Type Produit</th>
       <th>Catégorie</th>
       <th>Dimension</th>
       <th>Quantité</th>
       <th>Prix Unitaire</th>
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

        </tr>
     <?php } ?>

  </table>

<?php 

}elseif ($pers=="Client") {
 $reponse = $db->query('select * from client where  etat=0');
              ?>

                  <table border=1  cellspacing="0">
         <tr style="font-size:20px;"> <th colspan="8"> HISTORIQUE DES CLIENTS</th></tr>
     <tr>
       <th>ID</th>
       <th>Nom</th>
       <th>Prénom</th>
       <th>Téléphone</th>
       <th>Adresse</th>
       <th>CNI</th>
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

           
        </tr>
     <?php } ?>

  </table>

<?php 

}elseif ($pers=="Commande") {
 $reponse = $db->query('select * from commande where  etat=0');
              ?>

                  <table border=1  cellspacing="0">
         <tr style="font-size:20px;"> <th colspan="8"> HISTORIQUE DES COMMANDES</th></tr>
     <tr>
       <th>ID Cde</th>
       <th>Nom client</th>
       <th>Date Payement</th>
       <th>Type payement</th>
       <th>Num. Trans.</th>
       <th>Prix Tot.</th>
     </tr>

     <?php 
      while($ligne=$reponse->fetch()){ ?>
        <tr>
           <td><?php echo($ligne['id_com']); ?></td>
           <td><?php echo($ligne['id_cl']); ?></td>
           <td><?php echo($ligne['date_paie']); ?></td>
           <td><?php echo($ligne['type_paie']); ?></td>
           <td><?php echo($ligne['num_trans']); ?></td>
           <td><?php echo($ligne['montant']); ?></td>

        </tr>
     <?php } ?>

  </table>

<?php
}elseif ($pers=="Vente") {
   $reponse = $db->query('select * from articlevendu where  etat=0');
              ?>

                  <table border=1  cellspacing="0">
         <tr style="font-size:20px;"> <th colspan="8"> HISTORIQUE DES PRODUITS VENDUS</th></tr>
     <tr>
       <th>ID</th>
       <th>IDCommande</th>
       <th>Date Cde</th>
       <th>Type produit</th>
       <th>Catégorie</th>
       <th>Dimension</th>
       <th>Qté Cde</th>       
       <th>PT</th>
     </tr>

     <?php 
      while($ligne=$reponse->fetch()){ ?>
        <tr>
           <td><?php echo($ligne['id_artv']); ?></td>
           <td><?php echo($ligne['id_com']); ?></td>
           <td><?php echo($ligne['date_com']); ?></td>
           <td><?php echo($ligne['type']); ?></td>
           <td><?php echo($ligne['categorie']); ?></td>
           <td><?php echo($ligne['dimension']); ?></td>
            <td><?php echo($ligne['quantite_com']); ?></td>
            <td><?php echo($ligne['prix_tot']); ?></td>

        </tr>
     <?php } ?>

  </table>
  <?php
}elseif ($pers=="utilisateur"){
   $reponse = $db->query('select * from utilisateur where  etat=0');
              ?>

                  <table border=1  cellspacing="0">
         <tr style="font-size:20px;"> <th colspan="8"> HISTORIQUE DES UTILISATEURS</th></tr>
     <tr>
       <th>ID</th>                          
       <th>LOGIN</th>
       <th>MOT DE PASSE</th>
       <th>NIVEAU</th>
     </tr>

     <?php 
      while($ligne=$reponse->fetch()){ ?>
        <tr>
           <td><?php echo($ligne['nom'].''.$ligne['prenom']); ?></td>
           <td><?php echo($ligne['login']); ?></td>
           <td><?php echo($ligne['password']); ?></td>
           <td><?php echo($ligne['niveau']); ?></td>

        </tr>
     <?php } ?>

  </table>
  </center>
  <?php
}
}
?>

  <?php   
include("pied.php");

?>
</body>
</html>