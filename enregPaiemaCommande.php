<?php
//session_start();
require'entete.php';
//require_once("connect.php");
  include_once 'connect.php';


if (isset($_SESSION['idc'])) {
      $idc=$_SESSION['idc'];
      echo $idc;
if(isset($_POST['valide']))
  {
     $typaie=$_POST['mode'];
     $numtra=$_POST['numtra'];
     $sommepaie = $_POST['montant'];
     $clientID = $idc;
     $etat = 1;

$reqtt=$db->query("INSERT INTO umamebu.commande(id_cl, date_paie, type_paie, num_trans, montant,etat) VALUES ('$clientID',now(),'$typaie','$numtra','$sommepaie','$etat')");
      $idcomde=$db->lastInsertId();
     $d=var_dump($idcomde);
     echo $d;
          $sep=',,';
          $somme=0;
          $text=file_get_contents('fileTeste.txt');
          $cont=$text; 
        if(trim($text)!='')
          {  
          $ext=explode("\n",trim($cont)); 
            // insert ligne
           foreach($ext as $ke=>$val)
              {
            $lin=explode($sep,trim($val));
            $id_prod= $lin[0];
            $type = $lin[1];
            $categ = $lin[2];
            $dimension = $lin[3];
            $qte = $lin[4];
            $pu = $lin[5];
            $somme=$_SESSION['somme'];
             $pt = $lin[5]*$qte;
             $eta = 1;

$req=$db->query("INSERT INTO umamebu.articlevendu(id_com, id_prod, date_com, type, quantite_com, categorie, dimension, prix_tot, etat) VALUES ('$idcomde','$id_prod',now(),'$type','$qte','$categ','$dimension','$pt','$eta')");
      $bb=var_dump($req);
      echo $bb;
          if (isset($req))
             { 
            echo "Commande Enregistré avec succés!";
           header("location:vente.php");
             } 
         else{ 
          echo "Commande non enregistré";
          } 
        }
     }     
        
      $sele = $db->query("SELECT `id_com` FROM `articlevendu`");
       while($comdevend=$sele->fetch()){ 
          //$idcomde="";
          $idcomd=$comdevend['id_com'];
         if ($idcomde==$idcomd) {
            file_put_contents('fileTeste.txt', '');
           }
         } 
     
   // }//Fin if $_post                    
  }//fin isset save

}//fin session
?>
<b>Bonjour</b>