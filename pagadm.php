<?php
    session_start();
    if (isset($_SESSION['usuario'])){
        $nome = $_SESSION['usuario'];
        require $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/database/DBQuery.class.php';
        
        $tableName  = "barbearia.usuario";
        $fields     = "nome, verificada";
        $keyField   = "idUsuario";
        
        $dbquery1 = new DBQuery($tableName, $fields, $keyField);
        $resultSet = $dbquery1->select("nome = '$nome' AND verificada = '1' LIMIT 1;");
        
        if (mysqli_num_rows($resultSet) == 0) {
            $_SESSION['mensagemlogin'] = "Erro fatal!";
            header("location:login.php?unset=true");
            exit();
        }
        
        else {
            
            $tableName  = "barbearia.usuario";
            $fields     = "idUsuario, nome, email, telefone, permissao";
            $keyField   = "idUsuario";
            
            $dbquery2 = new DBQuery($tableName, $fields, $keyField);
            $resultSet = $dbquery2->select("nome = '$nome' LIMIT 1;");
            
            while ($linha = mysqli_fetch_assoc($resultSet)) {
                $meuid = $linha["idUsuario"];
                $_SESSION['meuid'] = $meuid;
                $nome = $linha["nome"];
                $email = $linha["email"];
                $telefone = $linha["telefone"];
                $permissao = $linha["permissao"];
            }
            
            if ($permissao == "A"){

?>

<!DOCTYPE html>
<html>
    
<head>
<meta charset='utf-8'>
<title><?php echo $nome . " | Administração da Barbearia Xavier"; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&amp;subset=latin,latin-ext'><link rel="stylesheet" href="./login.scss">
<link rel="stylesheet" type="text/css" href="pagadm.css">
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
    
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand">Barbearia Xavier</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="calendario.php" style="color:goldenrod;">Atendimentos e Horários</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="pagadm.php" style="color:honeydew;"><span class="glyphicon glyphicon-user"></span> Gerenciamento de Contas (<?php echo $nome; ?>)</a></li>
          <li><a href="index.php?unset=true" style="color:firebrick;"><span class="glyphicon glyphicon-log-out"></span>Sair</a></li>
        </ul>
      </div>
    </nav>
    
    <div id="conta">
        <table>
            
        <?php
            $tableName  = "barbearia.usuario";
            $fields     = "idUsuario, nome, email, telefone, permissao, verificada";
            $keyField   = "idUsuario";
                                   
            $dbquery3 = new DBQuery($tableName, $fields, $keyField);
            $resultSet = $dbquery3->select("1 = 1");
                                   
            echo "<tr>
                    <th>Id do Usuário</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Permissão (Adm, Funcionário, Usuário)</th>
                    <th>Verificado? (0 = Não, 1 = Sim)</th>
                    <th>Modificar Usuário</th>
                    <th>Deletar Usuário</th>
                </tr>";
            while($exibe = mysqli_fetch_assoc($resultSet)){
                echo "<tr>
                        <th>".$exibe['idUsuario']."</th>
                        <th>".$exibe['nome']."</th>
                        <th>".$exibe['email']."</th>
                        <th>".$exibe['telefone']."</th>
                        <th>".$exibe['permissao']."</th>
                        <th>".$exibe['verificada']."</th>";
                    if ($exibe['idUsuario'] != $meuid){
                        
                        echo "<th><a href='modusu.php?id=".$exibe['idUsuario']."'><img src='imagens/two.png' width='30px' length='30px'></a></th>
                              <th><a href='delusu.php?id=".$exibe['idUsuario']."'><img src='imagens/lamina-de-barbear.png' width='30px' length='30px'></a></th>";
                    }

                echo "</tr>";
            }
        ?>
            
        </table>
    </div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./login.js"></script>
    
</body>
    
</html>

<?php       }
        }
    }

else{
    header("location:index.php?unset=true&status=Erro fatal!");
    exit();
}?>