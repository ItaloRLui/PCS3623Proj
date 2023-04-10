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

<div id="consCenter"><br/><form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    <label for="consulta">Consultar:</label>
    <select id="consulta" name="consulta">
        <option value="">---ESCOLHA UMA TABELA---</option>
        <option value="Agendamento">Agendamentos</option>
        <option value="Enfermeiro">Enfermeiros</option>
        <option value="Medico">Médicos</option>
        <option value="Paciente">Pacientes</option>
        <option value="Sala">Salas</option>
        <option value="Secretario">Secretários</option>
        <option value="Medicos_enfermeiros">Médicos-Enfermeiros</option>
    </select>
    <input type="submit" name="procurar" value="Realizar Consulta">
</form></div>

<div id="tableCons">
    <table>
        
    <?php
        require $_SERVER['DOCUMENT_ROOT'] . '/hospital/SQL/DBQuery.class.php';

        $tabela = (!empty($_POST) ? $_POST['consulta'] : "");

        switch($tabela){
            case 'Agendamento':
                $tableName  = "hospital.".$tabela;
                $fields     = "paciente_id, medico_id, sala_id, secretario_id, data, horario, descrição";
                $keyField   = "";
                $dbquery3   = new DBQuery($tableName, $fields, $keyField);
                $resultSet  = $dbquery3->select("1 = 1");

                echo "<table class='styled-table'><tr>
                    <th>Id do Paciente</th>
                    <th>Id do Médico</th>
                    <th>Id da Sala</th>
                    <th>Id do Secretário</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Descrição</th>
                    <th>Atualizar</th>
                    <th>Deletar</th>
                </tr>";

                while($exibe = mysqli_fetch_assoc($resultSet)){
                    echo "<tr>
                            <th>".$exibe['paciente_id']."</th>
                            <th>".$exibe['medico_id']."</th>
                            <th>".$exibe['sala_id']."</th>
                            <th>".$exibe['secretario_id']."</th>
                            <th>".$exibe['data']."</th>
                            <th>".$exibe['horario']."</th>
                            <th>".$exibe['descrição']."</th>
                            <th><form name='atualizarAgendamento' action='atualizar.php' method='post'>
                            <input type='hidden' name='tabela' value='Agendamento'>
                            <input type='hidden' name='idPaciente' value=".$exibe['paciente_id'].">
                            <input type='hidden' name='idMedico' value=".$exibe['medico_id'].">
                            <input type='hidden' name='idSala' value=".$exibe['sala_id'].">
                            <input type='hidden' name='idSecretario' value=".$exibe['secretario_id'].">
                            <button type='submit'><img src='imagens/modificar.png'/></button></form></th>
                            <th><form name='deletarAgendamento' action='deletar.php' method='post'>
                            <input type='hidden' name='tabela' value='Agendamento'>
                            <input type='hidden' name='idPaciente' value=".$exibe['paciente_id'].">
                            <input type='hidden' name='idMedico' value=".$exibe['medico_id'].">
                            <input type='hidden' name='idSala' value=".$exibe['sala_id'].">
                            <input type='hidden' name='idSecretario' value=".$exibe['secretario_id'].">
                            <button type='submit'><img src='imagens/deletar.png'/></button></form></th>
                        </tr>";
                }
                echo "</table>";
                echo "<div class='center'><form name='cadastrarAgendamento' action='cadastrar.php' method='post'>
                <input type='hidden' name='tabela' value='".$tabela."'>
                <button type='submit'><img src='imagens/adicionar.png'/></button></form></div>";
                break;
            case 'Enfermeiro':
                $tableName  = "hospital.".$tabela;
                $fields     = "enfermeiro_id, nome, CIP, telefone";
                $keyField   = "enfermeiro_id";
                $dbquery3   = new DBQuery($tableName, $fields, $keyField);
                $resultSet  = $dbquery3->select("1 = 1");

                echo "<table class='styled-table'><tr>
                    <th>Id do Enfermeiro</th>
                    <th>Nome</th>
                    <th>CIP</th>
                    <th>Telefone</th>
                    <th>Atualizar</th>
                    <th>Deletar</th>
                </tr>";

                while($exibe = mysqli_fetch_assoc($resultSet)){
                    echo "<tr>
                            <th>".$exibe['enfermeiro_id']."</th>
                            <th>".$exibe['nome']."</th>
                            <th>".$exibe['CIP']."</th>
                            <th>".$exibe['telefone']."</th>
                            <th><form name='atualizarEnfermeiro' action='atualizar.php' method='post'>
                            <input type='hidden' name='tabela' value='Enfermeiro'>
                            <input type='hidden' name='id' value=".$exibe['enfermeiro_id'].">
                            <button type='submit'><img src='imagens/modificar.png'/></button></form></th>
                            <th><form name='deletarEnfermeiro' action='deletar.php' method='post'>
                            <input type='hidden' name='tabela' value='Enfermeiro'>
                            <input type='hidden' name='id' value=".$exibe['enfermeiro_id'].">
                            <button type='submit'><img src='imagens/deletar.png'/></button></form></th>
                        </tr>";
                }
                echo "</table>";
                echo "<div class='center'><form name='cadastrarEnfermeiro' action='cadastrar.php' method='post'>
                <input type='hidden' name='tabela' value='".$tabela."'>
                <button type='submit'><img src='imagens/adicionar.png'/></button></form></div>";
                break;
            case 'Medico':
                $tableName  = "hospital.".$tabela;
                $fields     = "medico_id, nome, especialização, telefone, CRM";
                $keyField   = "medico_id";
                $dbquery3   = new DBQuery($tableName, $fields, $keyField);
                $resultSet  = $dbquery3->select("1 = 1");

                echo "<table class='styled-table'><tr>
                    <th>Id do Médico</th>
                    <th>Nome</th>
                    <th>Especialização</th>
                    <th>Telefone</th>
                    <th>CRM</th>
                    <th>Atualizar</th>
                    <th>Deletar</th>
                </tr>";

                while($exibe = mysqli_fetch_assoc($resultSet)){
                    echo "<tr>
                            <th>".$exibe['medico_id']."</th>
                            <th>".$exibe['nome']."</th>
                            <th>".$exibe['especialização']."</th>
                            <th>".$exibe['telefone']."</th>
                            <th>".$exibe['CRM']."</th>
                            <th><form name='atualizarMedico' action='atualizar.php' method='post'>
                            <input type='hidden' name='tabela' value='Medico'>
                            <input type='hidden' name='id' value=".$exibe['medico_id'].">
                            <button type='submit'><img src='imagens/modificar.png'/></button></form></th>
                            <th><form name='deletarMedico' action='deletar.php' method='post'>
                            <input type='hidden' name='tabela' value='Medico'>
                            <input type='hidden' name='id' value=".$exibe['medico_id'].">
                            <button type='submit'><img src='imagens/deletar.png'/></button></form></th>
                        </tr>";
                }
                echo "</table>";
                echo "<div class='center'><form name='cadastrarMedico' action='cadastrar.php' method='post'>
                <input type='hidden' name='tabela' value='".$tabela."'>
                <button type='submit'><img src='imagens/adicionar.png'/></button></form></div>";
                break;
            case 'Paciente':
                $tableName  = "hospital.".$tabela;
                $fields     = "paciente_id, nome, CPF, idade, contato_familia, medico_id, secretario_id";
                $keyField   = "paciente_id";
                $dbquery3   = new DBQuery($tableName, $fields, $keyField);
                $resultSet  = $dbquery3->select("1 = 1");

                echo "<table class='styled-table'><tr>
                    <th>Id do Paciente</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Idade</th>
                    <th>Contato da Família</th>
                    <th>Id do Médico</th>
                    <th>Id do Secretário</th>
                    <th>Atualizar</th>
                    <th>Deletar</th>
                </tr>";

                while($exibe = mysqli_fetch_assoc($resultSet)){
                    echo "<tr>
                            <th>".$exibe['paciente_id']."</th>
                            <th>".$exibe['nome']."</th>
                            <th>".$exibe['CPF']."</th>
                            <th>".$exibe['idade']."</th>
                            <th>".$exibe['contato_familia']."</th>
                            <th>".$exibe['medico_id']."</th>
                            <th>".$exibe['secretario_id']."</th>
                            <th><form name='atualizarPaciente' action='atualizar.php' method='post'>
                            <input type='hidden' name='tabela' value='Paciente'>
                            <input type='hidden' name='id' value=".$exibe['paciente_id'].">
                            <button type='submit'><img src='imagens/modificar.png'/></button></form></th>
                            <th><form name='deletarPaciente' action='deletar.php' method='post'>
                            <input type='hidden' name='tabela' value='Paciente'>
                            <input type='hidden' name='id' value=".$exibe['paciente_id'].">
                            <button type='submit'><img src='imagens/deletar.png'/></button></form></th>
                        </tr>";
                }
                echo "</table>";
                echo "<div class='center'><form name='cadastrarPaciente' action='cadastrar.php' method='post'>
                <input type='hidden' name='tabela' value='".$tabela."'>
                <button type='submit'><img src='imagens/adicionar.png'/></button></form></div>";
                break;
            case 'Sala':
                $tableName  = "hospital.".$tabela;
                $fields     = "sala_id, tipo_sala";
                $keyField   = "sala_id";
                $dbquery3   = new DBQuery($tableName, $fields, $keyField);
                $resultSet  = $dbquery3->select("1 = 1");

                echo "<table class='styled-table'><tr>
                    <th>Id da Sala</th>
                    <th>Tipo da Sala</th>
                    <th>Atualizar</th>
                    <th>Deletar</th>
                </tr>";

                while($exibe = mysqli_fetch_assoc($resultSet)){
                    echo "<tr>
                            <th>".$exibe['sala_id']."</th>
                            <th>".$exibe['tipo_sala']."</th>
                            <th><form name='atualizarSala' action='atualizar.php' method='post'>
                            <input type='hidden' name='tabela' value='Sala'>
                            <input type='hidden' name='id' value=".$exibe['sala_id'].">
                            <button type='submit'><img src='imagens/modificar.png'/></button></form></th>
                            <th><form name='deletarSala' action='deletar.php' method='post'>
                            <input type='hidden' name='tabela' value='Sala'>
                            <input type='hidden' name='id' value=".$exibe['sala_id'].">
                            <button type='submit'><img src='imagens/deletar.png'/></button></form></th>
                        </tr>";
                }
                echo "</table>";
                echo "<div class='center'><form name='cadastrarSala' action='cadastrar.php' method='post'>
                <input type='hidden' name='tabela' value='".$tabela."'>
                <button type='submit'><img src='imagens/adicionar.png'/></button></form></div>";
                break;
            case 'Secretario':
                $tableName  = "hospital.".$tabela;
                $fields     = "secretario_id, nome, telefone, CPF";
                $keyField   = "secretario_id";
                $dbquery3   = new DBQuery($tableName, $fields, $keyField);
                $resultSet  = $dbquery3->select("1 = 1");

                echo "<table class='styled-table'><tr>
                    <th>Id do Secretário</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>CPF</th>
                    <th>Atualizar</th>
                    <th>Deletar</th>
                </tr>";

                while($exibe = mysqli_fetch_assoc($resultSet)){
                    echo "<tr>
                            <th>".$exibe['secretario_id']."</th>
                            <th>".$exibe['nome']."</th>
                            <th>".$exibe['telefone']."</th>
                            <th>".$exibe['CPF']."</th>
                            <th><form name='atualizarSecretario' action='atualizar.php' method='post'>
                            <input type='hidden' name='tabela' value='Secretario'>
                            <input type='hidden' name='id' value=".$exibe['secretario_id'].">
                            <button type='submit'><img src='imagens/modificar.png'/></button></form></th>
                            <th><form name='deletarSecretario' action='deletar.php' method='post'>
                            <input type='hidden' name='tabela' value='Secretario'>
                            <input type='hidden' name='id' value=".$exibe['secretario_id'].">
                            <button type='submit'><img src='imagens/deletar.png'/></button></form></th>
                        </tr>";
                }
                echo "</table>";
                echo "<div class='center'><form name='cadastrarSecretario' action='cadastrar.php' method='post'>
                <input type='hidden' name='tabela' value='".$tabela."'>
                <button type='submit'><img src='imagens/adicionar.png'/></button></form></div>";
                break;
            case 'Medicos_enfermeiros':
                $tableName  = "hospital.".$tabela;
                $fields     = "medico_id, enfermeiro_id";
                $keyField   = "";
                $dbquery3   = new DBQuery($tableName, $fields, $keyField);
                $resultSet  = $dbquery3->select("1 = 1");

                echo "<table class='styled-table'><tr>
                    <th>Id do Médico</th>
                    <th>Id do Enfermeiro</th>
                    <th>Atualizar</th>
                    <th>Deletar</th>
                </tr>";

                while($exibe = mysqli_fetch_assoc($resultSet)){
                    echo "<tr>
                            <th>".$exibe['medico_id']."</th>
                            <th>".$exibe['enfermeiro_id']."</th>
                            <th><form name='atualizarMedicoEnfermeiro' action='atualizar.php' method='post'>
                            <input type='hidden' name='tabela' value='Medicos_enfermeiros'>
                            <input type='hidden' name='idMedico' value=".$exibe['medico_id'].">
                            <input type='hidden' name='idEnfermeiro' value=".$exibe['enfermeiro_id'].">
                            <button type='submit'><img src='imagens/modificar.png'/></button></form></th>
                            <th><form name='deletarSala' action='deletar.php' method='post'>
                            <input type='hidden' name='tabela' value='Medicos_enfermeiros'>
                            <input type='hidden' name='idMedico' value=".$exibe['medico_id'].">
                            <input type='hidden' name='idEnfermeiro' value=".$exibe['enfermeiro_id'].">
                            <button type='submit'><img src='imagens/deletar.png'/></button></form></th>
                        </tr>";
                }
                echo "</table>";
                echo "<div class='center'><form name='cadastrarMedicoEnfermeiro' action='cadastrar.php' method='post'>
                <input type='hidden' name='tabela' value='".$tabela."'>
                <button type='submit'><img src='imagens/adicionar.png'/></button></form></div>";
                break;
            default:
                echo "</table>";
                break;
        }
    ?>
        
    <br/>
</div>

<div id="footer"></div>
</body>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./login.js"></script>
</html>