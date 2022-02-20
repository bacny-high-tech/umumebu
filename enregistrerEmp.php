<?php
  
  require_once("connect.php");

  if(isset($_POST['ajout'])){
           if ($_POST['nom']!="" AND $_POST['prenom']!="" AND $_POST['datenaiss']!="" AND $_POST['tel']!="" AND $_POST['adresse']!="" AND $_POST['niveau']!="" AND $_POST['fonction']!="" AND $_POST['cni']!="")
              {
          	    $nom = $_POST['nom'];
          	    $prenom = $_POST['prenom'];
                $date_naiss = $_POST['datenaiss'];
                $tel = $_POST['tel'];
                $adress = $_POST['adresse'];
                $niveau_etude = $_POST['niveau'];
                $fonction = $_POST['fonction'];
                $CNI = $_POST['cni'];

        $req=$db->query("INSERT INTO `employe`(`id_empl`,`nom`,`prenom`,`date_naiss`,`tel`,`adress`,`niveau_etude`,`fonction`,`CNI`)VALUES('','$nom','$prenom','$date_naiss','$tel','$adress','$niveau_etude','$fonction','$CNI')");

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
    require_once("employe.php");
  }
?>