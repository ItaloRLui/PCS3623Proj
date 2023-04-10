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

    $tabela = (!empty($_POST) ? $_POST['tabela'] : "");

    switch($tabela){
        case 'Agendamento':
            echo "<p class='center'>Inserindo registro na tabela '".$tabela."'...</p>";

            echo "<table class='styled-table'><tr>
                <th>Id do Paciente</th>
                <th>Id do Médico</th>
                <th>Id da Sala</th>
                <th>Id do Secretário</th>
                <th>Data</th>
                <th>Horário</th>
                <th>Descrição</th>
                <th>Confirmar</th>
            </tr>";

            echo "<tr><form name='inserirAgendamento' action='inserir.php' method='post'>
                <input type='hidden' name='tabela' value='Agendamento'>
                <th><input type='number' name='idPaciente'></th>
                <th><input type='number' name='idMedico'></th>
                <th><input type='number' name='idSala'></th>
                <th><input type='number' name='idSecretario'></th>
                <th><input type='text' name='data'></th>
                <th><input type='text' name='horario'></th>
                <th><input type='text' name='descrição'></th>
                <th><button type='submit'><img src='imagens/adicionar.png'/></button></th></form>
            </tr></table>";
            break;
        case 'Enfermeiro':
            echo "<p class='center'>Inserindo registro na tabela '".$tabela."'...</p>";

            echo "<table class='styled-table'><tr>
                <th>Id do Enfermeiro</th>
                <th>Nome</th>
                <th>CIP</th>
                <th>Telefone</th>
                <th>Confirmar</th>
            </tr>";

            echo "<tr><form name='inserirEnfermeiro' action='inserir.php' method='post'>
                <input type='hidden' name='tabela' value='Enfermeiro'>
                <th><input type='number' name='id'></th>
                <th><input type='text' name='nome'></th>
                <th><input type='text' name='CIP'></th>
                <th><input type='text' name='telefone'></th>
                <th><button type='submit'><img src='imagens/adicionar.png'/></button></th></form>
            </tr></table>";
            break;
        case 'Medico':
            echo "<p class='center'>Inserindo registro na tabela '".$tabela."'...</p>";

            echo "<table class='styled-table'><tr>
                <th>Id do Médico</th>
                <th>Nome</th>
                <th>Especialização</th>
                <th>Telefone</th>
                <th>CRM</th>
                <th>Confirmar</th>
            </tr>";

            echo "<tr><form name='inserirMedico' action='inserir.php' method='post'>
                <input type='hidden' name='tabela' value='Medico'>
                <th><input type='number' name='id'></th>
                <th><input type='text' name='nome'></th>
                <th><input type='text' name='especialização'></th>
                <th><input type='text' name='telefone'></th>
                <th><input type='text' name='CRM'></th>
                <th><button type='submit'><img src='imagens/adicionar.png'/></button></th></form>
            </tr></table>";
            break;
        case 'Paciente':
            echo "<p class='center'>Inserindo registro na tabela '".$tabela."'...</p>";

            echo "<table class='styled-table'><tr>
                <th>Id do Paciente</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Idade</th>
                <th>Contato da Família</th>
                <th>Id do Médico</th>
                <th>Id do Secretário</th>
                <th>Confirmar</th>
            </tr>";

            echo "<tr><form name='inserirPaciente' action='inserir.php' method='post'>
                <input type='hidden' name='tabela' value='Paciente'>
                <th><input type='number' name='id'></th>
                <th><input type='text' name='nome'></th>
                <th><input type='text' name='CPF'></th>
                <th><input type='text' name='idade'></th>
                <th><input type='text' name='contato_familia'></th>
                <th><input type='number' name='idMedico'></th>
                <th><input type='number' name='idSecretario'></th>
                <th><button type='submit'><img src='imagens/adicionar.png'/></button></th></form>
            </tr></table>";
            break;
        case 'Sala':
            echo "<p class='center'>Inserindo registro na tabela '".$tabela."'...</p>";

            echo "<table class='styled-table'><tr>
                <th>Id da Sala</th>
                <th>Tipo de Sala</th>
                <th>Confirmar</th>
            </tr>";

            echo "<tr><form name='inserirSala' action='inserir.php' method='post'>
                <input type='hidden' name='tabela' value='Sala'>
                <th><input type='number' name='id'></th>
                <th><input type='text' name='tipo_sala'></th>
                <th><button type='submit'><img src='imagens/adicionar.png'/></button></th></form>
            </tr></table>";
            break;
        case 'Secretario':
            echo "<p class='center'>Inserindo registro na tabela '".$tabela."'...</p>";

            echo "<table class='styled-table'><tr>
                <th>Id do Secretário</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>CPF</th>
                <th>Confirmar</th>
            </tr>";

            echo "<tr><form name='inserirSecretario' action='inserir.php' method='post'>
                <input type='hidden' name='tabela' value='Secretario'>
                <th><input type='number' name='id'></th>
                <th><input type='text' name='nome'></th>
                <th><input type='text' name='telefone'></th>
                <th><input type='text' name='CPF'></th>
                <th><button type='submit'><img src='imagens/adicionar.png'/></button></th></form>
            </tr></table>";
            break;
        case 'Medicos_enfermeiros':
            echo "<p class='center'>Inserindo registro na tabela '".$tabela."'...</p>";

            echo "<table class='styled-table'><tr>
                <th>Id do Médico</th>
                <th>Id do Enfermeiro</th>
                <th>Confirmar</th>
            </tr>";

            echo "<tr><form name='inserirMedicoenfermeiro' action='inserir.php' method='post'>
                <input type='hidden' name='tabela' value='Medicos_enfermeiros'>
                <th><input type='number' name='idMedico'></th>
                <th><input type='number' name='idEnfermeiro'></th>
                <th><button type='submit'><img src='imagens/adicionar.png'/></button></th></form>
            </tr></table>";
            break;

        default:
            echo "<p class='center'>Você não selecionou nenhuma das tabelas!</p>";
    }

?>
</br>
<div id="footer"></div>
</body>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./login.js"></script>
</html>