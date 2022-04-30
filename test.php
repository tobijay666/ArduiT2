<?php
$Username = "jE1%";

$vali1 = "/.{6}/";

if( preg_match($vali1,$Username)){
    echo "Yes";
}
else{
    echo "No";
}

?>