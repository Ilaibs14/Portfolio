<?php 

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "ilai_portfolio";

$connection = mysqli_connect($db_servername, $db_username, $db_password);

$dbconfig = mysqli_select_db($connection, $db_name);

if($dbconfig) {
	//echo "Database connected !";
} else {
	echo "Database connection faild !";
}

?>