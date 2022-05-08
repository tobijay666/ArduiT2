<?php
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

    <link rel="stylesheet" href="assets/css/Electra.css">

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
                            <li class="scroll-to-section"><a href="ControlDevices.php" class="active">Control Devices</a></li>
                            <li class="scroll-to-section"><a href="SensorDet.php" >Sensor Details  </a></li>
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

    
    <section class="section" id="schedule">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading dark-bg">
                        <h2> Control <em>Devices</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        
                </div>
                <div class="col-lg-10 offset-lg-1">
                    <div class="schedule-table filtering">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="day-time"><em style="color: #ed563b; ">Home Control</em></td>
                                    <td >Light System <br> ----- </td>
                                    <td >Lock System <br>----- </td>
                                </tr>
                                <tr>
                                    <td class="day-time">Status</td>
                                    <td >
                                            <em>Click to turn:</em>
                                         <?php

                                        $sqry="SELECT * FROM statusled where ID = 0 ";

                                        if(!($squ= mysqli_query($con,$sqry))){
                                            echo"Data retrival failed";
                                        }
                                        while( $row = mysqli_fetch_assoc($squ) ){
                                        if('Off' == $row['Stat']){
                                            echo"
                                            <div id='tabs'>
                                            <div  class='main-button'>
                                                <form action='updateDB.php' method='POST'>
                                                <input type='hidden' name='Stat' value='On'>
                                                <input type='hidden' name='Id' value='0'>
                                                <input style='display: inline-block;
                                                font-size: 15px;
                                                padding: 12px 20px;
                                                background-color: #ed563b;
                                                color: #fff;
                                                text-align: center;
                                                font-weight: 400;
                                                text-transform: uppercase;
                                                transition: all .3s;' type='Submit' value='Off'>
                                                </form>
                                                </div>
                                                </div>";
                                        }
                                        else if ('On' == $row['Stat']){
                                            echo"
                                            <div id='tabs'>
                                            <div  class='main-rounded-button'>
                                                <form action='updateDB.php' method='POST'>
                                                <input type='hidden' name='Stat' value='Off'>
                                                <input type='hidden' name='Id' value='0'>
                                                <input style='display: inline-block;
                                                font-size: 15px;
                                                padding: 12px 20px;
                                                background-color: #76ed3b;
                                                color: #fff;
                                                text-align: center;
                                                font-weight: 400;
                                                text-transform: uppercase;
                                                transition: all .3s;' type='Submit' value='On'>
                                                </form>
                                                </div>
                                                </div>";
                                        }
                                        } 
 
                                        //v?>
                                     </td>
                                    <td >
                                        <em>Click to turn:</em>
                                        <?php

                                        $sqry="SELECT * FROM statusled where ID = 1 ";

                                        if(!($squ= mysqli_query($con,$sqry))){
                                            echo"Data retrival failed";
                                        }
                                        while( $row = mysqli_fetch_assoc($squ) ){
                                            if('Off' == $row['Stat']){
                                                echo"
                                                <div id='tabs'>
                                                    <div  class='main-button'>
                                                        <form action='updateDB.php' method='POST'>
                                                            <input type='hidden' name='Stat' value='On'>
                                                            <input type='hidden' name='Id' value='1'>
                                                            <input style='display: inline-block;
                                                            font-size: 15px;
                                                            padding: 12px 20px;
                                                            background-color: #ed563b;
                                                            color: #fff;
                                                            text-align: center;
                                                            font-weight: 400;
                                                            text-transform: uppercase;
                                                            transition: all .3s;' type='Submit' value='Off'>
                                                        </form>
                                                    </div>
                                                </div>";
                                            }
                                            else if ('On' == $row['Stat']){
                                                echo"
                                                <div id='tabs'>
                                                <div  class='main-rounded-button'>
                                                    <form action='updateDB.php' method='POST'>
                                                    <input type='hidden' name='Stat' value='Off'>
                                                    <input type='hidden' name='Id' value='1'>
                                                    <input style='display: inline-block;
                                                    font-size: 15px;
                                                    padding: 12px 20px;
                                                    background-color: #76ed3b;
                                                    color: #fff;
                                                    text-align: center;
                                                    font-weight: 400;
                                                    text-transform: uppercase;
                                                    transition: all .3s;' type='Submit' value='On'>
                                                    </form>
                                                    </div>
                                                    </div>";
                                            }
                                            }
                                        ?>
                                        </td>
                                </tr>
                               
                                <tr>
                                    <td class="day-time"><em style="color: #ed563b;">Home Security</em></td>
                                    <td >Fire Alert <br> ----- </td>
                                    <td >Perimeter Alert <br>----- </td>
                                </tr>
                                <tr>
                                    <td class="day-time">Status</td>
                                    <td >
                                        <?php

                                        $sqry="SELECT * FROM statusled where ID = 3 ";

                                        if(!($squ= mysqli_query($con,$sqry))){
                                            echo"Data retrival failed";
                                        }
                                        while( $row = mysqli_fetch_assoc($squ) ){
                                            $stat = $row['Stat'];}
                                        
                                        $sqry2="SELECT * FROM statusled where ID = 4 ";

                                        if(!($squ= mysqli_query($con,$sqry))){
                                            echo"Data retrival failed";
                                        }
                                        while( $row = mysqli_fetch_assoc($squ) ){
                                            $stat2 = $row['Stat'];}
                                            
                                            $val1 = (int) $stat;
                                            $val2 = (int) $stat2;
                                            
                                            if( $val1 >= 50 && $val2 >= 35){
                                                echo"Triggered";
                                            }
                                            else if( $val1 <= 50 && $val2 <= 35){
                                                echo"Activated";
                                            }
                                        
                                        
                                        ?>
                                        </td>
                                    <td >                                        
                                        <?php

                                        $sqry="SELECT * FROM statusled where ID = 2 ";

                                        if(!($squ= mysqli_query($con,$sqry))){
                                            echo"Data retrival failed";
                                        }
                                        while( $row = mysqli_fetch_assoc($squ) ){
                                            $stat = $row['Stat'];
                                        }
                                            $sqry2="SELECT * FROM motionsensor where ID = 1";

                                            if(!($squ2= mysqli_query($con,$sqry2))){
                                                echo"Data retrival failed";
                                            }
                                            while( $row2 = mysqli_fetch_assoc($squ2) ){
                                                $stat2 = $row2['Distance'];
                                        }
                                        $dis = (int) $stat2;
                                        if ( $dis === 0){
                                            echo"Inactive";
                                        }
                                        else if ($dis<= 20){
                                            echo"Triggered";
                                        }
                                        else if ($dis>=20){
                                            echo"Activated";
                                        }
                                        ?> 
                                    </td>
                                </tr>
                            </tbody>
                        </table>
    <br><br><br><br>

                    </div>
                </div>
            </div>
        </div>
    </section>


    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; 2022 Electra Corp.
                    
                    - Designed by <a rel="nofollow" href="https://templatemo.com" class="tm-text-link" target="_parent">Team Electra</a></p>
                    
                    
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