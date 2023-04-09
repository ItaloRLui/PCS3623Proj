<?php

require $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/database/DBQuery.class.php';

$nome = $email = $senha = $telefone = $permissao = $verificada = "";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && count($_POST) > 0){
    
    function stripit($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    if (isset($_POST['accountform'])){
        
        $nome = stripit($_POST['nome']);
        $email = stripit($_POST['email']);
        $senha = stripit($_POST['senha']);
        $telefone = stripit($_POST['telefone']);
            
        $tableName  = "barbearia.usuario";
        $fields     = "nome, email, senha, telefone";
        $keyField   = "idUsuario";

        $dbquery1 = new DBQuery($tableName, $fields, $keyField);
        $resultSet = $dbquery1->select("email = '$email' AND LIMIT 1;");
        $num = mysqli_num_rows($resultSet);

        if ($num == 0) {
            $_SESSION['mensagemaccount'] = "A conta especificada não existe!";
            header("location:pagusuario.php");
            exit();
        }

        else {
            
            $tableName  = "barbearia.usuario";
            $fields     = "nome, email, senha, telefone";
            $keyField   = "idUsuario";
            $senha_hasheada = password_hash($senha, PASSWORD_DEFAULT);
            
            $dbquery2 = new DBQuery($tableName, $fields, $keyField);
            $a = array($nome, $email, $senha, $telefone);
            $modificar = $dbquery2->updateWhere($a, "email = '$email';");

            $_SESSION['mensagemaccount'] = "Seus dados foram modificados!";
            
            header("location:pagusuario.php");
            exit();

        }

    }

    elseif (isset($_POST['deleteform'])){

        $senha = stripit($_POST['senha']);
        $nome = $_SESSION['usuario'];
        $tableName  = "barbearia.usuario";
        $fields     = "nome, senha";
        $keyField   = "idUsuario";
        $dbquery3 = new DBQuery($tableName, $fields, $keyField);
        $resultSet = $dbquery3->select("nome = '$nome' LIMIT 1;");
        $num = mysqli_num_rows($resultSet);
        $linha = mysqli_fetch_assoc($resultSet);
        $senha_hasheada = $linha['senha'];
        
        if ($num == 0){
            $_SESSION['mensagemaccount'] = "Não foi possível apagar a conta!";
            header("location:pagusuario.php");
            exit();
        }
        
        elseif (password_verify($senha, $senha_hasheada)){
            $deletar = $dbquery3->deleteWhere("nome = '$nome';");
            
            header("location:index.php?status=Sua conta foi deletada!&unset=true");
            exit();
        }
        
        else{
            $_SESSION['mensagemaccount'] = "Senha incorreta!";
            header("location:pagusuario.php");
            exit();
        }

    }
    
    elseif (isset($_POST['modform'])) {
        $id = stripit($_POST['iddel']);
        $nome = stripit($_POST['nome']);
        $email = stripit($_POST['email']);
        $telefone = stripit($_POST['telefone']);
        $permissao = stripit($_POST['permissao']);
        $verificada = stripit($_POST['verificada']);
        
        $tableName  = "barbearia.usuario";
        $fields     = "nome, email, telefone, permissao, verificada";
        $keyField   = "idUsuario";
        $a = array($nome, $email, $telefone, $permissao, $verificada);
        
        $dbquery4 = new DBQuery($tableName, $fields, $keyField);
        $resultSet = $dbquery4->updateWhere($a, "idUsuario = $id");
        
        header("location:pagadm.php");
        exit();
        
    }
    
    elseif (isset($_POST['delform'])) {
        $id = stripit($_POST['id']);
        $senha = stripit($_POST['senha']);
        $meuid = stripit($_SESSION['meuid']);
        
        $tableName  = "barbearia.usuario";
        $fields     = "senha";
        $keyField   = "idUsuario";
        
        $dbquery5 = new DBQuery($tableName, $fields, $keyField);
        $resultSet = $dbquery5->selectByKey($meuid);
        $linha = mysqli_fetch_assoc($resultSet);
        if ($senha == $linha['senha']){
            
            $deletar = $dbquery5->deleteWhere("idUsuario = '$id'");
            
        }
        
        header("location:pagadm.php");
        exit();
        
    }
    
    else{
        header("location:index.php?status=Ocorreu um erro!&unset=true");
        exit();
    }

}

else{
    header("location:index.php?status=Ocorreu um erro!&unset=true");
    exit();
}

header("location:index.php?status=Ocorreu um erro!&unset=true");
exit();
?>