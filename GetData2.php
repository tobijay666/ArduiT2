<?php
include 'database.php';

if (!empty($_POST)) {
  $id=$_POST["ID"];
  $cont = Database::connect();
  $sql = "SELECT * FROM statusled WHERE ID = '$id'";
  
  $squ = mysqli_query($cont,$sql);
  $data = mysqli_fetch_assoc($squ);
  Database::disconnect();
  
  echo $data['Stat'];
}  



?>