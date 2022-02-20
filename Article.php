<!DOCTYPE html>
<html>
<head>
	<title>umamebu</title>
	 <link rel="stylesheet" type="text/css" href="css/style.css"> 
  <link rel="stylesheet" type="text/css" href="css/easyadmin/app.css"> 
</head>

<body>
 <?php
   include("entete.php");
   ?> 

   <div class="row">
    <?php    if(($_SESSION['NIV']==0)||($_SESSION['NIV']==2)){ ?>
  <div class="form col-md-5">
    <center>
    <fieldset>
      <h3 class="left">Nouveau produit</h3>
      <form method="post" class =" mt-3" action="enregistrArt.php">
        <div class="mb-3">
          <input type="text" class="form-control form-control-sm" name="produit" placeholder="le nom du produit">
        </div>
        <div class="mb-3">
          <input type="text" class="form-control form-control-sm" name="categorie" placeholder="categorie du produit">
        </div>
        <div class="mb-3">
          <input type="type" class="form-control form-control-sm" name="dimension" placeholder="dimension">
        </div>
        <div class="mb-3">
          <input type="text" class="form-control form-control-sm" name="quantite" placeholder="quantite">
        </div>
        <div class="mb-3">
           <input type="text" class="form-control form-control-sm" name="prix_unit" placeholder="le prix du produit">
         </div>
       <p class="d-grid gap-2 d-md-flex justify-content-md-end"><input type="submit" value="Valider" name="save" class="btn btn-primary btn-sm">
        <input type="reset" value="Mettre à zero" class="btn btn-primary btn-sm"></p>

      </form>
    </fieldset>
</center>
  </div>
<?php } ?>

<?php require_once("connect.php");

  $reponse=$db->query('SELECT * FROM umamebu.article where etat=1');

 try{ ?>
  <div class="col-md-7 p-3 ">
    <center class ="">
  <table border=1  cellspacing="0" class="table " width="80%">
         <tr style="font-size:20px;"> <th colspan="8"> AFFICHE L'ARTICLE</th></tr>
     <tr>
       <th>ID</th>
       <th>Type Produit</th>
       <th>Catégorie</th>
       <th>Dimension</th>
       <th>Quantité</th>
       <th>Prix Unitaire</th>
        <?php    if(($_SESSION['NIV']==0)||($_SESSION['NIV']==2)){ 
            echo '<th colspan="">Action</th>'; 
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
            <td>
            <a href="supprimerArt.php?idprod=<?php echo($ligne['id_prod'])?>" >
              <i class="fa fa-trash text-black mr-1"></i>
            </a>
            <a href="editerArt.php?idpro=<?php echo($ligne["id_prod"])?>">
              <i class="fa fa-edit text-black mr-1"></i>
            </a>
          </td>
             <?php  }  ?>           
        </tr>
     <?php } ?>
  </table>
  <?php  
    }catch(Exception $e){ die('<p> Erreur['.$e->getCode().']:'.$e->getMessage()."</p>");} ?>

</center></div>



</div>

<?php
include("pied.php");

?>
</body>
</html>