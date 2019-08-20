<?php

    require_once('../validacoes/variaveis.php');
    require_once('../validacoes/validar.php');

    $resultValidation = validacoes($_POST);
    if ($resultValidation == true) {
        echo "<h1>Mensagem do cliente</h1>";
        echo "<p><b>Nome: </b>".$name."</p>";
        echo "<p><b>Email: </b>".$email."</p>";
        echo "<p><b>Telefone: </b>".$phone."</p>";
        echo "<p><b>Tipo de Mensagem: </b>".$messageType."</p>";
        echo "<p><b>Tipo de cliente: </b>".$clientStatus."</p>";
        echo "<p><b>Ligar? </b>".$callMe."</p>";
        echo "<h4>Mensagem do Cliente:</h4><p>".$message."</p>";

    } else {
        echo "<br><div>Desculpe, dados inválidos!</div>";
    }

?>