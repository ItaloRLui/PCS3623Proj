<?php

    include 'database\dbConexao.php';

    $query_agendamentos = "SELECT idAtendimento, cliente, barbeiro, servico, horario FROM atendimento";

    $resultados_agendamentos = $conn->prepare($query_agendamentos);

    $resultados_agendamentos->execute();

    $agendamentos = [];

    while($row_agendamentos = $resultados_agendamentos->fetch(PDO::FETCH_ASSOC)){
        $idAtendimento = $row_agendamentos['idAtendimento'];
        $cliente = $row_agendamentos['cliente'];
        $barbeiro = $row_agendamentos['barbeiro'];
        $servico = $row_agendamentos['servico'];
        $horario = $row_agendamentos['horario'];
    
        $agendamentos[] = [
            'id' => $idAtendimento,
            'title' => "$cliente\n$barbeiro-$servico ",
            'start' => $horario
        ];
    
    }

    echo json_encode($agendamentos);


?>