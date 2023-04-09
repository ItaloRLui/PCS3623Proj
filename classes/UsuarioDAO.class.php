<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/database/DBQuery.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/classes/Usuario.class.php';

class UsuarioDAO {
    
    private  $dbQuery;
    
    function __construct() {
        
        $tableName  = "barbearia.usuario";
        $fields     = "idUsuario, nome, email, senha, telefone, permissao, chave, verificada";
        $keyField   = "idUsuario";
        
        $this->dbQuery = new DBQuery($tableName, $fields, $keyField);
    }
    
    public function create( Usuario $usuario ){
        $this->dbQuery->insert( $usuario->toArray() );
    }
    
    public function read( Usuario $usuario ){
        // return ( $this->dbQuery->select(" idUsuario ='". $usuario->getIdUsuario() ."'") );
        return ( $this->dbQuery->selectByField( "email", $usuario->getEmail() ));
    }
    
    public function select( $where ){
        return ( $this->dbQuery->select($where) );
    }
    
    public function update( Usuario $usuario ){
        $this->dbQuery->update( $usuario->toArray() );
    }
    
    public function delete( Usuario $usuario ){
        $this->dbQuery->delete($usuario->getIdUsuario());
    }
    
    public function listAll (){
        return ( $this->dbQuery->select("") );
    }
    
    public function getUsuario(){
        return $this->usuario;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
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