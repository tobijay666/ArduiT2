<?php     

  session_start();

  include("database.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    if (!empty($_POST)) 
    {
        $Stat = $_POST['Stat'];
        $Id = $_POST['Id'];
        //Asia/Colombo
        date_default_timezone_set('Asia/Colombo');
        $timenow = date('H:i:s');
        $datenow = date('Y/m/d');

       // if (!empty($Stat)){
            $cont  = Database::connect();
            $sql = "UPDATE statusled SET Stat = '$Stat' WHERE ID = $Id";
            $sql2 = "Insert into output_logs(ID,Date,time,Stat) values ($Id,'$datenow','$timenow','$Stat')";
            mysqli_query($cont,$sql);
            mysqli_query($cont,$sql2);

            Database::disconnect();
            header("Location: ControlDevices.php");
       // }
    }
 
}

?>