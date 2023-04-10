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
            $idPaciente   = $_POST['idPaciente'];
            $idMedico     = $_POST['idMedico'];
            $idSala       = $_POST['idSala'];
            $idSecretario = $_POST['idSecretario']; 
            $tableName    = "hospital.".$tabela;
            $fields       = "paciente_id, medico_id, sala_id, secretario_id, data, horario, descrição";
            $keyField     = "";
            $dbQuerySea   = new DBQuery($tableName, $fields, $keyField);
            $resultSet    = $dbQuerySea->select("paciente_id=".$idPaciente." AND medico_id=".$idMedico." AND sala_id=".$idSala." AND secretario_id=".$idSecretario."");
            
            echo "<p class='center'>Atualizando registro da tabela '".$tabela."'...</p>";

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

            while($exibe = mysqli_fetch_assoc($resultSet)){
                echo "<tr><th>".$exibe['paciente_id']."</th>
                <th>".$exibe['medico_id']."</th>
                <th>".$exibe['sala_id']."</th>
                <th>".$exibe['secretario_id']."</th>
                <form name='alterarAgendamento' action='alterar.php' method='post'>
                <input type='hidden' name='tabela' value='Agendamento'>
                <input type='hidden' name='idPaciente' value=".$exibe['paciente_id'].">
                <input type='hidden' name='idMedico' value=".$exibe['medico_id'].">
                <input type='hidden' name='idSala' value=".$exibe['sala_id'].">
                <input type='hidden' name='idSecretario' value=".$exibe['secretario_id'].">
                <th><input type='text' name='data' value='".$exibe['data']."'></th>
                <th><input type='text' name='horario' value='".$exibe['horario']."'></th>
                <th><input type='text' name='descrição' value='".$exibe['descrição']."'></th>
                <th><button type='submit'><img src='imagens/confirmar.png'/></button></th></form>
                </tr></table>";
            }
            break;
        case 'Enfermeiro':
            $id         = $_POST['id'];
            $tableName  = "hospital.".$tabela;
            $fields     = "enfermeiro_id, nome, CIP, telefone";
            $keyField   = "enfermeiro_id";
            $dbQuerySea = new DBQuery($tableName, $fields, $keyField);
            $resultSet  = $dbQuerySea->selectByKey($id);

            echo "<p class='center'>Atualizando registro da tabela '".$tabela."'...</p>";

            echo "<table class='styled-table'><tr>
                <th>Id do Enfermeiro</th>
                <th>Nome</th>
                <th>CIP</th>
                <th>Telefone</th>
                <th>Confirmar</th>
            </tr>";

            while($exibe = mysqli_fetch_assoc($resultSet)){
                echo "<tr><th>".$exibe['enfermeiro_id']."</th>
                <form name='alterarEnfermeiro' action='alterar.php' method='post'>
                <input type='hidden' name='tabela' value='Enfermeiro'>
                <input type='hidden' name='id' value=".$exibe['enfermeiro_id'].">
                <th><input type='text' name='nome' value='".$exibe['nome']."'></th>
                <th><input type='text' name='CIP' value='".$exibe['CIP']."'></th>
                <th><input type='text' name='telefone' value='".$exibe['telefone']."'></th>
                <th><button type='submit'><img src='imagens/confirmar.png'/></button></th></form>
                </tr></table>";
            }
            break;
        case 'Medico':
            $id         = $_POST['id'];
            $tableName  = "hospital.".$tabela;
            $fields     = "medico_id, nome, especialização, telefone, CRM";
            $keyField   = "medico_id";
            $dbQuerySea = new DBQuery($tableName, $fields, $keyField);
            $resultSet  = $dbQuerySea->selectByKey($id);

            echo "<p class='center'>Atualizando registro da tabela '".$tabela."'...</p>";

            echo "<table class='styled-table'><tr>
                <th>Id do Médico</th>
                <th>Nome</th>
                <th>Especialização</th>
                <th>Telefone</th>
                <th>CRM</th>
                <th>Confirmar</th>
            </tr>";

            while($exibe = mysqli_fetch_assoc($resultSet)){
                echo "<tr><th>".$exibe['medico_id']."</th>
                <form name='alterarMedico' action='alterar.php' method='post'>
                <input type='hidden' name='tabela' value='Medico'>
                <input type='hidden' name='id' value=".$exibe['medico_id'].">
                <th><input type='text' name='nome' value='".$exibe['nome']."'></th>
                <th><input type='text' name='especialização' value='".$exibe['especialização']."'></th>
                <th><input type='text' name='telefone' value='".$exibe['telefone']."'></th>
                <th><input type='text' name='CRM' value='".$exibe['CRM']."'></th>
                <th><button type='submit'><img src='imagens/confirmar.png'/></button></th></form>
                </tr></table>";
            }
            break;
        case 'Paciente':
            $id         = $_POST['id'];
            $tableName  = "hospital.".$tabela;
            $fields     = "paciente_id, nome, CPF, idade, contato_familia, medico_id, secretario_id";
            $keyField   = "paciente_id";
            $dbQuerySea = new DBQuery($tableName, $fields, $keyField);
            $resultSet  = $dbQuerySea->selectByKey($id);

            echo "<p class='center'>Atualizando registro da tabela '".$tabela."'...</p>";

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

            while($exibe = mysqli_fetch_assoc($resultSet)){
                echo "<tr><th>".$exibe['paciente_id']."</th>
                <form name='alterarPaciente' action='alterar.php' method='post'>
                <input type='hidden' name='tabela' value='Paciente'>
                <input type='hidden' name='id' value=".$exibe['paciente_id'].">
                <th><input type='text' name='nome' value='".$exibe['nome']."'></th>
                <th><input type='text' name='CPF' value='".$exibe['CPF']."'></th>
                <th><input type='text' name='idade' value='".$exibe['idade']."'></th>
                <th><input type='text' name='contato_familia' value='".$exibe['contato_familia']."'></th>
                <th><input type='number' name='idMedico' value='".$exibe['medico_id']."'></th>
                <th><input type='number' name='idSecretario' value='".$exibe['secretario_id']."'></th>
                <th><button type='submit'><img src='imagens/confirmar.png'/></button></th></form>
                </tr></table>";
            }
            break;
        case 'Sala':
            $id         = $_POST['id'];
            $tableName  = "hospital.".$tabela;
            $fields     = "sala_id, tipo_sala";
            $keyField   = "sala_id";
            $dbQuerySea = new DBQuery($tableName, $fields, $keyField);
            $resultSet  = $dbQuerySea->selectByKey($id);

            echo "<p class='center'>Atualizando registro da tabela '".$tabela."'...</p>";

            echo "<table class='styled-table'><tr>
                <th>Id da Sala</th>
                <th>Tipo de Sala</th>
                <th>Confirmar</th>
            </tr>";

            while($exibe = mysqli_fetch_assoc($resultSet)){
                echo "<tr><th>".$exibe['sala_id']."</th>
                <form name='alterarSala' action='alterar.php' method='post'>
                <input type='hidden' name='tabela' value='Sala'>
                <input type='hidden' name='id' value=".$exibe['sala_id'].">
                <th><input type='text' name='tipo_sala' value='".$exibe['tipo_sala']."'></th>
                <th><button type='submit'><img src='imagens/confirmar.png'/></button></th></form>
                </tr></table>";
            }
            break;
        case 'Secretario':
            $id         = $_POST['id'];
            $tableName  = "hospital.".$tabela;
            $fields     = "secretario_id, nome, telefone, CPF";
            $keyField   = "secretario_id";
            $dbQuerySea = new DBQuery($tableName, $fields, $keyField);
            $resultSet  = $dbQuerySea->selectByKey($id);

            echo "<p class='center'>Atualizando registro da tabela '".$tabela."'...</p>";

            echo "<table class='styled-table'><tr>
                <th>Id do Secretário</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>CPF</th>
                <th>Confirmar</th>
            </tr>";

            while($exibe = mysqli_fetch_assoc($resultSet)){
                echo "<tr><th>".$exibe['secretario_id']."</th>
                <form name='alterarSecretario' action='alterar.php' method='post'>
                <input type='hidden' name='tabela' value='Secretario'>
                <input type='hidden' name='id' value=".$exibe['secretario_id'].">
                <th><input type='text' name='nome' value='".$exibe['nome']."'></th>
                <th><input type='text' name='telefone' value='".$exibe['telefone']."'></th>
                <th><input type='text' name='CPF' value='".$exibe['CPF']."'></th>
                <th><button type='submit'><img src='imagens/confirmar.png'/></button></th></form>
                </tr></table>";
            }
            break;
        case 'Medico_enfermeiro':
            echo "<p class='center'>Você não pode alterar uma relação entre médico e enfermeiro, somente deletá-la ou criar outra!</p>";
            break;

        default:
            echo "<p class='center'>Você não selecionou um registro de uma das tabelas!</p>";
    }

?>
</br>
<div id="footer"></div>
</body>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./login.js"></script>
</html>