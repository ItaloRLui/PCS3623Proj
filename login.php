    <?php
      if (isset($_GET['unset'])) {
          session_unset();
      }

      if (isset($_GET['status'])) {
          $status = $_GET['status'];
          echo '<script type="text/javascript">alert("'.$status.'");</script>';
      }
    ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
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

  <script>
    
      function mostrarSenha() {
        var x = document.getElementById("pass");
        var y = document.getElementById("regpass");
        var z = document.getElementById("reregpass");
        
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
          
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
          
        if (z.type === "password") {
            z.type = "text";
        } else {
            z.type = "password";
        }
      }
      
      $('#regpass, #reregpass').on('keyup', function () {
        if ($('#regpass').val() == $('#reregpass').val()) {
            $('#verificar').html('As senhas são iguais!').css('color', 'green');     
            $('#verificar').html('As senhas são iguais!').css('color', 'green');
            $('#btn-signup').prop('disabled', false);
        }
          
        else {
            $('#verificar').html('As senhas não são iguais!').css('color', 'red');
            $('#btn-signup').prop('disabled', true);
        }
    });
      
  </script>

</head>

<body>
<!-- partial:index.partial.html -->
    
<?php session_start(); ?>
<div class="materialContainer">

   <div class="box">
       
      <a href="index.php?unset=true" style="margin-bottom:2px; color:grey;">Voltar</a>

      <div class="title">ENTRAR</div>
       
      <?php if (!empty($_SESSION['mensagemlogin'])) {
                $mensagem = $_SESSION["mensagemlogin"];
                echo '<script type="text/javascript">';
                    echo 'alert("'.$mensagem.'")';
                echo '</script>'; 
                unset($_SESSION['mensagemlogin']); }  ?>

       <form id="loginform" role="form" method="POST" action="<?php echo htmlspecialchars("loginprocess.php")?>">

          <div class="input">
             <label for="name">Usuário (Email)</label>
             <input type="email" name="name" id="name" minlength="5" required>
             <span class="spin"></span>
          </div>

          <div class="input">
             <label for="pass">Senha</label>
             <input type="password" name="pass" id="pass" minlength="5" required>
             <span class="spin"></span>
          </div>
          
          <div class="input">
             <label for="mostrar" style="font-size: 99%; color:grey; text-decoration:underline;" onclick="mostrarSenha();">Mostrar Senha</label>
          </div>

          <div class="button login">
             <button type="submit" id="btn-login" name="loginform"><span>Entrar</span> <i class="fa fa-check"></i></button>
          </div>
           
      </form>

      <a href="recovery.php" class="pass-forgot">Esqueceu sua senha?</a>

   </div>

   <div class="overbox">
      <div class="material-button alt-2"><span class="shape"></span></div>

      <div class="title">REGISTRAR</div>
       
      <?php echo "<span id='verificar' style='margin-bottom:5px; font-size:20px;'></span>";  ?>
       
      <form id="signupform" role="form" method="POST" action="<?php echo htmlspecialchars("signupprocess.php")?>">
        
          <div class="input">
             <label for="regname">Usuário (Email)</label>
             <input type="email" name="regname" id="regname" minlength="5" required>
             <span class="spin"></span>
          </div>

          <div class="input">
             <label for="regpass">Senha</label>
             <input type="password" name="regpass" id="regpass" minlength="5" required>
             <span class="spin"></span>
          </div>

          <div class="input">
             <label for="reregpass">Repetir a senha</label>
             <input type="password" name="reregpass" id="reregpass" minlength="5" required>
             <span class="spin"></span>
          </div>

          <div class="input">
             <label for="reguser">Nome</label>
             <input type="text" name="reguser" id="reguser" minlength="5" required>
             <span class="spin"></span>
          </div>

          <div class="button">
             <button type="submit" id="btn-signup" name="signupform"><span>Criar Conta</span></button>
          </div> 
          
      </form>

   </div>

</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./login.js"></script>

</body>
</html>