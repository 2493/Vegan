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

?>

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
    <a href="destroySession.php"><span class="menuSpan"><?php echo "Deslogar (".$logado.")"; ?></span></a> 
</div>	

<?php 
if(isset($_POST['dia'])== false){
echo "<div class='areaCadastro'>";
echo "<h1>Preenchimento de Dieta</h1>";
echo "<h2 id='obsCadastro'>(Utilizar o login do seu cliente no campo usuário, para enviar a dieta a ele)</h2>";
echo"<form action = 'cadastroDieta.php' method='POST'>";
echo "<label>Identificação da dieta (número):</label> <br>
<input type='Text' name ='id'><br>";
echo "<label>Usuário que receberá a dieta:</label><br>
<input type='Text' name ='usuario'><br>";
echo "<label>Dia da Semana:</label><br>
<input type='Text' name ='dia'><br>";
echo "<label>Café da Manha: </label><br>
<input type='Text' name ='cafem'><br>";
echo "<label>Lanche da Manha:</label><br>
<input type='Text' name ='lanchem'><br>";
echo "<label>Almoço:</label><br>
<input type='Text' name ='almoco'><br>";
echo "<label>Lanche da Tarde:</label><br>
<input type='Text' name ='lanchet'><br>";
echo "<label>Café da Tarde:</label><br>
<input type='Text' name ='cafet'><br>";
echo "<label>Janta:</label><br>
<input type='Text' name ='janta'><br>";
echo "<label>Ceia:</label><br>
<input type='Text' name ='ceia'><br>";
echo "<label>Observações:</label><br>
<input type='Text' name ='observacao'><br>";
echo "<input type='submit' value ='Enviar'><br>";
echo "</form>";
echo "</div>";
}
else{
$id = $_POST['id'];
$usuario = $_POST['usuario'];
$dia = $_POST['dia'];
$cafem = $_POST['cafem'];
$lanchem = $_POST['lanchem'];
$almoco = $_POST['almoco'];
$lanchet = $_POST['lanchet'];
$cafet = $_POST['cafet'];
$janta = $_POST['janta'];
$ceia = $_POST['ceia'];
$observacao = $_POST['observacao'];


if($id != "" && $usuario != "" && $dia != "" && $cafem != "" && $lanchem != "" && $almoco != "" && $lanchet != "" && $cafet != "" && $janta != "" && $ceia != ""){
$sql = "insert INTO dietas (id, usuario, dia, cafem, lanchem, almoco, lanchet, cafet, janta, ceia, observacao) VALUES ('".$id."', '".$usuario."', '".$dia."', '".$cafem."', '".$lanchem."', '".$almoco."', '".$lanchet."', '".$cafet."', '".$janta."', '".$ceia."', '".$observacao."')";

$result = mysqli_query($link, $sql);

if($result){
		echo "<div class='areaCadastro'>";
		echo "<br>";
		echo "Dados inseridos.";
		echo "<form action='areaAdm.php' method='POST'>";
		echo "<br>";
		echo "<input type='submit' value='OK'>";
		echo "</form>";
		echo "</div>";

	}else{
		echo "<div class='areaCadastro'>";
		echo "Iiih, deu ruim!";
		echo "</div>";
	}
	
	}

	else{
		echo "<div class='areaCadastro'>";
		echo "<br>";
		echo "Preencha novamente.";
		echo "<form action='cadastroDieta.php' method='POST'>";
		echo "<br>";
		echo "<input type='submit' value='Voltar'>";
		echo "</form>";
		echo "</div>";
	
	}

	}

	unset($dia);


 ?>

 <div class="rodape">
	<a href="http://facebook.com/" target="_blank"><span class="rodapeItem">SIGA-NOS NO FACEBOOK</span></a>  
    <a href="http://twitter.com/" target="_blank"><span class="rodapeItem">SIGA-NOS NO TWITTER</span></a> 
</div>

</div>

</body>
</html>
