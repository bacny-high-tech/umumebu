<?php
  session_start();
    // include('connect.php');
    require_once 'connect.php';
   if(isset($_POST['submit'])){
  if($_POST['username']!="" and $_POST['password']!="")//champs obligatoire

  { 
  $login=$_POST['username'];
  $pass=$_POST['password'];

  $requete = $db->query("SELECT e.nom as nom,e.prenom as prenom,e.fonction as fonction,u.login as login,u.password as password,u.niveau as niveau FROM umamebu.employe e,umamebu.utilisateur u WHERE e.id_empl=u.id_util and login='$login' and password='$pass'");
  foreach ($requete as  $li)

  if($li){
  
    $_SESSION['idu']=$li['id_util'];
    $_SESSION['nom']=$li['nom'];
    $_SESSION['prenom']=$li['prenom'];
    $_SESSION['NIV']=$li['niveau'];
     $_SESSION['fonction']=strtoupper($li['fonction']);

    $_SESSION['NIV']=$li['niveau'];
    if($_SESSION['NIV']==0){
    header("location:index2.php");
     }
    if($_SESSION['NIV']==1){
    header("location:index2.php");
    }
    if($_SESSION['NIV']==2){
    header("location:index2.php");
    }
  }
  else{

    /*echo "Authentification invalide!";*/
    ?>  <SCRIPT LANGUAGE="Javascript">alert("Authentification invalide!");  </SCRIPT>   <?php
      }
    
  }
  else{
    /*echo "vous devez remplir tous les champs!";*/
    ?>  <SCRIPT LANGUAGE="Javascript">alert("vous devez remplir tous les champs!"); </SCRIPT>   <?php
      }
    require_once("index.php");
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title> UMAMEBU</title>
<link rel="stylesheet" type="text/css" href="css/mystyle_login.css">
<style>
#content {
height: auto;
border: 1px solid #a7efd8;
margin-top: 70px;
background-color: #a7efd8;
}
#main{
height: auto;
border: 0px solid black;
width: 100%;
background-color: #a7efd8;
}
</style>
</head>
<body bgcolor="#a7efd8">
	<center>
<div id="content">
<!-- <div id="header">
<h1><img src="images/logo.png"> UMAMEBU </h1>
<p> Usine des Matériels Métaliques Au Burundi </p>
</div> -->
<div id="main">

  <section class="container">
  
     <div class="login">
	 <img src="images/publi.jpg">
      <h1 align="Center"> Bienvenue sur votre application </h1>
      <h1 align="Center"> Connectez-vous Ici </h1>
	 
      <form method="post" action="index.php"  enctype="multipart/form-data">
		 <p  align="Center"><input type="text" name="username" value="" placeholder="Login"></p>
        <p  align="Center"><input type="password" name="password" value="" placeholder="Mot de passe"></p>
        <p class="submit"  align="Center"><input type="submit" align="Center" name="submit" value="Connexion"></p>
      </form>
    </div>
    </section>
</div>
<!-- <div id="footer" align="Center"> Ntahangwa. Avenue d'Uvira </div> -->
</div>
</center>
</body>
</html>

