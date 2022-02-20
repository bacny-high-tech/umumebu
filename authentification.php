<!DOCTYPE html>
<html lang="en">
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

<?php
  session_start();
    include('php/connect1.php');
   if(isset($_POST['save'])){
  if($_POST['login']!="" and $_POST['pass']!="")//champs obligatoire

  { 
  $login=$_POST['login'];
  $pass=$_POST['pass'];
    $req="SELECT * FROM utilisateur WHERE login='$login' and password='$pass'";
  $res=mysql_query($req)or die(mysql_error());
  if($li=mysql_fetch_assoc($res)){
  
    $_SESSION['idu']=$li['id_util'];
    $_SESSION['nom']=$li['nom'];
    $_SESSION['prenom']=$li['prenom'];

    $_SESSION['NIV']=$li['niveau'];
    if($_SESSION['NIV']==0){
    header("location:php/accueil.php");
     }
    if($_SESSION['NIV']==1){
    header("location:php/accueil.php");
    }
    if($_SESSION['NIV']==2){
    header("location:php/accueil2.php");
    }
    if($_SESSION['NIV']==3){
    header("location:php/accueil.php");
    }
  }
  else{
    ?>  <SCRIPT LANGUAGE="Javascript">alert("Authentification invalide!");  </SCRIPT>   <?php
      }
    
  }
  else{
    ?>  <SCRIPT LANGUAGE="Javascript">alert("vous devez remplir tous les champs!"); </SCRIPT>   <?php
      }
    require_once("index.php");
  }
?>
