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


if (isset($_POST['id']) == true) {
echo "<form action = 'edicaoDieta.php' method='POST'>";
$sql = "select * from dietas where id = ". "'" . $_POST['id'] . "'";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);

echo "ID: ".$row[0]."<br>"."<input type='hidden' name='id' value=".$row[0]."><br>";
echo "Usuário: <input type='Text' name='usuario' value='".$row[1]."'>";
echo "Dia: <input type='Text' name='dia' value='".$row[2]."'><br>";
echo "<input type='submit' value='Salvar'>";
echo "</form>";

} else{
$codigoJaCadastrado = $_POST['id'];
$usuario = $_POST['usuario'];
$dia = $_POST['dia'];

if($usuario != "" && $dia != ""){
$sql = "update dietas set usuario = "."'".$usuario."'where id = ". "'". $codigoJaCadastrado."'";
$result=mysqli_query($link,$sql);
$sql1 = "update dietas set dia = "."'".$dia."'where id = ". "'". $codigoJaCadastrado."'";
$result1=mysqli_query($link,$sql1);
if($result && $result1){
	echo "Dados alterados.";
	echo "<form action='areaAdm.php' method='POST'>";
	echo "<input type='submit' value='Voltar'>";
	echo"</form>";
	}
	else{
	echo "<h3 align='center'>Erro.</h3>";
	}
}else{
	echo "Preencha os campos";
	echo "<form action='areaAdm.php' method='POST'>";
	echo "<br>";
	echo "<input type='submit' value='Voltar'>";
	echo "</form>";

}
}
?>
