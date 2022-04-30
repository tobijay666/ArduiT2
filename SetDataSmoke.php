<?php
  include 'database.php';
  
  if (!empty($_POST)) {
    $id=$_POST["ID"];
    $stat = $_POST["Stat"];

    $cont = Database::connect();
    

    $sql = "UPDATE statusled SET Stat='$stat' WHERE ID='$id' ";
    
    $squ = mysqli_query($cont,$sql);
    //$data = mysqli_fetch_assoc($squ);
    Database::disconnect();
    
    //echo $stat;
  }
?>