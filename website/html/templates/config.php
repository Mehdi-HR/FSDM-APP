<?php 

//connecting to database 
$host = 'localhost';
$user = 'root';
$password='';
$db_name = 'fsdmapp';

$conn = mysqli_connect($host,$user,$password,$db_name);

if(!$conn){
	echo "Connection failed" . mysql_error();
}


 ?>