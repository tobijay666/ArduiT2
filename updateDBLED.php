<?php     

  session_start();

  include("database.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    if (!empty($_POST)) 
    {
        $Stat = $_POST['Stat'];
        
        // update data
        $cont  = Database::connect();
        $sql = "UPDATE statusled SET Stat = '$Stat' WHERE ID = 0";
        mysqli_query($cont,$sql);
        Database::disconnect();
        header("Location: Main.php");
    }
  }

?>