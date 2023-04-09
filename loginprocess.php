<?php

    require $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/database/DBQuery.class.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/classes/Usuario.class.php';

    $email = $senha = "";
    session_start();

    function stripit($data) { //Função para a segurança dos dados. Retira muitos caracteres especiais.
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && count($_POST) > 0){
        $email = stripit($_POST['name']);
        $senha = stripit($_POST['pass']);
        
        $tableName  = "barbearia.usuario";
        $fields     = "idUsuario, nome, email, senha, permissao, verificada";
        $keyField   = "idUsuario";
        
        $dbquery = new DBQuery($tableName, $fields, $keyField);
        $resultSet = $dbquery->select("email = '$email' LIMIT 1;");
        
        if (mysqli_num_rows($resultSet) == 0) {
            $_SESSION['mensagemlogin'] = "Usuário/email incorreto!";
            header("location:login.php");
            exit();
        }
        
        while ($linha = mysqli_fetch_assoc($resultSet)) {
            $meuid = $linha["idUsuario"];
            $nm = $linha["nome"];
            $em = $linha["email"];
            $senha_hasheada = $linha["senha"];
            $perm = $linha["permissao"];
            $verificada = $linha["verificada"];
        }

        if ($verificada == "0"){
            $_SESSION['mensagemlogin'] = "Sua conta ainda não foi ativada pelo email!";
            header("location:login.php");
            exit();
        }
        
        elseif (password_verify($senha, $senha_hasheada)) {
            
            session_unset();
            $_SESSION['logado'] = true;
            
            if (mysqli_num_rows($resultSet)==1 && $perm =='U') {
                $_SESSION['usuario'] = $nm;
                $_SESSION['meuid'] = $meuid;
                setcookie("usuario", $nm, time()+60*60*1000); #Não usar nome de cookie como única verificação, qualquer um pode mudar! Usar em preenchimento automático e etc. Ao deslogar, "logado" = false, mas o cookie permanece até expirar para preenchimentos e etc.
                header("location:calendario.php");
                exit();
            }
        
            elseif (mysqli_num_rows($resultSet)==1 && $perm =='F') {
                $_SESSION['usuario'] = $nm;
                $_SESSION['meuid'] = $meuid;
                setcookie("usuario", $nm, time()+60*60*1000);
                header("location:calendario.php");
                exit();
            }

            elseif (mysqli_num_rows($resultSet)==1 && $perm =='A') {
                $_SESSION['usuario'] = $nm;
                $_SESSION['meuid'] = $meuid;
                setcookie("usuario", $nm, time()+60*60*1000);
                header("location:calendario.php");
                exit();
            }

        }
        
        else {
            $_SESSION['mensagemlogin'] = "Senha incorreta!";
            header("location:login.php");
            exit();
        }
        
    }

?>