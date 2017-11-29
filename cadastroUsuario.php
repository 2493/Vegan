<?php 
include 'banco.php';
?>

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
	<a href="index.html"><span class="menuSpan">Início</span></a>
	<span class="menuSpan">|</span>
	<a href="paginaMiniBlog.html"><span class="menuSpan">Mini Blog</span></a> 
	<span class="menuSpan">|</span>
    <a href="paginaSobreNos.html"><span class="menuSpan">Sobre Nós</span></a>
    <span class="menuSpan">|</span>  
    <a href="paginaContato.html"><span class="menuSpan">Contato</span></a>  
    <span class="menuSpan">|</span>  
    <a href="paginaLogin.php"><span class="menuSpan">Login</span></a> 
</div>	

<div class="areaCadastro">
<?php
if(isset($_POST['login'])== false){
	echo "<h1>Faça seu cadastro:</h1>";
	
	echo "<div class='cadastroBordas'>";
	echo "<form action='cadastroUsuario.php' method='POST'>";
	echo "<label>Login:</label><br> <input type='Text' name='login'><br>";

	echo "<label>Senha:</label><br> <input type='Password' name='senha'><br>";
	echo "<input id='logar' type='submit' value='Salvar'>";
	echo "</form>";
	echo "</div>";
}

else{
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	
	if($login != "" && $senha != ""){
	$sql = "INSERT INTO usuarios(login, senha) VALUES
	('".$login."','".$senha."')";

	$result = mysqli_query($link, $sql);

	if($result){
		echo "<br>";
		echo "Dados inseridos.";
		echo "<form action='paginaLogin.php' method='POST'>";
		echo "<br>";
		echo "<input type='submit' value='OK'>";
		echo "</form>";

	}else{
		echo "Iiih, deu ruim!";
	}

	}
	else{
		echo "<br>";
		echo "Preencha novamente.";
		echo "<form action='cadastroUsuario.php' method='POST'>";
		echo "<br>";
		echo "<input type='submit' value='Voltar'>";
		echo "</form>";

	
	}

	}

	unset($login);
 ?>
</div>


 <div class="rodape">
	<a href="http://facebook.com/" target="_blank"><span class="rodapeItem">SIGA-NOS NO FACEBOOK</span></a>  
    <a href="http://twitter.com/" target="_blank"><span class="rodapeItem">SIGA-NOS NO TWITTER</span></a> 
</div>

</div>

</body>
</html>

