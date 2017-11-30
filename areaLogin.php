<?php 
session_start();
include 'banco.php';

$login = $_POST['login'];
$senha = $_POST['senha'];

$result1= mysqli_query($link,"SELECT * FROM `usuarios` WHERE `login` = '$login' AND `senha`= '$senha';");
$result2= mysqli_query($link, "SELECT * FROM `administradores` WHERE `login` = '$login' AND `senha` = '$senha';");

$sql = "SELECT * FROM `usuarios` WHERE `login` = '$login' AND `senha`= '$senha';";


//echo (mysqli_num_rows ($result2));
//echo (mysqli_num_rows ($result1));

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
	echo '
<!DOCTYPE html>
<html>
<head>
	<title>Vegan</title>
	<link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="sortcut icon" href="logo.png" type="image/gif" />
	<meta charset="UTF-8">
</head>
<body>

<div class="tudo">

<div class="menu">
	<a href="index.php"><span class="menuSpan">Início</span></a>
	<span class="menuSpan">|</span>
	<a href="paginaMiniBlog.php"><span class="menuSpan">Mini Blog</span></a> 
	<span class="menuSpan">|</span>
    <a href="paginaSobreNos.php"><span class="menuSpan">Sobre Nós</span></a>
    <span class="menuSpan">|</span>  
    <a href="paginaContato.php"><span class="menuSpan">Contato</span></a>  
    <span class="menuSpan">|</span>  
    <a href="paginaLogin.php"><span class="menuSpan">Login <img id="marcadorMenu" src="logo.png"></span></a> 

</div>	

<div class="areaLogin">

<form method="post" action="areaLogin.php" id="formlogin" name="formlogin" >
<h1>Login</h1><br>
<div class="loginBordas">
<label>NOME: </label><br>
<input type="text" name="login" id="login"><br>
<label>SENHA:</label><br> 
<input type="password" name="senha" id="senha"><br>
<input id="logar" type="submit" value="LOGAR"><br>
<label>USUÁRIO INEXISTENTE </label><br>
</form>
</div>

<div class="loginBordas">	
	<h2>ou cadastre-se:</h2>
<form method="post" action="cadastroUsuario.php" id="formCadastroLogin" name="formCadastroLogin" >
<input id="logar" type="submit" value="CADASTRO"  />
</form>
</div>

</div>
	
<div class="rodape">
	<a href="http://facebook.com/" target="_blank"><span class="rodapeItem">SIGA-NOS NO FACEBOOK<img id="iconeRodape" src="fbicon.jpg"></span></a>  
    <a href="http://twitter.com/" target="_blank"><span class="rodapeItem">SIGA-NOS NO TWITTER<img id="iconeRodape2" src="tticon.png"></span></a> 
</div>


</div>

</body>
</html>';
}


?>