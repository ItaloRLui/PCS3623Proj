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
            $dbQueryDel   = new DBQuery($tableName, "", "");
            $resultSet    = $dbQueryDel->deleteWhere("paciente_id=".$idPaciente." AND medico_id=".$idMedico." AND sala_id=".$idSala." AND secretario_id=".$idSecretario."");
            
            if ($resultSet == 0){
                echo "<p class='center'>Erro ao deletar agendamento!</p>";
            }
            else{
                echo "<p class='center'>Agendamento deletado com sucesso!</p>";
            }
            break;
        case 'Enfermeiro':
            $id         = $_POST['id'];
            $tableName  = "hospital.".$tabela;
            $fields     = "enfermeiro_id, nome, CIP, telefone";
            $keyField   = "enfermeiro_id";
            $dbQueryDel = new DBQuery($tableName, $fields, $keyField);
            $resultSet  = $dbQueryDel->delete($id);

            if ($resultSet == 0){
                echo "<p class='center'>Erro ao deletar enfermeiro!</p>";
            }
            else{
                echo "<p class='center'>Enfermeiro deletado com sucesso!</p>";
            }
            break;
        case 'Medico':
            $id         = $_POST['id'];
            $tableName  = "hospital.".$tabela;
            $fields     = "medico_id, nome, especialização, telefone, CRM";
            $keyField   = "medico_id";
            $dbQueryDel = new DBQuery($tableName, $fields, $keyField);
            $resultSet  = $dbQueryDel->delete($id);

            if ($resultSet == 0){
                echo "<p class='center'>Erro ao deletar médico!</p>";
            }
            else{
                echo "<p class='center'>Médico deletado com sucesso!</p>";
            }
            break;
        case 'Paciente':
            $id         = $_POST['id'];
            $tableName  = "hospital.".$tabela;
            $fields     = "paciente_id, nome, CPF, idade, contato_familia, medico_id, secretario_id";
            $keyField   = "paciente_id";
            $dbQueryDel = new DBQuery($tableName, $fields, $keyField);
            $resultSet  = $dbQueryDel->delete($id);

            if ($resultSet == 0){
                echo "<p class='center'>Erro ao deletar paciente!</p>";
            }
            else{
                echo "<p class='center'>Paciente deletado com sucesso!</p>";
            }
            break;
        case 'Sala':
            $id         = $_POST['id'];
            $tableName  = "hospital.".$tabela;
            $fields     = "sala_id, tipo_sala";
            $keyField   = "sala_id";
            $dbQueryDel = new DBQuery($tableName, $fields, $keyField);
            $resultSet  = $dbQueryDel->delete($id);

            if ($resultSet == 0){
                echo "<p class='center'>Erro ao deletar sala!</p>";
            }
            else{
                echo "<p class='center'>Sala deletada com sucesso!</p>";
            }
            break;
        case 'Secretario':
            $id         = $_POST['id'];
            $tableName  = "hospital.".$tabela;
            $fields     = "secretario_id, nome, telefone, CPF";
            $keyField   = "secretario_id";
            $dbQueryDel = new DBQuery($tableName, $fields, $keyField);
            $resultSet  = $dbQueryDel->delete($id);

            if ($resultSet == 0){
                echo "<p class='center'>Erro ao deletar secretário!</p>";
            }
            else{
                echo "<p class='center'>Secretário deletado com sucesso!</p>";
            }
            break;
        case 'Medicos_enfermeiros':
            $idMedico     = $_POST['idMedico'];
            $idEnfermeiro = $_POST['idEnfermeiro']; 
            $tableName    = "hospital.".$tabela;
            $dbQueryDel   = new DBQuery($tableName, "", "");
            $resultSet    = $dbQueryDel->deleteWhere("medico_id=".$idMedico." AND enfermeiro_id=".$idEnfermeiro);
            
            if ($resultSet == 0){
                echo "<p class='center'>Erro ao deletar relação entre médico e enfermeiro!</p>";
            }
            else{
                echo "<p class='center'>Relação entre médico e enfermeiro deletada com sucesso!</p>";
            }
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