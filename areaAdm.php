<?php 
session_start();
include 'banco.php';

if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	;
	}

$logado = $_SESSION['login'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Vegan</title>
	<link href='https://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet'>
	<link rel='stylesheet' type='text/css' href='style.css'>
	<link rel='sortcut icon' href='logo.png' type='image/gif' />
	<meta charset='UTF-8'>
</head>
<body>

<div class='tudo'>

<div class='menu'>
	<a href='index.html'><span class='menuSpan'>Início</span></a>
	<span class='menuSpan'>|</span>
	<a href='paginaMiniBlog.html'><span class='menuSpan'>Mini Blog</span></a> 
	<span class='menuSpan'>|</span>
    <a href='paginaSobreNos.html'><span class='menuSpan'>Sobre Nós</span></a>
    <span class='menuSpan'>|</span>  
    <a href='paginaContato.html'><span class='menuSpan'>Contato</span></a>  
    <span class='menuSpan'>|</span>  
    <a href='destroySession.php'><span class='menuSpan'><?php echo "Deslogar (".$logado.")"; ?></span></a> 

</div>	

<div class='principal'>
	<?php 
echo "<h1>Olá ".$logado."</h1>";
 ?>
	<div class="loginBordas">
	 <a href='cadastroDieta.php'><span id='botoesAreaAdm'>Inserir Dieta para Cliente</span></a> <br>
	 <a href='edicaoDieta.php'><span id='botoesAreaAdm'>Editar Dieta de Cliente</span></a>
	 </div>
</div>
	
<div class='rodape'>
	<a href="http://facebook.com/" "target= _blank"><span class="rodapeItem">SIGA-NOS NO FACEBOOK</span></a>  
    <a href='http://twitter.com/'' target= _blank'><span class='rodapeItem'>SIGA-NOS NO TWITTER</span></a> 
</div>

</div>

</body>
</html>


 