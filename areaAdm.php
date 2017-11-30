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
	<a href='index.php'><span class='menuSpan'>Início</span></a>
	<span class='menuSpan'>|</span>
	<a href='paginaMiniBlog.php'><span class='menuSpan'>Mini Blog</span></a> 
	<span class='menuSpan'>|</span>
    <a href='paginaSobreNos.php'><span class='menuSpan'>Sobre Nós</span></a>
    <span class='menuSpan'>|</span>  
    <a href='paginaContato.php'><span class='menuSpan'>Contato</span></a>  
    <span class='menuSpan'>|</span>  
    <a href='destroySession.php'><span class='menuSpan'><?php echo "Deslogar (".$logado.") "; ?> <img id='marcadorMenu' src='logo.png'></span></a> 

</div>	

<div class='principal'>
	<?php 
echo "<h1>Olá ".$logado."</h1>";
 ?>
	<div class="loginBordas">
	 <a href='paginaContato.php'><span id='botoesAreaAdm'>Enviar mensagens para usuários</span></a> <br>	
	 <a href='visualizarMensagens.php'><span id='botoesAreaAdm'>Visualizar mensagens de usuários</span></a> <br><br>	
	 <a href='cadastroDieta.php'><span id='botoesAreaAdm'>Inserir Dieta para Cliente</span></a> <br>
	 
	 <a href='visualizarTodasDietas.php'><span id='botoesAreaAdm'>Vizualizar Dietas de Clientes</span></a>

	 </div>
</div>
	
<div class="rodape">
	<a href="http://facebook.com/" target="_blank"><span class="rodapeItem">SIGA-NOS NO FACEBOOK<img id="iconeRodape" src="fbicon.jpg"></span></a>  
    <a href="http://twitter.com/" target="_blank"><span class="rodapeItem">SIGA-NOS NO TWITTER<img id="iconeRodape2" src="tticon.png"></span></a> 
</div>


</div>

</body>
</html>


 