<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/database/DBQuery.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/classes/Servico.class.php';

class ServicoDAO {
    
    private  $dbQuery;
    
    function __construct() {
        
        $tableName  = "barbearia.servico";
        $fields     = "idServico, nome, preco, descricao";
        $keyField   = "idServico";
        
        $this->dbQuery = new DBQuery($tableName, $fields, $keyField);
    }
    
    public function create( Servico $servico ){
        $this->dbQuery->insert( $servico->toArray() );
    }
    
    public function read( Servico $servico ){
        // return ( $this->dbQuery->select(" idServico ='". $servico->getIdServico() ."'") );
        return ( $this->dbQuery->selectByField( "nome", $servico->getNome() ));
    }
    
    public function select( $where ){
        return ( $this->dbQuery->select($where) );
    }
    
    public function update( Servico $servico ){
        $this->dbQuery->update( $servico->toArray() );
    }
    
    public function delete( Servico $servico ){
        $this->dbQuery->delete($servico->getIdServico());
    }
    
    public function listAll (){
        return ( $this->dbQuery->select("") );
    }
    
    public function getServico(){
        return $this->servico;
    }

    public function setServico($servico){
        $this->servico = $servico;
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