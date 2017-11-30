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
    <a href='paginaContato.php'><span class='menuSpan'>Contato <img id='marcadorMenu' src='logo.png'></span></a>  
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
    echo "<label>Identificação da Mensagem (número):</label><br> <input type='Text' name='id'><br>";
    echo "<label>Mensagem (max 600 caracteres):</label><br> <input type='Text' name='mensagem'><br>";
    echo "<input id='enviar' type='submit' value='enviar'>";
    echo "</form>";
    echo "</div>";
}
}

else{
    $remetente = $_POST['usuario'];
    $destinatario = $_POST['adm'];
    $id = $_POST['id'];
    $mensagem = $_POST['mensagem'];
    
    if($remetente != "" && $destinatario != "" && $id != "" && $mensagem != ""){
    $sql = "INSERT INTO contato(remetente, destinatario, mensagem, id) VALUES
    ('".$remetente."','".$destinatario."','".$mensagem."' ,'".$id."')";

    $result = mysqli_query($link, $sql);

    if($result){
        echo "<br>";
        echo "Mensagem Enviada.";
        echo "<form action='paginaContato.php' method='POST'>";
        echo "<br>";
        echo "<input type='submit' value='OK'>";
        echo "</form>";

    }else{
        echo "A identificação precisa ser única, por favor, escolha outro numero para identifcar.";
        echo "<form action='paginaContato.php' method='POST'>";
        echo "<br>";
        echo "<input type='submit' value='Voltar'>";
        echo "</form>";
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




	
echo '
</div>
<div class="rodape">
    <a href="http://facebook.com/" target="_blank"><span class="rodapeItem">SIGA-NOS NO FACEBOOK<img id="iconeRodape" src="fbicon.jpg"></span></a>  
    <a href="http://twitter.com/" target="_blank"><span class="rodapeItem">SIGA-NOS NO TWITTER<img id="iconeRodape2" src="tticon.png"></span></a> 
</div>


</div>

</body>
</html>';
?>