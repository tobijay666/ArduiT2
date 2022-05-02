<?php
  include 'database.php';
  
  if (!empty($_POST)) {
    $id=$_POST["ID"];
    $stat = $_POST["Stat"];

    $cont = Database::connect();

    $distance = (int) $stat;

    if ($distance <= 100){
      $state = "Triggered";
    }

    else if ($distance > 100){
      $state = "Inactive";
    }

    $sql2 = "UPDATE motionsensor SET Distance = $distance"; 
    $sql = "UPDATE statusled SET Stat='$state' WHERE ID='$id' ";
    
    $squ = mysqli_query($cont,$sql);
    //$data = mysqli_fetch_assoc($squ);
    Database::disconnect();
    
    echo $stat;
  }
?>