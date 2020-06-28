<?php

$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "mytasks";

$conn = mysqli_connect($sName, $uName, $pass, $db_name);

if(!$conn){
    echo "Connection Failed";
}





?>