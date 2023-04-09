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
            $fields     = "nome, email, telefone, permissao";
            $keyField   = "idUsuario";
            
            $dbquery2 = new DBQuery($tableName, $fields, $keyField);
            $resultSet = $dbquery2->select("nome = '$nome' LIMIT 1;");
            
            while ($linha = mysqli_fetch_assoc($resultSet)) {
                $email = $linha["email"];
                $telefone = $linha["telefone"];
                $permissao = $linha["permissao"];
            }
            
            if ($permissao == "U"){

?>

<!DOCTYPE html>
<html>
    
<head>
<meta charset='utf-8'>
<title><?php echo $nome . " | Barbearia Xavier"; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&amp;subset=latin,latin-ext'><link rel="stylesheet" href="./login.scss">
<link rel="stylesheet" type="text/css" href="pagusuario.css">
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
          <li><a href="pagusuario.php" style="color:honeydew;"><span class="glyphicon glyphicon-user"></span> Minha Conta (<?php echo $nome; ?>)</a></li>
          <li><a href="index.php?unset=true" style="color:firebrick;"><span class="glyphicon glyphicon-log-out"></span>Sair</a></li>
        </ul>
      </div>
    </nav>
    
    <div id="conta">
    
        <div class="materialContainer">

           <div class="box">

               <div class="title">Alterar Dados</div><br/>

               <?php if (!empty($_SESSION['mensagemaccount'])) {
                        $mensagem = $_SESSION['mensagemaccount'];
                        echo "<span style='color:red; margin-bottom:5px; font-size:15px;'>".$mensagem."</span>"; }  ?>
               
               <form id="accountform" role="form" method="POST" action="<?php echo htmlspecialchars("accountprocess.php")?>">

                  <div class="input">
                     <label for="nome">Nome</label>
                     <input type="text" name="nome" id="nome" minlength="5" required>
                     <span class="spin"></span>
                  </div>
                   
                   <div class="input">
                     <label for="email">Email</label>
                     <input type="email" name="email" id="email" minlength="5" required>
                     <span class="spin"></span>
                  </div>
                   
                   <div class="input">
                     <label for="email">Senha</label>
                     <input type="text" name="senha" id="senha" minlength="5" required>
                     <span class="spin"></span>
                  </div>
                   
                   <div class="input">
                     <label for="telefone">Telefone</label>
                     <input type="text" name="telefone" id="telefone" minlength="5" required>
                     <span class="spin"></span>
                  </div>

                  <div class="button login">
                     <button type="submit" id="btn-login" name="accountform"><span>Alterar</span> <i class="fa fa-check"></i></button>
                  </div>

              </form>

           </div>

           <div class="overbox">
              <div class="material-button alt-2"><span class="shape"></span></div>

              <div class="title">Deletar Conta (Cuidado, esta operação NÃO PODE ser desfeita!)</div>

              <form id="deleteform" role="form" method="POST" action="<?php echo htmlspecialchars("accountprocess.php")?>">

                  <div class="input">
                     <label for="senha">Insira sua Senha</label>
                     <input type="password" name="senha" id="senha" minlength="5" required>
                     <span class="spin"></span>
                  </div>

                  <div class="button">
                     <button type="submit" id="btn-signup" name="deleteform"><span>Deletar Conta</span></button>
                  </div> 

              </form>

           </div>

        </div>

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