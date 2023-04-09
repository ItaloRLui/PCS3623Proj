<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Verificação de Conta</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&amp;subset=latin,latin-ext'><link rel="stylesheet" href="./login.scss">
  <link rel="shortcut icon" href="imagens/logo_barbearia_2.png" type="image/x-icon"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
</head>

<body>
    
    <?php session_start(); ?>
    
    <div class="materialContainer">

        <div class="box">
       
            <a href="login.php?unset=true" style="margin-bottom:10px; color:grey;">Voltar para o Login</a>

            <div class="title">Verificação de Conta</div><br/>
    
    <?php
    
    function stripit($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    if (isset($_GET['email']) and isset($_GET['chave'])){
        
        $email = $chave = "";
        
        $email = stripit($_GET['email']);
        $chave = stripit($_GET['chave']);
        
        require $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/database/DBQuery.class.php';
        
        $tableName  = "barbearia.usuario";
        $fields     = "email, chave, verificada";
        $keyField   = "idUsuario";
        
        $dbquery1 = new DBQuery($tableName, $fields, $keyField);
        $resultSet = $dbquery1->select("email = '$email' AND chave = '$chave' AND verificada = '0';");
        $contas = mysqli_num_rows($resultSet);
        
        $tableName  = "barbearia.usuario";
        $fields     = "verificada, chave";
        $keyField   = "idUsuario";
        $a[0]       = 1; //Verificar conta.
        $a[1]       = ""; //Limpar chave.
        
        $dbquery2 = new DBQuery($tableName, $fields, $keyField);
        
        if ($contas != 0){
            $dobanco = mysqli_fetch_assoc($resultSet);
            $email = $dobanco['email'];
            $chave = $dobanco['chave'];
            $ativar = $dbquery2->updateWhere($a, "email = '$email' AND chave = '$chave' AND verificada = 0;");
            echo '<div class="sucesso">Sua conta foi verificada! O login agora foi permitido.</div>';
        }
        
        else{
            echo '<div class="expirado">A verificação não foi possível, pois a conta foi já foi deletada, verificada ou o link expirou...</div>';
        }
        
    }
        
    else{
        echo '<div class="inválido">O link usado não existe. Por favor, utilize o link enviado ao seu endereço de email.</div>';
    }
    
    ?>
            
        </div>

    </div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./login.js"></script>
    
</body>
</html>