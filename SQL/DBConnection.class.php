<?php

class DBConnection{
  
  private $host;
  private $username;
  private $port;
  private $password;
  private $schema;
  private $charset;
  
  public function __construct(){
      
    $databaseHost   = "";
    $databaseUser   = "";
    $databasePass   = "";
    $databasePort   = "";
    $databaseSchema = "";
    $databaseCharset= "";
      
    require $_SERVER['DOCUMENT_ROOT'] . '/hospital/SQL/dbConfig.php';
    
	$this->setHost		( $databaseHost );
	$this->setUsername	( $databaseUser );
	$this->setPort		( $databasePort );
	$this->setPassword  ( $databasePass );
	$this->setSchema	( $databaseSchema );
	$this->setCharset	( $databaseCharset );
  }
  
  public function getHost(){
    return $this->host;
  }
  
  public function setHost($host){
	$this->host = $host;
  }
  
  public function getUsername(){
    return $this->username;
  }
  
  public function setUsername($username){
	$this->username = $username;
  }
  
  public function getPort(){
    return $this->port;
  }
  
  public function setPort($port){
	$this->port = $port;
  }
  
  public function getPassword(){
    return $this->password;
  }
  
  public function setPassword($password){
	$this->password = $password;
  }
  
  public function getSchema(){
    return $this->schema;
  }
  
  public function setSchema($schema){
	$this->schema = $schema;
  }
  
  public function getCharset(){
    return $this->charset;
  }
  
  public function setCharset($charset){
	$this->charset = $charset;
  }
  
  
  public function getConnection(){
    return $this->connection;
  }
  
  public function setConnection($connection){
	$this->connection = $connection;
  }
  
  public function query($sql) {
      
    $mostrarSQL = "";
    require $_SERVER['DOCUMENT_ROOT'] . '/hospital/SQL/dbConfig.php';
    
    $conexao = mysqli_connect($this->getHost(), $this->getUsername(), $this->getPassword(), $this->getSchema());
    
    if (mysqli_errno($conexao)) {
        die("Erro de Conexão! Código de erro:" . mysqli_connect_error());
    }
    
    mysqli_select_db   ( $conexao, $this->getSchema() );
    mysqli_set_charset ( $conexao, $this->getCharset() );
    
    $resultSet 	= mysqli_query($conexao, $sql) or die("Erro na Query!");
    
    return ( $resultSet );
    
  }
  
}

?>