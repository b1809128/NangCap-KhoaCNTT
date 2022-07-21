<?php 
$host="localhost";
$user="root";
$password="";
$database="joomla";
$con=mysqli_connect($host,$user,$password,$database);
mysqli_set_charset($con,"utf8");
if(mysqli_connect_error()){
    echo "Connect Fail: ".mysqli_connect_errno(); exit;
}