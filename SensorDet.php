<?php
 header("Refresh: 5 ");
            include 'database.php';
            $con = Database::connect();

            




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
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
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
                            <li class="scroll-to-section"><a href="ControlDevices.php" >Control Devices</a></li>
                            <li class="scroll-to-section"><a href="SensorDet.php" class="active">Sensor Details  </a></li>
                            <li class="scroll-to-section"><a href="Stat.php" >Auto Control  </a></li>
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

    
<!-- ***** Testimonials Starts ***** -->
<section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Sensor <em>Details</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                    </div>
                </div>
            </div>
            <?php
                    $sqry2="SELECT * FROM motionsensor where ID = 1";

                    if(!($squ2= mysqli_query($con,$sqry2))){
                        echo"Data retrival failed";
                    }
                    while( $row2 = mysqli_fetch_assoc($squ2) ){
                        $stat2 = $row2['Distance'];
                }
                //getting the current range of the motion sensor.
                $dis = (int) $stat2;

                //calculating the average range and generating the percentage of the result.
                $dis = ($dis/400)*100;

                $sqry="SELECT * FROM statusled where ID = 3 ";

                if(!($squ= mysqli_query($con,$sqry))){
                    echo"Data retrival failed";
                }
                while( $row = mysqli_fetch_assoc($squ) ){
                    $stat3 = $row['Stat'];}
                
                $sqry3="SELECT * FROM statusled where ID = 4 ";

                if(!($squ1= mysqli_query($con,$sqry3))){
                    echo"Data retrival failed";
                }
                while( $row3 = mysqli_fetch_assoc($squ1) ){
                    $stat4 = $row3['Stat'];}
                    //getting Temperature
                    $val1 = (int) $stat3;
                    //getting Smoke detector details
                    $val2 = (int) $stat4;

                    //Calculating the average value and the truth factor of a fire 
                    //outbreak. Calculating the precentage of the possibility of a outbreak.
                    $smk = (($val1/250)*100 + ($val2/50)*100)/2;


            echo"
            <div class='trainer-item'>
               
                <div class='col-lg-10 offset-lg-1'>                          
                    <canvas id='myChart' style='width:120%;max-width:1000px'></canvas>

                    <script>
                    var xValues = ['AlertLevel'];
                    var yValues = [100 - $dis];
                    var barColors = ['red'];

                    new Chart('myChart', {
                    type: 'horizontalBar',
                    data: {
                        labels: xValues,
                        datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                        }]
                    },
                    options: {
                        legend: {display: false},
                        title: {
                        display: true,
                        text: 'Perimeter Breach Detection'
                        },
                        scales: {
                        xAxes: [{ticks: {min: 0, max:100}}]
                        }
                    }
                    });
                    </script>
                </div>  
            </div>
            <div class='trainer-item'>
               
                <div class='col-lg-10 offset-lg-1'>                          
                    <canvas id='myChart2' style='width:120%;max-width:1000px'></canvas>

                    <script>
                    var xValues = ['AlertLevel'];
                    var yValues = [100-$smk];
                    var barColors = ['red'];

                    new Chart('myChart2', {
                    type: 'horizontalBar',
                    data: {
                        labels: xValues,
                        datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                        }]
                    },
                    options: {
                        legend: {display: false},
                        title: {
                        display: true,
                        text: 'Fire Outbreak Detection'
                        },
                        scales: {
                        xAxes: [{ticks: {min: 0, max:100}}]
                        }
                    }
                    });
                    </script>
                </div>  
            </div>";
            ?>
        </div>
    </section>
    <!-- ***** Testimonials Ends ***** -->

<br>
<br>

    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
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