<?php

$localhose = "localhost";
$user = "root";
$pass = "";
$database = "test";

$con = mysqli_connect($localhose,$user,$pass,$database);

if(!$con){
    echo 'fail connect';
}
else{
    echo 'success connect';
}

