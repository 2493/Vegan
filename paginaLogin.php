
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

<div class="areaLogin">

<form method="post" action="areaLogin.php" id="formlogin" name="formlogin" >
<h1>Login</h1><br>
<div class="loginBordas">
<label>NOME: </label><br>
<input type="text" name="lpaogin" id="login"><br>
<label>SENHA:</label><br> 
<input type="password" name="senha" id="senha"><br>
<input id="logar" type="submit" value="LOGAR"><br>
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
	<a href="http://facebook.com/" target="_blank"><span class="rodapeItem">SIGA-NOS NO FACEBOOK</span></a>  
    <a href="http://twitter.com/" target="_blank"><span class="rodapeItem">SIGA-NOS NO TWITTER</span></a> 
</div>

</div>

</body>
</html>

