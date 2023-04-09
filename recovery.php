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
  <title>Recuperação de Senha</title>
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
<!-- partial:index.partial.html -->
    
<?php
    session_start();
?>

<div class="materialContainer">

   <div class="box">
       
       <a href="login.php?unset=true" style="margin-bottom:10px; color:grey;">Voltar</a><br/>

       <div class="title">Recuperação de Senha</div><br/>
       
       <?php if (!empty($_SESSION['mensagemrecovery'])) {
                $mensagem = $_SESSION['mensagemrecovery'];
                echo "<span style='color:red; margin-bottom:5px; font-size:15px;'>".$mensagem."</span>"; }  ?>

       <form id="loginform" role="form" method="POST" action="<?php echo htmlspecialchars("recoveryprocess.php")?>">

          <div class="input">
             <label for="email">Email</label>
             <input type="email" name="email" id="email" minlength="5" required>
             <span class="spin"></span>
          </div>

          <div class="button login">
             <button type="submit" id="btn-login" name="recoveryform"><span>Continuar</span> <i class="fa fa-check"></i></button>
          </div>
           
      </form>

   </div>

</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./login.js"></script>

</body>
</html>