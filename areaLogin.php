<?php 
session_start();
include 'banco.php';

$login = $_POST['login'];
$senha = $_POST['senha'];

$result1= mysqli_query($link,"SELECT * FROM `usuarios` WHERE `login` = '$login' AND `senha`= '$senha'");
$result2= mysqli_query($link, "SELECT `login` FROM `administradores` WHERE `login` = '$login' AND `senha` = '$senha';");

echo (mysqli_num_rows ($result2));

if(mysqli_num_rows ($result2) > 0){
	$_SESSION["login"] = $login;
	$_SESSION["senha"] = $senha;
	header('location:areaAdm.php');
}
else if(mysqli_num_rows ($result1) > 0){
	$_SESSION["login"] = $login;
	$_SESSION["senha"] = $senha;
	header('location:areaUsuario.php');
}
else{
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	header('location:deuruim.php');
}


?>