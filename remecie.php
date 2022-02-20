<?php
//session_start();
require'entete.php';
//afficher le contenu de la session

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
$somme+=$lin[5];
$quantite+=$lin[4];
      // $delai=1; 
      //  $url='header.php';
      //  header("Refresh: $delai;url=$url");

}
}
?>

<head>
  <title>Remerciement</title>
</head>
<body id="top">




<style type="text/css">
  table{
    margin: 10px 0px 10px 30px;
    font-size: 20px;
  }
  a{
    color:black;
  }

</style>

  <table cellspacing="0" cellpadding="0">
  
      <tr>
      <td colspan="2" > Merci</td></tr>
        <?php
require_once("connect.php");
      
 ?>
  
  </table>
          <?php
 //include("pied.php");       
 ?>
</body>
</html>