
<?php
//session_start();
 include("entete.php");

if (isset($_GET['delete'])) 
    {
      $cle=$_GET['delete'];
        //echo $cle;
       $filep=file_get_contents("fileTeste.txt");

        if (trim($filep)!='') 
        {
        
         $ptr = fopen("fileTeste.txt", "r");
       $contenu = fread($ptr, filesize("fileTeste.txt"));
        
       /* On a plus besoin du pointeur */
       fclose($ptr);
     
       $contenu = explode(PHP_EOL, $contenu); /* PHP_EOL contient le saut à la ligne utilisé sur le serveur (\n linux, \r\n windows ou \r Macintosh */
        
       unset($contenu[$cle]); /* On supprime la ligne x par exemple */
       $contenu = array_values($contenu); /* Ré-indexe l'array */
        
       /* Puis on reconstruit le tout et on l'écrit */
       $contenu = implode(PHP_EOL, $contenu);
       $ptr = fopen("fileTeste.txt", "w");
       fwrite($ptr, $contenu);

       $delai=1; 
       $url='panier.php';
       header("Refresh: $delai;url=$url");
     }
    }
    //include_once 'header.php';
 //Start the session
//session_start();
 //eventuellement vider le panier
if (isset($_GET["vider"]))
{
 //session_unset();
file_put_contents('fileTeste.txt', '');
}
 include_once("connect.php");
  $reponse = $db->query('select * from umamebu.article order by id_prod');
?>
 
<!DOCTYPE html>
<html>
<header>
  <title>umamebu</title>
  <style type="text/css">
 select{
  border:none;
  ;background:#CEE9F1;
  background:#fff;
  border-bottom:2px solid #009DC5;
  padding:5px;
}
input[type=submit]{
  .border:none;
  background:#99d4f6;
  .background:#fff;
  .border:1px solid #009DC5;
  padding:6px;
  width: 110px;
  height: 40px;
  font-weight: bold;
  font-size: large;
  .background-image: url(images/commander.png);
  .background-repeat: no-repeat;
}
    #n{width: 3.5em;}
    table{
      border: 1px solid #009DC5;
      margin: 10px;
    }
  </style>
</header>
<body>
<!-- <h3>Mon panier</h3> --> 
<center>

<table style="font-size: 20px; font-family: serif;" border="0" cellspacing="0" cellpadding="10" bordercolor="#000" width="400px">
<tr bgcolor="#CCFFFF">
  <th>Ref. Produit</th><th>Type</th><th>Categorie</th><th>Dimension</th><th>Quantite</th><th>PU</th><th>Tot HTVA</th><th>TVA(5%)</th>
</tr>
<?php
//afficher le contenu de la session
    $fils='fileTeste.txt';
    $sep=',,';
    $somme=0;
    $text=file_get_contents($fils);
    $cont=$text; 

    if(trim($text)!='')
     {  
      $mrc=''; $pu=''; $qt=''; $pt=''; $id='';
      $ext=explode("\n",trim($cont)); 
       //insert ligne
      foreach($ext as $ke=>$val)
        {
          $lin=explode($sep,trim($val));
          $somme+=$lin[6];
          $id=$lin[0];
          // $mrc=$lin[1]; $pu=$lin[3]; $qt=$lin[4]; $pt=$lin[5];
?>
  <tr>
    <td><?php echo $lin[0] ?></td>
    <td><?php echo $lin[1] ?></td>
    <td><?php echo $lin[2] ?></td>
    <td><?php echo $lin[3] ?></td>
    <td><?php echo $lin[4] ?></td>
    <td><?php echo $lin[5] ?></td>
    <td><?php echo $lin[6] ?></td>
  <td bgcolor="#eee"><?php echo ($lin[6]*5)/100; ?></td> 
   <?php } ?>
  </tr> 
  <tr style="background-color: lightgray;">
    <td colspan="1"></td>
    <td colspan="1"></td>
    <td colspan="2" style="text-align: left;"><b>TOTAL HTVA</b></td><td colspan="4">
      <?php 
      
    $_SESSION['somme']=0;
       $_SESSION['somme'] = $somme;
      echo '<b>'.$_SESSION['somme'].'&nbsp; Fbu </b>';
      
      $tva=($_SESSION['somme']*5)/100; ?>
    </td>
    <td></td>
  </tr>

    <tr style="background-color: lightgray;font-weight: bold;">
    <td colspan="1"></td>
    <td colspan="1"></td>
    <td colspan="2"><b>TVA</b></td><td colspan="4">
      <?php 
      echo'</b>'. $tva .'&nbsp; Fbu </b>'; ?>
    </td>
    <td></td>
  </tr>
    <tr style="background-color: lightgray;">
    <td colspan="1"></td>
    <td colspan="1"></td>
    <td colspan="2"><b>TOTAL</b></td><td colspan="4">
      <?php 
      
    $_SESSION['somme']=0;

       $_SESSION['somme'] = $somme;
       $htva=$_SESSION['somme'];
       $Tot=$htva +(($_SESSION['somme']*20)/100);
      echo '<b>'.$Tot .'&nbsp; Fbu </b>';
      
       ?>
    </td>
    <td> </td>
  </tr>
 
  </table> 
    <?php
$reponse = $db->query("select * from umamebu.client");

   ?>
  <form action="retourPayema.php" method="POST" placeholder="Séléctionner le Client" enctype="multipart">
    
    <select name="client" >
    <option selected> </option>
     <?php  
     foreach($reponse as $cl) 
      {
      
      echo '<option value="'.$cl['id_cl'].'">'.$cl['id_cl'].'&nbsp;'.$cl['nom_cl'].'&nbsp;'.$cl['prenom_cl'].' </option>';
    }
    echo '</select>';

        ?>
        <p>
          <input type="submit" name="Valide" value="Valider"/>
        </p>
  </form>
  </center> <?php } ?>