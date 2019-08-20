<?php

function __e($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

function verifLength ($input, $tam) {
    if (strlen($input) < $tam) { 
        return false;
    } else {
        return true;
    }
}

function validacoes($postArray) {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if ($postArray['name'] == '' && $postArray['email'] == '' && $postArray['message-type'] == '' && $postArray['message'] == '') {
            echo "Ops! Alguns campos do formulário não foram preechidos.";
            return false;
        }
        
        if (verifLength($postArray['name'], 10) == false && verifLength($postArray['email'], 25) == false) {
            echo "Campo nome ou email muito curto";
            return false;
        }

        if (verifLength($postArray['phone'], 11) == false) {
            echo "Telefone inválido, insira o DD caso necessario";
            return false;
        }

        if ($postArray['message-type'] == '') {
            echo "O tipo de mensagem não foi definido";
            return false;
        }

        if (verifLength($postArray['message'], 50) == false) {
            echo "Mensagem muito curta";
            return false;
        }

        if (@$postArray['client-status'] == '') {
            echo "Defina um tipo de cliente";
            return false;
        }

        global $name, $email, $phone, $messageType, $clientStatus, $callMe, $message;
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $messageType = $_POST['message-type'];
        $clientStatus = $_POST['client-status'] == "new" ? "Novo" : "Antigo";
        $callMe = $_POST['call-me'] == true ? "O cliente deseja que ligue" : "O cliente não deseja que ligue";
        $message = $_POST['message'];
        return true;

    } else {
        echo "Acesso negado";
        return false;
    }
}