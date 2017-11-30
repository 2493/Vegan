<?php  
session_start();

include 'banco.php';

if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:paginaLogin.php');
  }

$logado = $_SESSION['login'];


$sql = "SELECT * FROM `contato` WHERE destinatario='".$logado."'";
$result = mysqli_query($link, $sql);

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
    <a href='destroySession.php'><span class='menuSpan'><?php echo "Deslogar (".$logado.") "; ?><img id='marcadorMenu' src='logo.png'></span></a> 

</div>  

<?php
echo "<div class = 'visualizarDieta'>"; 
echo "<h1>Mensagens Abaixo: </h1>";


while($row = mysqli_fetch_array($result, MYSQLI_NUM)){


	echo '<table id = "tabelaDietas" border="1px" cellpadding="5px" cellspacing="0">';
  echo "<form action='excluirMensagem.php' method='POST'>";
  echo "<tr id = 'difTabelaDietas'> <td id = 'tituloTabelaDietas'> Identificação:</td> <td><input type='Text' name='id' value='$row[3]'></td> </tr>";
  echo "<tr> <td id = 'tituloTabelaDietas'> Remetente:</td> <td> $row[0]</td> </tr>";
	echo "<tr id = 'difTabelaDietas'> <td id = 'tituloTabelaDietas'> Mensagem:</td> <td> $row[2] </td> <td><input type='submit' value ='Excluir Mensagem'></form></td></tr>";
    echo "</table>";


  
}  

if ($logado == "adm1" || $logado == "adm2" || $logado == "adm3"){
        echo "<a href='areaAdm.php'><span id='botaoVoltarUsuario'>Voltar</span></a> ";
    }
    elseif ($logado == true) {
        echo "<a href='areaUsuario.php'><span id='botaoVoltarUsuario'>Voltar</span></a>";
    }
    else{
        echo"<a href='paginaLogin.php'><span id='botaoVoltarUsuario'>Voltar</span></a>";

    }
?>
   

</div>


<div class="rodape">
  <a href="http://facebook.com/" target="_blank"><span class="rodapeItem">SIGA-NOS NO FACEBOOK<img id="iconeRodape" src="fbicon.jpg"></span></a>  
    <a href="http://twitter.com/" target="_blank"><span class="rodapeItem">SIGA-NOS NO TWITTER<img id="iconeRodape2" src="tticon.png"></span></a> 
</div>


</div>

</body>
</html> 