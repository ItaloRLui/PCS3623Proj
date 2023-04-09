<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/classes/AtendimentoDAO.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/database/DBQuery.class.php';


class Servico{
    
    private $idAtendimento;
    private $cliente;
    private $barbeiro;
    private $servico;
    private $horario;
    
    private $atendimentoDAO;
    
    
    function  __construct( $idAtendimento, $cliente, $barbeiro, $servico, $horario ){
         $this->setIdAtendimento($idAtendimento);
         $this->setCliente($cliente);
         $this->setBarbeiro($barbeiro);
         $this->setServico($servico);
         $this->setHorario($horario);
         
         $this->atendimentoDAO = new AtendimentoDAO();
    }
    
    public function toArray() {
        return (
            array(
                $this->getIdAtendimento(),
                $this->getCliente(),
                $this->getBarbeiro(),
                $this->getServico(),
                $this->getHorario()
            )
        );
    }

    public function save(){
        if( $this->getIdAtendimento() == 0){
            $this->atendimentoDAO->create($this);
        }else {
            $this->atendimentoDAO->update($this);
        }
    }
    
    public function read(){
        $this->atendimentoDAO->read($this);
    }
    
    public function delete(){
        $this->atendimentoDAO->delete($this);
    }
    
    public function getIdAtendimento(){
        return $this->idAtendimento;
    }

    public function listAll(){
        return ($this->atendimentoDAO->listAll());
    }
    public function listAllJSon(){
        $rs     = $this->atendimentoDAO->listAll();
        $lines  = array();
        while($line = mysqli_fetch_assoc($rs)) {
            $lines[] = $line;
        }
        echo (json_encode($lines));
    }
    
    public function setIdAtendimento($idAtendimento){
        $this->idAtendimento = $idAtendimento;
        return $this;
    }
    
    public function getCliente(){
        return $this->cleinte;
    }

    public function setCliente($cliente){
        $this->cliente = $cliente;
        return $this;
    }

    public function getBarbeiro(){
        return $this->barbeiro;
    }

    public function setBarbeiro($barbeiro){
        $this->barbeiro = $barbeiro;
        return $this;
    }

    public function getServico(){
        return $this->servico;
    }

    public function setServico($servico){
        $this->servico = $servico;
        return $this;
    }
    
    public function getHorario(){
        return $this->horario;
    }

    public function setHorario($horario){
        $this->horario = $horario;
        return $this;
    }

}
