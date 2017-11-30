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

$diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado');
$data = date('Y-m-d');
$diasemana_numero = date('w', strtotime($data));
$diaDieta = $diasemana[$diasemana_numero];


$sql = "SELECT * FROM `dietas` WHERE dia='".$diaDieta."' and usuario='".$logado."'";
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
echo "<h1>Dieta de ".$diaDieta." abaixo: </h1>";
echo "<h2>Bom Apetite ".$logado."!</h2>";


while($row = mysqli_fetch_array($result, MYSQLI_NUM)){

	echo "<table border='1px' cellpadding='5px' cellspacing='0'>";
	echo "<tr id = 'difTabelaDietas'> <td id = 'tituloTabelaDietas'> Café da Manhã:</td> <td> $row[3]</td> </tr>";
	echo "<tr> <td id = 'tituloTabelaDietas'> Lanche da Manhã:</td> <td> $row[4]</td> </tr>";
	echo "<tr id = 'difTabelaDietas'> <td id = 'tituloTabelaDietas'> Almoço:</td> <td> $row[5]</td> </tr>";
	echo "<tr> <td id = 'tituloTabelaDietas'> Lanche da Tarde:</td> <td> $row[6]</td> </tr>";
	echo "<tr id = 'difTabelaDietas'> <td id = 'tituloTabelaDietas'> Café da Tarde:</td> <td> $row[7]</td> </tr>";
	echo "<tr> <td id = 'tituloTabelaDietas'> Janta:</td> <td> $row[8]</td> </tr>";
	echo "<tr id = 'difTabelaDietas'> <td id = 'tituloTabelaDietas'> Ceia:</td> <td> $row[9]</td> </tr>";
    echo "</table>";

    echo "<h3>Observações: ".$row[10]."</h3>";   

  
}  


?>
   <a href='areaUsuario.php'><span id='botaoVoltarUsuario'>Voltar</span></a> 

</div>


<div class="rodape">
  <a href="http://facebook.com/" target="_blank"><span class="rodapeItem">SIGA-NOS NO FACEBOOK<img id="iconeRodape" src="fbicon.jpg"></span></a>  
    <a href="http://twitter.com/" target="_blank"><span class="rodapeItem">SIGA-NOS NO TWITTER<img id="iconeRodape2" src="tticon.png"></span></a> 
</div>


</div>

</body>
</html> 