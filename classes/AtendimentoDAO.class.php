<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/database/DBQuery.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/classes/Atendimento.class.php';

class AtendimentoDAO {
    
    private  $dbQuery;
    
    function __construct() {
        
        $tableName  = "barbearia.atendimento";
        $fields     = "idAtendimento, cliente, barbeiro, servico, horario";
        $keyField   = "idAtendimento";
        
        $this->dbQuery = new DBQuery($tableName, $fields, $keyField);
    }
    
    public function create( Atendimento $atendimento ){
        $this->dbQuery->insert( $atendimento->toArray() );
    }
    
    public function read( Atendimento $atendimento ){
        return ( $this->dbQuery->select(" idAtendimento ='". $atendimento->getIdAtendimento() ."'") );
    }
    
    public function select( $where ){
        return ( $this->dbQuery->select($where) );
    }
    
    public function update( Atendimento $atendimento ){
        $this->dbQuery->update( $atendimento->toArray() );
    }
    
    public function delete( Atendimento $atendimento ){
        $this->dbQuery->delete($atendimento->getIdServico());
    }
    
    public function listAll (){
        return ( $this->dbQuery->select("") );
    }
    
    public function getAtendimento(){
        return $this->atendimento;
    }

    public function setAtendimento($atendimento){
        $this->atendimento = $atendimento;
        return $this;
    }

    
    public function getDbQuery(){
        return $this->dbQuery;
    }

    public function setDbQuery($dbQuery){
        $this->dbQuery = $dbQuery;
        return $this;
    }

}

?>