<?php
session_start();

if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
    $logado = "";
    $senha = "";
    }
    else{
$logado = $_SESSION['login'];
$senha = $_SESSION['senha'];
}
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

<div class="tudo">';

echo "
<div class='menu'>
    <a href='index.php'><span class='menuSpan'>Início <img id='marcadorMenu' src='logo.png'></span></a>
    <span class='menuSpan'>|</span>
    <a href='paginaMiniBlog.php'><span class='menuSpan'>Mini Blog</span></a> 
    <span class='menuSpan'>|</span>
    <a href='paginaSobreNos.php'><span class='menuSpan'>Sobre Nós</span></a>
    <span class='menuSpan'>|</span>  
    <a href='paginaContato.php'><span class='menuSpan'>Contato</span></a>  
    <span class='menuSpan'>|</span>  
    ";
    if ($logado == "adm1" || $logado == "adm2" || $logado == "adm3"){
        echo "<a href='areaAdm.php'><span class='menuSpan'>Área de ".$logado."</span></a> ";
    }
    elseif ($logado == true) {
        echo "<a href='areaUsuario.php'><span class='menuSpan'>Área de ".$logado."</span></a> ";
    }
    else{
        echo "<a href='paginaLogin.php'><span class='menuSpan'>Login</span></a> ";
    }
    


echo "</div>";

echo '
<div class="principal">
	<h1>Vegan <img src="logo.png"></h1>

	<div class="slideshow-container">

<div class="mySlides fade">
  <img src="slide1.jpg" style="width:30%">
</div>

<div class="mySlides fade">
  <img src="slide2.jpg" style="width:42%">
</div>

<div class="mySlides fade">
  <img src="slide3.jpg" style="width:33.5%">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 5000); // Change image every 5 seconds
}
</script>

	<p>A empresa Vegan, por meio de uma plataforma digital, traz um novo conceito de nutrição vegana Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>
	
<div class="rodape">
	<a href="http://facebook.com/" target="_blank"><span class="rodapeItem">SIGA-NOS NO FACEBOOK<img id="iconeRodape" src="fbicon.jpg"></span></a>  
    <a href="http://twitter.com/" target="_blank"><span class="rodapeItem">SIGA-NOS NO TWITTER<img id="iconeRodape2" src="tticon.png"></span></a> 
</div>

</div>

</body>
</html>
';
?>