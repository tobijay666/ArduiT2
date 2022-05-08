<?php
include 'database.php';

if (!empty($_POST)) {
  $id=$_POST["ID"];
  $cont = Database::connect();
  $sqry3 = "SELECT * FROM activation_log WHERE ID =$id";
  $squ3 = mysqli_query($cont,$sqry3);
  while( $row = mysqli_fetch_assoc($squ3) ){
  $stat3 = $row['Stat'];
  $time = $row['Time'];
  }
  $sqry4 = "SELECT * FROM statusled WHERE ID =$id";
  $squ4 = mysqli_query($cont,$sqry4);
  while( $row = mysqli_fetch_assoc($squ4) ){
  $stat4 = $row['Stat'];
  }
  Database::disconnect();
    if($stat4 == "Off")
    {    if ($stat3 == "Active"){
            date_default_timezone_set('Asia/Colombo');
            $timenow = date('H:i:s');
            if($timenow==$time){
                echo "On";
            }
            else{   
                echo"Off";
            }
        }
    }
    else{   
        echo"";
    }
    
}  



?>