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


$sql1 = "SELECT * FROM `dietas` WHERE usuario='".$logado."'";
$result1 = mysqli_query($link, $sql1);

$sql2 = "SELECT * FROM `dietas` WHERE autor='".$logado."'";
$result2 = mysqli_query($link, $sql2);


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
echo "<h1>Dietas abaixo: </h1>";
echo "<h2>Bom Apetite ".$logado."!</h2>";

if ($logado == "adm1" || $logado == "adm2" || $logado == "adm3") {
while($row = mysqli_fetch_array($result2, MYSQLI_NUM)){

	echo '<table id = "tabelaDietas" border="1px" cellpadding="5px" cellspacing="0">';
  echo "<form action='excluirDieta.php' method='POST'>";
  echo "<tr> <td id = 'tituloTabelaDietas'> Identificação:</td> <td><input type='Text' name='id' value='$row[0]'></td> </tr>";
  echo "<tr id = 'difTabelaDietas'> <td id = 'tituloTabelaDietas'> Cliente:</td> <td> $row[1]</td> </tr>";
  echo "<tr> <td id = 'tituloTabelaDietas'> Dia da Dieta:</td> <td> $row[2]</td> </tr>";
	echo "<tr id = 'difTabelaDietas'> <td id = 'tituloTabelaDietas'> Café da Manhã:</td> <td> $row[3]</td> </tr>";
	echo "<tr> <td id = 'tituloTabelaDietas'> Lanche da Manhã:</td> <td> $row[4]</td> </tr>";
	echo "<tr id = 'difTabelaDietas'> <td id = 'tituloTabelaDietas'> Almoço:</td> <td> $row[5]</td> </tr>";
	echo "<tr> <td id = 'tituloTabelaDietas'> Lanche da Tarde:</td> <td> $row[6]</td> </tr>";
	echo "<tr id = 'difTabelaDietas'> <td id = 'tituloTabelaDietas'> Café da Tarde:</td> <td> $row[7]</td> </tr>";
	echo "<tr> <td id = 'tituloTabelaDietas'> Janta:</td> <td> $row[8]</td> </tr>";
	echo "<tr id = 'difTabelaDietas'> <td id = 'tituloTabelaDietas'> Ceia:</td> <td> $row[9]</td> <td><input type='submit' value ='Excluir Dieta'></form></td></tr>";
    echo "</table>";  
}  

}elseif ($logado == true) {

 while($row = mysqli_fetch_array($result1, MYSQLI_NUM)){
  echo '<table id = "tabelaDietas" border="1px" cellpadding="5px" cellspacing="0">';
  echo "<tr id = 'difTabelaDietas'> <td id = 'tituloTabelaDietas'> Autor:</td> <td> $row[11]</td> </tr>";
  echo "<tr> <td id = 'tituloTabelaDietas'> Dia da Dieta:</td> <td> $row[2]</td> </tr>";
  echo "<tr id = 'difTabelaDietas'> <td id = 'tituloTabelaDietas'> Café da Manhã:</td> <td> $row[3]</td> </tr>";
  echo "<tr> <td id = 'tituloTabelaDietas'> Lanche da Manhã:</td> <td> $row[4]</td> </tr>";
  echo "<tr id = 'difTabelaDietas'> <td id = 'tituloTabelaDietas'> Almoço:</td> <td> $row[5]</td> </tr>";
  echo "<tr> <td id = 'tituloTabelaDietas'> Lanche da Tarde:</td> <td> $row[6]</td> </tr>";
  echo "<tr id = 'difTabelaDietas'> <td id = 'tituloTabelaDietas'> Café da Tarde:</td> <td> $row[7]</td> </tr>";
  echo "<tr> <td id = 'tituloTabelaDietas'> Janta:</td> <td> $row[8]</td> </tr>";
  echo "<tr id = 'difTabelaDietas'> <td id = 'tituloTabelaDietas'> Ceia:</td> <td> $row[9]</td> </tr>";
    echo "</table>";  
}  
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