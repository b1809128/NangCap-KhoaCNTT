<?php 
$host="localhost";
$user="root";
$password="";
$database="joomla";
$con=mysqli_connect($host,$user,$password,$database);
$con -> set_charset("utf8");
if(mysqli_connect_error()){
    echo "Connect Fail: ".mysqli_connect_errno(); exit;
}