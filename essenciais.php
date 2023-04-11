<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hospital KIMV</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="imagens/logo_hospital.png" type="image/x-icon"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!--<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->
  <script src="./menu.js"></script>
  <link rel="stylesheet" href="./menu.css">
  <link rel="stylesheet" href="consultar.css">
  <link rel="stylesheet" href="footer.css">

    <!--Portifólio-->
  <link rel="stylesheet" href="css/base.css">  
   <link rel="stylesheet" href="css/main.css">
   <link rel="stylesheet" href="css/vendor.css">
   <link rel="stylesheet" href="css/base.css">    

   <script src="js/modernizr.js"></script>
   <script src="js/pace.min.js"></script>
   <script src="js/jquery-2.1.3.min.js"></script>
</head>

<script type="text/javascript">
    function carregarPontas(){
        $("#menu").load('menu.php');
        $("#footer").load('footer.php');
    }
</script>

<body onload="carregarPontas()">
<div id="menu"></div>
</br>
<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/hospital/SQL/DBQuery.class.php';

    echo "<p class='center'>Consulta 1: Sala nas quais um médico deve comparecer</p>";

    echo "<table class='styled-table'><tr>
        <th>Id do Médico</th>
        <th>Procurar</th>
    </tr>";

    echo "<tr><form name='consulta1' action='mostrarEssenciais.php' method='post'>
        <input type='hidden' name='consulta' value=1>
        <th><input type='number' name='idMedico'></th>
        <th><button type='submit'><img src='imagens/confirmar.png'/></button></th></form>
    </tr></table></br>";

    echo "<p class='center'>Consulta 2: Encontrar médicos com agendamento em um certo horário</p>";

    echo "<table class='styled-table'><tr>
        <th>Horário do Agendamento</th>
        <th>Procurar</th>
    </tr>";

    echo "<tr><form name='consulta2' action='mostrarEssenciais.php' method='post'>
        <input type='hidden' name='consulta' value=2>
        <th><input type='text' name='horario_agendamento' placeholder='hh:mm'></th>
        <th><button type='submit'><img src='imagens/confirmar.png'/></button></th></form>
    </tr></table></br>";

    echo "<p class='center'>Consulta 3: Encontrar salas de cirurgia ocupadas em um certo horário</p>";

    echo "<table class='styled-table'><tr>
        <th>Horário do Agendamento</th>
        <th>Procurar</th>
    </tr>";

    echo "<tr><form name='consulta3' action='mostrarEssenciais.php' method='post'>
        <input type='hidden' name='consulta' value=3>
        <th><input type='text' name='horario_agendamento' placeholder='hh:mm'></th>
        <th><button type='submit'><img src='imagens/confirmar.png'/></button></th></form>
    </tr></table></br>";
?>
</br>
<div id="footer"></div>
</body>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./login.js"></script>
</html>