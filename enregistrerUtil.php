<?php
  
  require_once("connect.php");

  if(isset($_POST['ajout'])){
           if ($_POST['utilisateur']!="" AND $_POST['login']!="" AND $_POST['password']!="" AND $_POST['niveau']!="")
              {
          	    $id = $_POST['utilisateur'];
                $log = $_POST['login'];
          	    $pass = $_POST['password'];
                $niveau = $_POST['niveau'];

        $req=$db->query("INSERT INTO `utilisateur`(`id_util`, `login`, `password`, `niveau`)VALUES('$id','$log','$pass','$niveau')");

           if($req) {
               ?> <SCRIPT LANGUAGE="Javascript">alert("L\'ajout  est effectué avec succés!");</SCRIPT> <?php
                    }
                     else{
               ?> <SCRIPT LANGUAGE="Javascript">alert("Echec");</SCRIPT> <?php
                         }
              }
              else{
        ?> <SCRIPT LANGUAGE="Javascript">alert("veuillez remplir tous les champs");</SCRIPT> <?php
    }
    require_once("utilisateur.php");
  }
?>