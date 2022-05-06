<?php     

  session_start();

  include("database.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    if (!empty($_POST)) 
    {
        $Stat = $_POST['Stat'];
        $Id = $_POST['Id'];
       // if (!empty($Stat)){
            $cont  = Database::connect();
            $sql = "UPDATE statusled SET Stat = '$Stat' WHERE ID = $Id";
            mysqli_query($cont,$sql);
            Database::disconnect();
            header("Location: ControlDevices.php");
       // }
    }
 
}

?>