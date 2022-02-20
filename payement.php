<?php 
//session_start();
include('entete.php');

  include_once 'connect.php';
  ?>

<!DOCTYPE html>
<html>
<head>
<title>umamebu </title>
<link rel="stylesheet" type="text/css" href="css/style.css"> 
  <style type="text/css">
    div{
  margin-bottom: 10px;
  position: relative;
}

input[type="number"],[type="tel"],[type="text"] {
  width: 250px;
  height: 30px;
}

input + span {
  padding-right: 30px;
  /*float: left;*/
}

input:invalid+span:after{
  position: absolute; content: '✖';
  margin-left: 250px;
  color: #8b0000;
  font-size: 30px;
  font-weight: bold;
  border: 2px solid #ccc;
  border-radius: 50%; 
  background-color: #ccc;
}

input:valid+span:after {
  position: absolute; content: '✓';
  margin-left: 250px;
  color: #009000;
  font-size: 30px;
  font-weight: bold;
  border: 2px solid #ccc;
  border-radius: 50%; 
  background-color: #ccc;
}
input[type="submit"]{background-color:#85a9f8;font-family:"FontAwesome";font-weight:bold;font-size: 22px;}
  </style>
</head>
 <body>
   	<center>
      <div class="scrollable">
   		<div class="cadre">
   		<div class="left">
   			<div id=fom>
				<form method="POST" action="enregPaiemaCommande.php" enctype="multipart/form-data">
				<table style="width:50%; margin:0px 0px 15px 70px; float: left;">
					<tr>
  <?php
if (isset($_GET['idmod']))
{
$_SESSION['ida']=$_GET['idmod']; 

$_SESSION['id']=$_SESSION['ida'];
$j=$_SESSION['id'];
$sel = $db->query("select * from umamebu.modepayement where modeID='$j'");
foreach ($sel as  $vaz)

if ($vaz) { 
$nom_mode=$vaz['nom_mode'];
  if ($nom_mode=='ECOCASH') {
  
    $code=$vaz['code_Agent'];?>
    <td><b style="font-size: 25px;font-family:'FontAwesome';font-weight:bold;">Mode utilisé:</b></td> <td> <?php echo '<b style="font-size: 35px; color: blue;font-family:serif;"> '.$nom_mode.'</b>'; ?>
    <input type="hidden" name="mode" value="<?php echo $nom_mode; ?>" /></td>
      </tr>
    <tr>
    <td><b style="font-size: 25px;font-family:'FontAwesome';font-weight:bold;">Num. Trans.:</b></td>
      <td>
    <input type="text" name="numtra"  value="<?php if(isset($_POST['numtra'])){echo $_POST['numtra']; } ?>" placeholder="Taper le numero de transaction" /></td>
    </tr>
    <tr>
      <td><b style="font-size: 25px;font-family:'FontAwesome';font-weight:bold;">Montant Payé:</b></td>
      <td>
    <input type="number" name="montant" min="1000" value="<?php if(isset($_SESSION['somme'])){echo $_SESSION['somme']; } ?>" /></td>
    </tr>

    <tr><td></td><td>
    <input type=submit name="valide" value="Valider"></td></tr>
    <tr><td colspan="2"><?php  if(isset($echosup)){ echo $echosup;} if(isset($echo)){echo $echo;} ?></td></tr>
				</table>

		</div>
		</div>
       <?php 
     }elseif ($nom_mode=='LUMICASH') {
      //$nom_mode=$nom;
           $code=$vaz['code_Agent'];?>
        <table style="width:50%; margin:0px 0px 15px 70px; float: left;">
        <tr>    
    <td><b style="font-size: 25px;font-family:'FontAwesome';font-weight:bold;">Mode utilisé:</b></td> <td> <?php echo '<b style="font-size: 35px; color: blue;font-family:serif;"> '.$nom_mode.'</b>'; ?>
    <input type="hidden" name="mode" value="<?php echo $nom_mode; ?>" /></td>
  </tr>
     <tr>
      <td><b style="font-size: 25px;font-family:'FontAwesome';font-weight:bold;">Num. Trans.:</b></td>
      <td>
    <input type="text" name="numtra"  value="<?php if(isset($_POST['numtra'])){echo $_POST['numtra']; } ?>" placeholder="Taper le numero de transaction" /></td>
    </tr>
    <tr>
      <td><b style="font-size: 25px;font-family:'FontAwesome';font-weight:bold;">Montant Payé:</b></td>
      <td>
    <input type="number" name="montant" min="1000" value="<?php if(isset($_SESSION['somme'])){echo $_SESSION['somme']; } ?>" /></td>
    </tr>

    <tr><td></td><td>
    <input type=submit name="valide" value="Valider"></td></tr>
    <tr><td colspan="2"><?php  if(isset($echo)){ echo $echo;} ?></td></tr>
        </table>

    </div>
    </div>
    <?php
     } elseif ($nom_mode=='CASH') {
    //$code='Eric'; 
    ?>
    <table style="width:50%; margin:0px 0px 15px 70px; float: left;">
    <tr>
    <td><b style="font-size: 25px;font-family:'FontAwesome';font-weight:bold;">Mode utilisé:</b></td> <td> <?php echo '<b style="font-size: 35px; color: blue;font-family:serif;"> '.$nom_mode.'</b>'; ?>
    <input type="hidden" name="mode" value="<?php echo $nom_mode; ?>" /></td>
      </tr>
    <tr>
      <td><b style="font-size: 25px;font-family:'FontAwesome';font-weight:bold;">Num. Trans.:</b></td>
      <td>
    <input type="text" name="numtra"  value="<?php if(isset($_POST['numtra'])){echo $_POST['numtra']; } ?>" disabled="disabled" placeholder="Taper le numero de transaction"/></td>
    </tr>
    <tr>
      <td><b style="font-size: 25px;font-family:'FontAwesome';font-weight:bold;">Montant Payé:</b></td>
      <td>
    <input type="number" name="montant" min="1000" value="<?php if(isset($_SESSION['somme'])){echo $_SESSION['somme']; } ?>" /></td>
    </tr>

    <tr><td></td><td>
    <input type=submit name="valide" value="Valider"></td></tr>
    <tr><td colspan="2"><?php  if(isset($echo)){ echo $echo;} ?></td></tr>
        </table>

    </div>
    </div>
    <?php
     }elseif ($nom_mode=='BORDEREAU') {
    //$code='Noiraud';
    ?>
        <table style="width:50%; margin:0px 0px 15px 70px; float: left;">
        <tr>
  <td><b style="font-size: 25px;font-family:'FontAwesome';font-weight:bold;">Mode utilisé:</b></td> <td> <?php echo '<b style="font-size: 35px; color: blue;font-family:serif;"> '.$nom_mode.'</b>'; ?>
  <input type="hidden" name="mode" value="<?php echo $nom_mode; ?>" /></td></tr>

  <tr>
      <td><b style="font-size: 25px;font-family:'FontAwesome';font-weight:bold;">Num. Trans.:</b></td>
      <td>
    <input type="text" name="numtra"  value="<?php if(isset($_POST['numtra'])){echo $_POST['numtra']; } ?>" placeholder="Taper le numero de transaction"/></td>
    </tr>

    <tr>
      <td><b style="font-size: 25px;font-family:'FontAwesome';font-weight:bold;">Montant Payé:</b></td>
      <td>
    <input type="number" name="montant" min="1000" value="<?php if(isset($_SESSION['somme'])){echo $_SESSION['somme']; } ?>" /></td>
    </tr>
    <tr><td></td><td>
    <input type=submit name="valide" value="Valider"></td></tr>
    <tr><td colspan="2"><?php  if(isset($echo)){ echo $echo;} ?></td></tr>
    </table>

    </form>
    </div>
    </div>
    <?php
     }else{ 

      echo "Pas de Mode Payement Disponible";}
   }
   }
     ?>
      
		</div>
	</center>

  <?php

    include("pied.php");
  ?>

</body>
</html>