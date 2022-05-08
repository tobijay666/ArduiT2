<?php
            include 'database.php';
            $con = Database::connect();
            
            //checks a given time is between a certain period
            function isBetween($from, $till, $input) {
                $fr = DateTime::createFromFormat('!H:i:s', $from);
                $ti = DateTime::createFromFormat('!H:i:s', $till);
                $i = DateTime::createFromFormat('!H:i:s', $input);
                if ($fr > $ti) $ti->modify('+1 day');
                return ($fr <= $i && $i <= $ti) || ($fr <= $i->modify('+1 day') && $i <= $ti);
            }

            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
              if (!empty($_POST)) 
              {
                  $Stat = $_POST['Stat'];
                  $time = $_POST['time'];
                  $Id = $_POST['Id'];

                  
          
                 // if (!empty($Stat)){
                      $cont  = Database::connect();
                      $sql = "UPDATE activation_log SET Stat = '$Stat', Time = '$time' WHERE ID = $Id";

                      mysqli_query($cont,$sql);

          
                      Database::disconnect();
                      header("Location: Stat.php");
                 // }
              }
           
          }


            ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Welcome to ELECTRA</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/Electra2.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap1.css" />
    <link href="assets/css/responsive.css" rel="stylesheet" />

    <link href="assets/css/style1.css" rel="stylesheet" />


    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <!-- <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div> -->
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">ELECTRA<em> <</em>><em> IOT</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="ControlDevices.php">Control Devices</a></li>
                            <li class="scroll-to-section"><a href="SensorDet.php" >Sensor Details  </a></li>
                            <li class="scroll-to-section"><a href="Stat.php" class="active">Auto Control  </a></li>
                            <li></li>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    
    <section class="ftco-section">
		<div class="container" >
			
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-dark">
						    <tr>
						      <th width='200px'>System</th>
                              <th width='200px'>Period</th>
                              <th width='250px'>Activity</th>
                              <th width='200px'>Time</th>
						      <th width='200px'>Status</th>
						      


						    </tr>
						  </thead>
						  <tbody>
                              
                                        <tr class='alert' role='alert'>
                                        <th scope='row'>Home Lights System</th>
                                        <td>Morning</td>
                                        <td>Auto-Deactivation</td>
                                        <td>
                                        <?php
                                        
                                        $sqry = "SELECT Time FROM output_logs WHERE ID = '0' AND Stat = 'Off' ORDER BY Date DESC Limit 14";
                                          
                                        if(!($squ= mysqli_query($con,$sqry))){
                                            echo"Data retrival failed";
                                        }
                                        $array = array();
                                        $index = 0;
                                        while( $row = mysqli_fetch_assoc($squ) ){
                                            // $temp = $row;
                                           // print_r( $row);
                                            $array[$index] = $row['Time'];
                                            $index++;
                                        }
                                        //echo count($array) ;
                                        //print_r( $array);
                                        $array1 = array();
                                        $index1 = 0;
                                        
                                        while ($index > 0){
                                            $index--;
                                            if(!(isBetween("06:00:00",$array[$index], "09:00:00"))){
                                                $array1[$index1] = $array[$index]  ;
                                                $index1 ++;
                                            }
                                            
                                        }
                                        
                                        
                                        
                                        //Calculating the most optimum time based of the results
                                        $avg = date('H:i:s', array_sum(array_map('strtotime', $array1)) / count($array1));
                                        echo "$avg";
                                        
                                        $sqry2 = $sql = "SELECT Stat FROM activation_log WHERE ID =0";
                                        $squ2 = mysqli_query($con,$sqry2);
                                        while( $row = mysqli_fetch_assoc($squ2) ){
                                            $stat2 = $row['Stat'];
                                        }
                                        if ($stat2 == "Deactive"){

                                        
                                    echo"
                                        </td>
                                        
                                        <td width='100px'>
                                            
        
                                        <div class='main-button scroll-to-section'>
                                        <form action='Stat.php' method='POST'>
                                        <input type='hidden' name='Id' value='0' >
                                        <input type='hidden' name='time' value='$avg' >
                                        <input type='hidden' name='Stat' value='Active' >
                                            <input type='Submit' value='Activate'>
                                            </form>
                                            </div>";
                                        
                                        }

                                        elseif ($stat2 == "Active"){
                                            echo"
                                        </td>
                                        
                                        <td width='100px'>
                                            
        
                                        <div class='main-button scroll-to-section'>
                                        <form action='Stat.php' method='POST'>
                                        <input type='hidden' name='Id' value='0' >
                                        <input type='hidden' name='time' value='$avg' >
                                        <input type='hidden' name='Stat' value='Deactive' >
                                            <input type='Submit' value='Deactivate  '>
                                            </form>
                                            </div>";
                                        }
                                            ?>
                                        
                                    </td>
                                        
        
                                        
                                    </tr>



                                    <tr class='alert' role='alert'>
                                        <th scope='row'>Home Lock System</th>
                                        <td>Morning</td>
                                        <td>Auto-Activation</td>
                                        <td>
                                        <?php
                                        
                                        $sqry = "SELECT Time FROM output_logs WHERE ID = '1' AND Stat = 'On' ORDER BY Date DESC Limit 14";
                                          
                                        if(!($squ= mysqli_query($con,$sqry))){
                                            echo"Data retrival failed";
                                        }
                                        $array = array();
                                        $index = 0;
                                        while( $row = mysqli_fetch_assoc($squ) ){
                                            // $temp = $row;
                                           // print_r( $row);
                                            $array[$index] = $row['Time'];
                                            $index++;
                                        }
                                        //echo count($array) ;
                                        //print_r( $array);
                                        $array1 = array();
                                        $index1 = 0;
                                        
                                        while ($index > 0){
                                            $index--;
                                            if(!(isBetween("06:30:00",$array[$index], "09:30:00"))){
                                                $array1[$index1] = $array[$index]  ;
                                                $index1 ++;
                                            }
                                            
                                        }
                                        
                                        
                                        
                                        //Calculating the most optimum time based of the results
                                        $avg = date('H:i:s', array_sum(array_map('strtotime', $array1)) / count($array1));
                                        echo "$avg";
                                     
                                        $sqry3 = $sql = "SELECT Stat FROM activation_log WHERE ID =1";
                                        $squ3 = mysqli_query($con,$sqry3);
                                        while( $row = mysqli_fetch_assoc($squ3) ){
                                            $stat3 = $row['Stat'];
                                        }
                                        if ($stat3 == "Deactive"){

                                        
                                    echo"
                                        </td>
                                        
                                        <td width='100px'>
                                            
        
                                        <div class='main-button scroll-to-section'>
                                        <form action='Stat.php' method='POST'>
                                        <input type='hidden' name='Id' value='1' >
                                        <input type='hidden' name='time' value='$avg' >
                                        <input type='hidden' name='Stat' value='Active' >
                                            <input type='Submit' value='Activate'>
                                            </form>
                                            </div>";
                                        
                                        }

                                        else if ($stat3 == "Active"){
                                            echo"
                                        </td>
                                        
                                        <td width='100px'>
                                            
        
                                        <div class='main-button scroll-to-section'>
                                        <form action='Stat.php' method='POST'>
                                        <input type='hidden' name='Id' value='1' >
                                        <input type='hidden' name='time' value='$avg' >
                                        <input type='hidden' name='Stat' value='Deactive' >
                                            <input type='Submit' value='Deactivate'>
                                            </form>
                                            </div>";
                                        }
                                        ?>
                                    
                                </td>
                                        
        
                                        
                                    </tr>
                                    
                                
						    
						    
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

<br>
<br>

    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container" style="margin-top: 200px;">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; 2022 Electra Corp.
                    
                    - Designed by <a rel="nofollow" href="https://electra-bravo.tech/" class="tm-text-link" target="_parent">Team Electra</a></p>
                    
                    
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/mixitup.js"></script> 
    <script src="assets/js/accordions.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

  </body>
</html>