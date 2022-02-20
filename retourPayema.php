   <?php

if (isset($_POST['Valide'])) {
  $client=$_POST['client'];
  
}
header('Location:typayement.php?idc='.$client.'');
    ?>