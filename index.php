<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'test1';

$con = mysqli_connect($host,$user,$password,$db);


if($con->connect_error){
    echo 'connection failed';
}
else{
    echo 'success connection';
}

//$sql = "insert into user(id,name,password) values(1,'ali','123')"


?>