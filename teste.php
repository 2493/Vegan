<?php
include 'banco.php';

if(isset($_POST['mensagem'])== false){
    echo "<h1>Envie uma mensagem para o adm:</h1>";
    
    echo "<div class='cadastroBordas'>";
    echo "<form action='teste.php' method='POST'>";
    echo "<label>De: usuario:</label><br> <input type='Text' name='usuario'><br>";

    echo "<label>Para: Administrador 1 (adm1), 2 (adm2), 3 (adm3):</label><br> <input type='Text' name='adm'><br>";

    echo "<label>Mensagem:</label><br> <input type='Text' name='mensagem'><br>";

    echo "<input id='enviar' type='submit' value='enviar'>";
    echo "</form>";
    echo "</div>";
}

else{
    $usuario = $_POST['usuario'];
    $adm = $_POST['adm'];
    $mensagem = $_POST['mensagem'];
    
    if($usuario != "" && $adm != ""){
    $sql = "INSERT INTO contato(remetente, destinatario, mensagem) VALUES
    ('".$usuario."','".$adm."','".$mensagem."')";

    $result = mysqli_query($link, $sql);

    if($result){
        echo "<br>";
        echo "Mensagem Enviada.";
        echo "<form action='teste.php' method='POST'>";
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
        echo "<form action='teste.php' method='POST'>";
        echo "<br>";
        echo "<input type='submit' value='Voltar'>";
        echo "</form>";

    
    }

    }

