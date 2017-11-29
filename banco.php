<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "server";

$link = mysqli_connect($servername, $username, $password, $database);
if(mysqli_connect_error()){
	printf("<br> Nao foi possivel conectar.");
	printf("<br> Erro: %s\n", mysqli_connect_error());
	exit();
}

?>