<?php

    session_start();

    function stripit($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    require $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/phpmailer/mailer.php';       

    if ($contact == 1) {
        $status = "O email foi enviado!";
        header("location:index.php?status=".$status."");
        exit();
    }

    elseif ($signup == 1) {
        $status = "O email para a verificação de conta foi enviado!";
        header("location:login.php?status=".$status."");
        exit();
    }

    elseif ($recovery == 1) {
        $status = "O email com o código para a redefinição de senha foi enviado!";
        header("location:recovery.php?status=".$status."");
        exit();
    }

    else{
        header("location:index.php?status=O envio falhou!");
        exit();
    }

?>