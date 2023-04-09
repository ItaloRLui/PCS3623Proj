<?php

    session_start();

    include_once 'database\dbConexao.php';

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT );

    $data_start = str_replace('/', '-', $dados['start']);
    $data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));

    $query_agendamento = "INSERT INTO atendimento (cliente, barbeiro, servico, horario) VALUES (:cliente, :barbeiro, :servico, :horario)";

    $insert_agendamento = $conn->prepare($query_agendamento);
    $insert_agendamento->bindParam(':cliente', $dados['cliente']);
    $insert_agendamento->bindParam(':barbeiro', $dados['barbeiro']);
    $insert_agendamento->bindParam(':servico', $dados['servico']);
    $insert_agendamento->bindParam(':horario', $data_start_conv);

    if($insert_agendamento->execute()){
        $retorna = ['sit' => true, 'msg' => '<div class="alert alert-success role="alert"> Agendado com sucesso! </div>'];   
        $_SESSION['msg'] = '<div class="alert alert-success role="alert"> Agendado com sucesso! </div>';
    }else{
        $retorna = ['sit' => true, 'msg' => '<div class="alert alert-danger role="alert"> Erro: Agendamento falhou! </div>'];
    }

    header('Content-Type: application/json');
    echo json_encode($retorna);
?>