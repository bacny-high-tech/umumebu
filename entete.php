<?php
session_start();
if (isset($_SESSION['nom'])) {
  $nom=$_SESSION['nom'];
  $prenom=$_SESSION['prenom'];
  //$fonc=$_SESSION['fonction'];
  $fonc=strtoupper($_SESSION['fonction']);

 //$nom1='IRANKUNDA Eric';
/* $on='En ligne';*/
/* $on='Connecté';*/

}   

                  $fils='fileTeste.txt';
                  $sep=',,';
                  $somme=0;
                  $quantite=0;
                 // $tab=array();
                  $text=file_get_contents($fils);
                  $cont=$text;  
                  if(trim($text)!='')
                  {  
                    $ext=explode("\n",trim($cont)); 
                  //insert ligne
                  foreach($ext as $ke=>$val)
                  {
                    $lin=explode($sep,trim($val));
$somme+=$lin[6];
$quantite+=$lin[4];

}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
<title>umamebu</title>
  <style type="text/css">
    strong{
      color: #d488cc;
    }
 .caddie {
border: 0px solid blue;
width: 50px;
float: left;

 } 
  .panier {
   text-decoration: none;

 } 
  .somme {
   border: 0px solid blue;
    width: 100px;
   float: left;
 } 
  .qt {
   border: 0px solid blue;
   width: 60px;
float: left;
margin:5px;
color: green; 
 } 
 .cadre{
  width: auto;
  height: 600px;
  border: 0px solid red;
 }
  </style>
  <link rel="stylesheet" type="text/css" href="css/style.css"> 
  </head>
  <body>

<div class="bloc_page">
    <div class="tete">
        <div class="logo">
            <img src="images/logo.png" width="102px" height="100px"/>
        </div>
        <div class="title">
          <h2> <strong>U</strong>sine des <strong>Ma</strong>tériaux <strong>Mé</strong>taliques Au  <strong>Bu</strong>rundi </h2>
        </div>
        <div class="dec">
          <div class="nom"><?php echo $nom.'&nbsp;&nbsp;'.$prenom; ?></div>
          <div class="decon"><a href="logout.php?log=<?php echo $prenom; ?>"><img src="images/Deconnex.png" height="60px"  width="60px" title="Déconnexion" /> </a></div>
          <div class="on"><?php echo $fonc; ?> </div>
        </div>
  </div>
    <div class="menu">  
        <nav>
          <ul>
            <li><a href="index2.php">Accueil</a></li>
            <li><a href="Article.php">Article</a></li>
            <li><a href="Client.php">Client</a></li>
            <?php    if(($_SESSION['NIV']==0)||($_SESSION['NIV']==2)){ 
            echo '<li><a href="vente.php">Vente</a></li>'; 
             }  ?>
             <?php  if(($_SESSION['NIV']==0)||($_SESSION['NIV']==1)){
            echo '<li><a href="commande.php">Commande</a></li>';
             }  ?>
          <?php    if($_SESSION['NIV']==0){ 
            echo '<li><a href="employe.php">Employés</a></li>
                  <li><a href="utilisateur.php">Utilisateur</a></li>';
           }  ?>
           <?php  if(($_SESSION['NIV']==0)||($_SESSION['NIV']==1)){
            echo '<li><a href="ArticleVendu.php">ArticleVendus</a></li>';
            }  ?>
                      <?php    if($_SESSION['NIV']==0){ 
            echo '<li><a href="historique.php">Historique</a></li>';
           }  ?>

          </ul>
        </nav>
          <?php    if(($_SESSION['NIV']==0)||($_SESSION['NIV']==2)){ ?>
      <div class="panier"><a href="panier.php">
        
        <div class="caddie"> <img src="images/caddie.png" height="30px" ></div> 
        <div class="qt"> 
          <?php 
              if (($quantite==1)||($quantite==0)) {
                echo $quantite.'&nbsp;Article';
              }else {
                echo $quantite.'&nbsp;Articles';
              }
             ?> 
     </div>
       <div class="somme"> <?php echo $somme.'&nbsp;&nbsp;'; ?>BIF</div>

      </a></div>
    <?php } ?>
    </div>

</div>
 <div class="cadre">
  </body>
</html>