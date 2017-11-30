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
include 'banco.php';

echo "<!DOCTYPE html>
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
    ";
    if ($logado == true){
        echo "<a href='areaAdm.php'><span class='menuSpan'>Área de ".$logado."</span></a> ";
    }
    else{
        echo "<a href='paginaLogin.php'><span class='menuSpan'>Login</span></a> ";
    }
    


echo "</div>";

echo "<div class='areaCadastro'>";
  
  if(isset($_POST['mensagem'])== false){
    echo "<h1>Envie uma mensagem para o adm:</h1>";
    if ($logado == false){
        echo "<br>";
        echo "Por favor, realize o login para entrar em contato!";
        echo "<form action='paginaLogin.php' method='POST'>";
        echo "<br>";
        echo "<input type='submit' value='OK'>";
        echo "</form>";
    }
    else{
    echo "<div class='cadastroBordas'>";
    echo "<form action='paginaContato.php' method='POST'>";
    echo "<label>De:</label><br> <input type='Text' name='usuario' value='".$logado."'><br>";
    echo "<label>Para: Administradores (user adm) ou Usuarios (user):</label><br> <input type='Text' name='adm'><br>";
    echo "<label>Mensagem (max 600 caracteres):</label><br> <input type='Text' name='mensagem'><br>";
    echo "<input id='enviar' type='submit' value='enviar'>";
    echo "</form>";
    echo "</div>";
}
}

else{
    $remetente = $_POST['usuario'];
    $destinatario = $_POST['adm'];
    $mensagem = $_POST['mensagem'];
    
    if($remetente != "" && $destinatario != ""){
    $sql = "INSERT INTO contato(remetente, destinatario, mensagem) VALUES
    ('".$remetente."','".$destinatario."','".$mensagem."')";

    $result = mysqli_query($link, $sql);

    if($result){
        echo "<br>";
        echo "Mensagem Enviada.";
        echo "<form action='paginaContato.php' method='POST'>";
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
        echo "<form action='paginaContato.php' method='POST'>";
        echo "<br>";
        echo "<input type='submit' value='Voltar'>";
        echo "</form>";

    
    }

    }




	
echo "
</div>
<div class='rodape'>
	<a href='http://facebook.com/'' target='_blank'><span class='rodapeItem'>SIGA-NOS NO FACEBOOK</span></a>  
    <a href='http://twitter.com/'' target='_blank'><span class='rodapeItem'>SIGA-NOS NO TWITTER</span></a> 
</div>

</div>

</body>
</html>";
?>