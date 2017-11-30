<?php 
include 'banco.php';
$id = $_POST['id'];

$sql = "DELETE FROM `contato` WHERE id = '".$id."'";
$result = mysqli_query($link, $sql);

echo '<!DOCTYPE html>
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
';

echo "<div class = 'visualizarDieta'>
<h2>Mensagem Excluida!<h2>
";


        echo " <a href='visualizarMensagens.php'><span id='botaoVoltarUsuario'>Voltar</span></a> ";
 

echo "</div>";


echo '<div class="rodape">
	<a href="http://facebook.com/" target="_blank"><span class="rodapeItem">SIGA-NOS NO FACEBOOK<img id="iconeRodape" src="fbicon.jpg"></span></a>  
    <a href="http://twitter.com/" target="_blank"><span class="rodapeItem">SIGA-NOS NO TWITTER<img id="iconeRodape2" src="tticon.png"></span></a> 
</div>


</div>

</body>
</html>';
 ?>