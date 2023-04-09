<?php

require $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/database/DBQuery.class.php';

$email = "";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && count($_POST) > 0){
    
    function stripit($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    if (isset($_POST['recoveryform'])){

        $email = stripit($_POST['email']);

        $tableName  = "barbearia.usuario";
        $fields     = "email";
        $keyField   = "idUsuario";

        $dbquery1 = new DBQuery($tableName, $fields, $keyField);
        $resultSet = $dbquery1->select("email = '$email' LIMIT 1;");
        $num = mysqli_num_rows($resultSet);

        if ($num == 0) {
            $_SESSION['mensagemrecovery'] = "A conta especificada não existe!";
            header("location:recovery.php");
            exit();
        }

        else {
            
            $cod = rand(100000, 999999);
            $_SESSION['email'] = $email;
            $_SESSION['cod'] = $cod;

            require $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/phpmailer/mailer.php';

            $_SESSION['mensagemrecovery'] = "Um email com o código de redefinição foi enviado para seu email!";
            
            header("location:recoverypass.php");
            exit();

        }

    }

    elseif (isset($_POST['codform'])){

        $formcod = stripit($_POST['codusu']);
        $formnovasenha = stripit($_POST['novasenha']);
        $formcodsecreto = $_SESSION['cod'];
        $formemailsecreto = $_SESSION['email'];
        
        if ($formcod == $formcodsecreto){
            
            $tableName  = "barbearia.usuario";
            $fields     = "senha";
            $keyField   = "idUsuario";

            $dbquery3 = new DBQuery($tableName, $fields, $keyField);
            $senhainserida = password_hash($formnovasenha, PASSWORD_DEFAULT);
            $a = array($senhainserida);
            
            $ativar = $dbquery3->updateWhere($a, "email = '$formemailsecreto';");
            
            $_SESSION['mensagemrecovery'] = "Sua senha foi redefinida com sucesso!";
            $_SESSION['mensagemlogin'] = "Sua senha foi redefinida com sucesso!";
            
            header("location:login.php");
            exit();
        }
        
        else{
            $_SESSION['mensagemrecovery'] = "O código inserido é inválido!";
            echo "<script type='text/javascript'>alert('O código inserido é inválido!');</script>";
            header("location:recoverypass.php");
            exit();
        }

    }

}

header("location:recovery.php");
exit;

?>