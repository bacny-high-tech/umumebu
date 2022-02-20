   <?php  
   include("entete.php");
//session_start();
   ?>

      <script type="text/javascript">
        function PrintDiv(id) {
            var data=document.getElementById(id).innerHTML;
            var myWindow = window.open('', 'my div', 'height=400,width=1000');
            myWindow.document.write('<html><head><title>umamebu</title>');
            /*optional stylesheet*/ //myWindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
            myWindow.document.write('</head><body >');
            myWindow.document.write(data);
            myWindow.document.write('</body></html>');
            myWindow.document.close(); // necessary for IE >= 10

            myWindow.onload=function(){ // necessary if the div contain images

                myWindow.focus(); // necessary for IE >= 10
                myWindow.print();
                myWindow.close();
            };
        }
    </script>

<body>


<style type="text/css">
table{
    margin: 10px 0px 10px 30px;
    font-size: 20px;
    width: 90%;
    text-align: left;
    
  }
.u{
margin-left: 30px;
  border: 0px solid blue;
  font-size: 20px;
  width: 350px;
  float: left;
}
  input[type=button]{
      font-size :large;
  color:blue;
  font-weight:bold;
  cursor:pointer;
  border:3px solid gray;
  margin-left: 30em;
  background-color: lightgray;
  border-radius: 10px;
  height: auto;
  padding:3px 3px 3px 3px;
  }
  input[type=submit]{
      font-size :large;
  color:blue;
  font-weight:bold;
  cursor:pointer;
  border:3px solid gray;
  margin-left: 30em;
  background-color: lightgray;
  border-radius: 10px;
  height: auto;
  padding:3px 3px 3px 3px;
  }
</style>
<div class="cadre">
<div id="myDiv">
 
<table cellpadding="0" cellspacing="0" width="90%" style="margin-top: 10px;"> 
<?php 
  //session_start();
  //include("../scripts/connectionfile.php"); 
  require_once("connect.php");
$Numero=0001;
$vendeur=  $_SESSION['nom'].'&nbsp;'.$_SESSION['prenom'];
'  <!--<select name="choix" style="width:135px; height:22px;" >
    <option style="background-color:#c0c0c0;font-weight:bold;" value="0" >
    <option > Personnel</option>
     <option>Article</option>
      <option>Client</option>
         <option >Commande</option>
          <option >Livraison</option>
          <option >Suggestion</option>
           </option>    
            </select>-->


';
$umamebu='Usine des Matériels Métaliques Au Burundi';
$umamebu2='UMAMEBU';
$adresse='BUJUMBURA &#150;BURUNDI';
$mail='umamabu.bi@gmail.com';
$tel='+257 71 577 531-31 012 360';
$Nif_Usine='4001097551';
$RC_Usine='12547/18';
$compte='BIF:BBCI:500-056674-0155 OUVERT SOUS LE NOM DE UMAMEBU';

$Nif_Client='';
$RC_CLIENT='';


?>

    <?php
   if((isset($_GET['cli']))){
        $_SESSION['cl']=$_GET['cli'];
        $cli=$_SESSION['cl'];
        //echo $cli;
        }
    if(isset($_GET['idcom'])){
        //$cmd=$_GET['idcom'];
          $_SESSION['idcom']=$_GET['idcom'];
        $cmd=$_SESSION['idcom'];
        //echo $cmd;
        
  
 $re = $db->query("SELECT c.id_cl as id_cl, co.id_com as id_com,c.adress as adress,c.CNI as cni,c.tel as tel,c.nom_cl as nom,c.prenom_cl as prenom, arv.type as ty, co.type_paie as typ, co.num_trans as nt, p.prix_unit as pu, co.date_paie as dapaie,arv.categorie as cat, arv.dimension as dim, arv.prix_tot as pt from umamebu.article p, umamebu.client c, umamebu.commande co, umamebu.articlevendu arv where c.id_cl = co.id_cl and co.id_com = arv.id_com and arv.id_com = '$cmd'");
//$v=var_dump($re);
//echo $v;
      $fact=$re->fetch(); ?>

  <tr style=" font-weight: bold; background-color: lightgray;background-image: url('pmshoplogo1.png');"> 
    <?php 
    if ($cmd<10) {
   echo '<td style="border: 1px solid black; ">Facture&nbsp;N&#186;: <b style="color:blue;">'.date("j-n-").'00'.$cmd.''.date("-Y").'</b></strong> </td>';
    }elseif ($cmd>10) {
   echo '<td style="border: 1px solid black; ">Facture&nbsp;N&#186;: <b style="color:blue;">'.date("j-n-").'0'.$cmd.''.date("-Y").'</b></strong> </td>';
    }
    ?>
    <td style="border: 1px solid black; ">Nom Vendeur:&nbsp;<b style="color:blue;"><?php echo $vendeur; ?></b></td>
    <td colspan="2" style="border: 1px solid black; ">Date:&nbsp;<b  style="color:blue;"><?php echo date("j/n/Y G:i:s"); ?></b></td>
  </tr>
</table>
<table style="border: 1px solid black;width: 90%; background-color: #fff;" cellpadding="0" cellspacing="0">
  <tr style="border: 1px solid black; background-color: #fff; font-weight: bold; text-align: left; background-image: url('pmshoplogo1.png');">
   <td style="border: 1px solid black; text-align: center;text-align: center; " colspan="2"><div class="u">USINE DES MATERIAUX</div><div class="u"><img src="images/logoumamebu.png"></div><div class="u">METALIQUE AU BURUNDI</div> </td>
 </tr>
  

  <tr style="font-weight: bold;"> 
    <td style="border: 1px solid black; text-align: left; padding-left: 30px;background-color: #fff;background-image: url('pmshoplogo1.png');">
      Nom Client:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php echo(ucfirst($fact['nom']).'&nbsp;'.ucfirst($fact['prenom'])) ?><br/>
      NIF:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; <?php echo $Nif_Client; ?><br/>
       RC:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; <?php echo $RC_CLIENT; ?><br/>
      ASSUJETTI A LA TVA:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; OUI <input type="checkbox" name="">&nbsp;&nbsp;NON<input type="checkbox" name=""><br/>
      
    <td style="border: 1px solid black; text-align: left; padding-left: 30px;background-color: #fff;background-image: url('pmshoplogo1.png');  ">
      NIF:<?php echo $Nif_Usine; ?><br/>
      RC:<?php echo $RC_Usine; ?><br/>
      Compte:<?php echo $compte; ?></td></tr>
<!--  -->
</table>

<table style="border: 1px solid black; text-align: center; width: 90%;" cellpadding="0" cellspacing="0">   
  <tr style="border: 1px solid black; font-weight: bold;background-color: #999; background-image: url('pmshoplogo1.png'); "> 
    <td style="border: 1px solid black;">Quantite</td> 
    <td style="border: 1px solid black;">Type</td>
    <td style="border: 1px solid black;">Categorie</td>
    <td style="border: 1px solid black;">Dimension</td>
    <td style="border: 1px solid black;">Prix Unitaire</td> 
    <td style="border: 1px solid black;">Prix Total</td>
  </tr><?php

  $req = $db->query("SELECT c.id_cl as id_cl, co.id_com as id_com,c.adress as adress,c.CNI as cni,c.tel as tel,c.nom_cl as nom,c.prenom_cl as prenom, arv.type as ty, co.type_paie as typ, co.num_trans as nt, p.prix_unit as pu, co.date_paie as dapaie,arv.categorie as cat, arv.dimension as dim, arv.quantite_com as qta, arv.prix_tot as pt from umamebu.article p, umamebu.client c, umamebu.commande co, umamebu.articlevendu arv where c.id_cl = co.id_cl and co.id_com = arv.id_com and arv.id_com = '$cmd' GROUP BY arv.id_artv ORDER BY id_artv desc" );
  
   $re1 = $db->query("SELECT sum(arv.Prix_Tot )as somme from umamebu.client cl, umamebu.commande cd, umamebu.articlevendu arv where cl.id_cl = cd.id_cl and cd.id_com = arv.id_com and arv.id_com = '$cmd'");

    $fa=$re1->fetch();

foreach ($req as $fact ){
?>
  <tr style="border: 1px solid black; font-weight: bold;background-color: #fff; .background-image: url('pmshoplogo1.png'); " cellpadding="0" cellspacing="0"> 
    <td style="border: 1px solid black;"><?php echo ($fact['qta'])?></td>
    <td style="border: 1px solid black;"><?php echo ($fact['ty'])?></td>
    <td style="border: 1px solid black;"><?php echo ($fact['cat'])?></td>
    <td style="border: 1px solid black;"><?php echo ($fact['dim'])?></td>
    <td style="border: 1px solid black;"><?php echo ($fact['pu']).' '.'Fbu'?></td> 
    <td style="border: 1px solid black;"><?php echo ($fact['pt']).' '.'Fbu'?></td><?php } ?>
  </tr>

  <tr style="border: 1px solid black; font-weight: bold;background-image: url('pmshoplogo1.png');"> 
    <td style="border: 0px solid black;text-align: left;">Total Général</td>
    <td colspan="3" style="border: 0px solid black;text-align: left;"></td>
    <td style="border: 0px solid black; text-decoration: underline;font-size: 25px;font-weight: bold;"><?php echo $result=$fa['somme'] .' '.'Fbu' ?></td>
  </tr>
  <tr style="border: 1px solid black; font-weight: bold;background-image: url('pmshoplogo1.png');"> 
    <td style="border: 0px solid black;text-align: left;">T.V.A(5%)</td>
    <td colspan="3" style="border: 0px solid black;text-align: left;"></td>
    <td style="border: 0px solid black; text-decoration: none;font-size: 25px;font-weight: bold;"><?php
     echo $tva = (float)$result * 0.05 .' '.'Fbu'; ?></td>
  </tr>

   <?php } ?> 
</table>
</div>
<form method="post" action="">
 <input type="submit" name="fact" value="Imprimer Facture" onclick="PrintDiv('myDiv')" />
</form>
</div>
</body>
</html>
