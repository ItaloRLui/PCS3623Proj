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
            $data         = $_POST['data'];
            $horario      = $_POST['horario'];
            $descrição    = $_POST['descrição'];
            $tableName    = "hospital.".$tabela;
            $fields     = "paciente_id, medico_id, sala_id, secretario_id, data, horario, descrição";
            $keyField   = "";
            $dbQueryAlt   = new DBQuery($tableName, $fields, $keyField);
            $resultSet    = $dbQueryAlt->updateWhere([$idPaciente, $idMedico, $idSala, $idSecretario, $data, $horario, $descrição], "paciente_id=".$idPaciente." AND medico_id=".$idMedico." AND sala_id=".$idSala." AND secretario_id=".$idSecretario."");
            
            if ($resultSet == 0){
                echo "<p class='center'>Erro ao atualizar agendamento!</p>";
            }
            else{
                echo "<p class='center'>Agendamento atualizado com sucesso!</p>";
            }
            break;
        case 'Enfermeiro':
            $id         = $_POST['id'];
            $nome       = $_POST['nome'];
            $CIP        = $_POST['CIP'];
            $telefone   = $_POST['telefone'];
            $tableName  = "hospital.".$tabela;
            $fields     = "enfermeiro_id, nome, CIP, telefone";
            $keyField   = "enfermeiro_id";
            $dbQueryAlt = new DBQuery($tableName, $fields, $keyField);
            $resultSet  = $dbQueryAlt->update([$id, $nome, $CIP, $telefone]);

            if ($resultSet == 0){
                echo "<p class='center'>Erro ao atualizar enfermeiro!</p>";
            }
            else{
                echo "<p class='center'>Enfermeiro atualizado com sucesso!</p>";
            }
            break;
        case 'Medico':
            $id             = $_POST['id'];
            $nome           = $_POST['nome'];
            $especialização = $_POST['especialização'];
            $telefone       = $_POST['telefone'];
            $CRM            = $_POST['CRM'];
            $tableName      = "hospital.".$tabela;
            $fields         = "medico_id, nome, especialização, telefone, CRM";
            $keyField       = "medico_id";
            $dbQueryAlt     = new DBQuery($tableName, $fields, $keyField);
            $resultSet      = $dbQueryAlt->update([$id, $nome, $especialização, $telefone, $CRM]);

            if ($resultSet == 0){
                echo "<p class='center'>Erro ao atualizar médico!</p>";
            }
            else{
                echo "<p class='center'>Médico atualizado com sucesso!</p>";
            }
            break;
        case 'Paciente':
            $id              = $_POST['id'];
            $nome            = $_POST['nome'];
            $CPF             = $_POST['CPF'];
            $idade           = $_POST['idade'];
            $contato_familia = $_POST['contato_familia'];
            $medico_id       = $_POST['idMedico'];
            $secretario_id   = $_POST['idSecretario'];
            $tableName  = "hospital.".$tabela;
            $fields     = "paciente_id, nome, CPF, idade, contato_familia, medico_id, secretario_id";
            $keyField   = "paciente_id";
            $dbQueryAlt = new DBQuery($tableName, $fields, $keyField);
            $resultSet  = $dbQueryAlt->update([$id, $nome, $CPF, $idade, $contato_familia, $medico_id, $secretario_id]);

            if ($resultSet == 0){
                echo "<p class='center'>Erro ao atualizar paciente!</p>";
            }
            else{
                echo "<p class='center'>Paciente atualizado com sucesso!</p>";
            }
            break;
        case 'Sala':
            $id         = $_POST['id'];
            $tipo_sala  = $_POST['tipo_sala'];
            $tableName  = "hospital.".$tabela;
            $fields     = "sala_id, tipo_sala";
            $keyField   = "sala_id";
            $dbQueryAlt = new DBQuery($tableName, $fields, $keyField);
            $resultSet  = $dbQueryAlt->update([$id, $tipo_sala]);

            if ($resultSet == 0){
                echo "<p class='center'>Erro ao atualizar sala!</p>";
            }
            else{
                echo "<p class='center'>Sala atualizada com sucesso!</p>";
            }
            break;
        case 'Secretario':
            $id         = $_POST['id'];
            $nome       = $_POST['nome'];
            $telefone   = $_POST['telefone'];
            $CPF        = $_POST['CPF'];
            $tableName  = "hospital.".$tabela;
            $fields     = "secretario_id, nome, telefone, CPF";
            $keyField   = "secretario_id";
            $dbQueryAlt = new DBQuery($tableName, $fields, $keyField);
            $resultSet  = $dbQueryAlt->update([$id, $nome, $telefone, $CPF]);

            if ($resultSet == 0){
                echo "<p class='center'>Erro ao atualizar secretário!</p>";
            }
            else{
                echo "<p class='center'>Secretário atualizado com sucesso!</p>";
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