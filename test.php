<?php
// $Username = "jE1%";

// $vali1 = "/.{6}/";

// if( preg_match($vali1,$Username)){
//     echo "Yes";
// }
// else{ 
    // ALTER TABLE output_logs
    // ADD FOREIGN KEY (ID) 
    // REFERENCES statusled(ID);
//     echo "No";
// }



//INSERT INTO `output_logs` (`ID`, `Date`, `Time`) VALUES ('0', '2022-05-06', '12:22:10'), ('1', '2022-05-06', ---'12:22:14')



// include 'database.php';
// $con = Database::connect();
// $sqry = "SELECT Time FROM output_logs WHERE ID = '0' Limit 100";
  
// if(!($squ= mysqli_query($con,$sqry))){
//     echo"Data retrival failed";
// }
// $array = array();
// $index = 0;
// while( $row = mysqli_fetch_assoc($squ) ){
//     // $temp = $row;
//    // print_r( $row);
//     $array[$index] = $row['Time'];
//     $index++;
// }
// //echo count($array) ;
// //print_r( $array);
// $array1 = array();
// $index1 = 0;

// while ($index > 0){
//     $index--;
//     if(!(isBetween("11:30:00",$array[$index], "13:00:00"))){
//         $array1[$index1] = $array[$index]  ;
//         $index1 ++;
//     }
    
// }

// function isBetween($from, $till, $input) {
//     $f = DateTime::createFromFormat('!H:i:s', $from);
//     $t = DateTime::createFromFormat('!H:i:s', $till);
//     $i = DateTime::createFromFormat('!H:i:s', $input);
//     if ($f > $t) $t->modify('+1 day');  
//     return ($f <= $i && $i <= $t) || ($f <= $i->modify('+1 day') && $i <= $t);
// }

// //$array = array("17:29:53","16:00:32");
// $avg = date('H:i:s', array_sum(array_map('strtotime', $array1)) / count($array1));
// //echo "$avg";




// ?>

<?php

//A: RECORDS TODAY'S Date And Time
date_default_timezone_set('Asia/Colombo');
$today = time();

//B: RECORDS Date And Time OF YOUR EVENT
$event = mktime(10,40,0);

//C: COMPUTES THE DAYS UNTIL THE EVENT.
$countdown = round(($event - $today));

//D: DISPLAYS COUNTDOWN UNTIL EVENT
function execute_command(){
echo " Hello";
}

sleep($countdown);
execute_command();

?>