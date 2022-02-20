<?php 
  if (isset($_POST['act'])) 
  {
    $sep=',,';
    $donne='';
    $monFichier= 'fileTeste.txt';
    $qt=$_POST['qte'];
    $file=file_get_contents($monFichier); //print_r($file);
    $ext=explode("\n",trim($file)); 
    foreach ($ext as $key => $value) 
    {
       $lin=explode($sep,trim($value));
       foreach ($qt as $key1=> $value1) 
       {

      if ($key==$key1) 
      {
      $data=$lin[0].''.$sep.''.$lin[1].''.$sep.''.$lin[2].''.$sep.''.$lin[3].''.$sep.''.$value1.''.$sep.''.$lin[5].''.$sep.''.$sm=$lin[5]*$value1."\r\n";
            $donne.=$data;
         } 
       }
    }
 
    file_put_contents($monFichier,' ');
    file_put_contents($monFichier, $donne, FILE_APPEND);
     header('Location:panier.php');
  } ?>

<?php
if(isset($_GET['idcl'])){
  $idc=$_GET["idcl"];
  //echo $idc;
$_SESSION['idc']=$idc;
$idc=$_SESSION['idc'];}
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

 //eventuellement vider le panier
if (isset($_GET["vider"]))
{
 //session_unset();
file_put_contents('fileTeste.txt', '');
}
include("entete.php");
 include_once("connect.php");
 
  $reponse = $db->query('select * from umamebu.article order by id_prod');
?>
 
<!DOCTYPE html>
<html>
<header>
  <link rel="stylesheet" type="text/css" href="css/style.css"> 
  <style type="text/css">
    #n{width: 3.5em;}
  </style>
</header>
<body>
 
<!-- <h3>Mon panier</h3>
 --> 
<center>
<table style="font-size: 16px; font-family: serif;" border="1" cellspacing="0" cellpadding="10" bordercolor="#000" width="400px">
<tr bgcolor="#CCFFFF">
     <th>IDProduit</th> <th>Type</th><th>Catégorie</th><th>Dimension</th><th>Qté</th><th>PU</th><th>Prix Tot.</th><th>Action</th>
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
        ?>
  <tr>
    <td><?php echo $lin[0] ?></td>
    <td><?php echo $lin[1] ?></td>
    <td><?php echo $lin[2] ?></td>
    <td><?php echo $lin[3] ?></td>
    <td><?php 
    include_once("connect.php");
     $rep = $db->query("SELECT quantite from umamebu.article where id_prod='$id'");
    foreach($rep as $arto) 
      echo'<form name="form1" method="post" action="panier.php" enctype="application/x-www-form-urlencoded">
        <input type="number" name="qte[]" value="'.$lin[4].'" id=n min="1" max='.$arto['quantite'].' />';     
      ?>
 
    </td>
    <td><?php echo $lin[5] ?></td>
    <td><?php echo $lin[6] ?></td>
    <td bgcolor="#eee"><a href="?delete=<?php echo $ke ?>"><img src="images/del.png"/></a></td>
     <?php } ?>
  </tr> 
  <tr style="background-color: lightgray;">
    <td colspan="1"><b>Totol</b></td>
    <td colspan="1"></td>
    <td colspan="2" style="text-align: center;"></td><td ><input type="submit" name="act" value="Actualiser"></td><td ></td><td colspan="2">
      <?php 
    $_SESSION['somme']=0;
       $_SESSION['somme'] = $somme;
      echo '<b>'.$_SESSION['somme'].'&nbsp; Fbu </b>'; ?>
    </td>
  </form>
  </tr>
  <tr>
    <?php  
     
    echo '<td><a href="vente.php" style="color: blue; text-decoration: none;"><img src="images/acheter.png" title="Continuer à acheter les articles" /></a></td>
    <td colspan="6">
    <a href="factProv.php" style="color: blue; text-decoration: none;"><img src="images/commander.png" title="Commander les articles contenant le panier" /></a>';

  ?>
  </td><td><a href="panier.php?vider=1" style="color: blue; text-decoration: none;"><img src="images/viderP.png" title="Vider le panier" /></a></td>
  </tr>
  </table>  
  </center>
   <?php
    }
include("pied.php");
    ?>