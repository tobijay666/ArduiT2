<?php
            include 'database.php';
            $con = Database::connect();
            ?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="111.css">
  </head>
  <body>
    <h1 style="text-align:center">The Panel</h1>
    <div>
      <h2>The Relay Switches</h2>
      
      <table border="1">
        <tr>
          <th>
            <h3>Switch1<h3>
          </th>
          <th>
          <h3>Switch2<h3>

          </th>
        </tr>
        <tr height="80px">
            <td>
            <form action="updateDB.php" method="post">
            <input type="submit" class="buttonON" name="Stat" value="On" > <input type="submit" class="buttonOFF" name="Stat" value="Off">
            <input type="hidden" name="Id" value="0">
            </form>
            </td>
            <td>
            <form action="updateDB.php" method="post">
            <input type="submit" class="buttonON" name="Stat" value="On" > <input type="submit" class="buttonOFF" name="Stat" value="Off">
            <input type="hidden" name="Id" value="1">
            </form>
            </td>
        </tr>
        <!-- <tr>
          <td>-->
          <!-- <input type="submit" name="Stat" value="On" > <input type="submit" value="Off"> -->
          <!-- input hidden id -->
          <!-- </td>
        </tr>  -->
      </table>

    </div>

    <div>
      <h2>UltraSonic Sensor</h2>
      
      <?php

            $sqry="SELECT * FROM motionsensor ";

            if(!($squ= mysqli_query($con,$sqry))){
                echo"Data retrival failed";
            }
            while( $row = mysqli_fetch_assoc($squ) ){
              echo"<table border = '1'>
              
              <tr>
                <th>Distance</th>

              </tr>

              <tr>
                <td>{$row['Distance']}</td>

              </tr>

              </table>";
            }
            

            ?>

    </div>
    <div>
      <h2>ALL</h2>
      
            <?php

            $sqry="SELECT * FROM statusled ";

            if(!($squ= mysqli_query($con,$sqry))){
                echo"Data retrival failed";
            }
            while( $row = mysqli_fetch_assoc($squ) ){
              echo"<table border = '1'>
              
              <tr>
                <th>ID</th>
                <th>Stat</th>
              </tr>

              <tr>
                <td>{$row['ID']}</td>
                <td>{$row['Stat']}</td>
              </tr>

              </table>";
            }
            

            ?>
      
    </div>
  </body>
</html>