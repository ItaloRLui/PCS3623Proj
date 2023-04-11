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
 
<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/hospital/SQL/DBQuery.class.php';

    $consulta = (!empty($_POST) ? $_POST['consulta'] : "");

    switch($consulta){
        case 1:
            try {
                $idMedico     = $_POST['idMedico'];
                $tableName    = "hospital.Sala INNER JOIN hospital.Agendamento ON sala.sala_id = agendamento.sala_id";
                $fields       = "Sala.sala_id";
                $keyField     = "";
                $dbQueryCon   = new DBQuery($tableName, $fields, $keyField);
                $resultSet    = $dbQueryCon->select("medico_id='".$idMedico."'");
                echo "<table class='styled-table'><tr>
                <th>Salas ocupadas pelo Médico de ID ".$idMedico."</th>
            </tr>";
                while($exibe = mysqli_fetch_assoc($resultSet)){
                    echo "<tr>
                    <th>".$exibe['sala_id']."</th>
                    </tr>";
                }
                echo "</table>";
            }
            catch (Exception $err) {
                echo "<p class='center'>Erro ao consultar salas!</p>";
            }
            break;
        case 2:
            try {
                $horario_agendamento     = $_POST['horario_agendamento'];
                $tableName               = "hospital.Medico INNER JOIN hospital.Agendamento ON medico.medico_id = agendamento.medico_id";
                $fields       = "Medico.medico_id, Medico.especialização";
                $keyField     = "";
                $dbQueryCon   = new DBQuery($tableName, $fields, $keyField);
                $resultSet    = $dbQueryCon->select("horario='".$horario_agendamento."'");
                echo "<table class='styled-table'><tr>
                <th>ID do Médico com agendamento às ".$horario_agendamento."</th>
                <th>Especialização do Médico</th>
            </tr>";
                while($exibe = mysqli_fetch_assoc($resultSet)){
                    echo "<tr>
                    <th>".$exibe['medico_id']."</th>
                    <th>".$exibe['especialização']."</th>
                    </tr>";
                }
                echo "</table>";
            }
            catch (Exception $err) {
                echo "<p class='center'>Erro ao consultar médicos!</p>";
            }
            break;
        case 3:
            try {
                $horario_agendamento     = $_POST['horario_agendamento'];
                $tableName               = "hospital.Sala INNER JOIN hospital.Agendamento ON sala.sala_id = agendamento.sala_id";
                $fields       = "Sala.sala_id";
                $keyField     = "";
                $dbQueryCon   = new DBQuery($tableName, $fields, $keyField);
                $resultSet    = $dbQueryCon->select("horario='".$horario_agendamento."' AND tipo_sala='cirurgia'");
                echo "<table class='styled-table'><tr>
                <th>Id da Sala de cirurgia ocupada às ".$horario_agendamento."</th>
            </tr>";
                while($exibe = mysqli_fetch_assoc($resultSet)){
                    echo "<tr>
                    <th>".$exibe['sala_id']."</th>
                    </tr>";
                }
                echo "</table>";
            }
            catch (Exception $err) {
                echo "<p class='center'>Erro ao consultar salas ocupadas!</p>";
            }
            break;
        default:
            echo "<p class='center'>Você não escolheu nenhuma das consultas!</p>";
    }

?>

<div id="footer"></div>
</body>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./login.js"></script>
</html>