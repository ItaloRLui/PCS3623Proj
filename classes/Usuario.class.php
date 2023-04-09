<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/classes/UsuarioDAO.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/database/DBQuery.class.php';


class Usuario{
    
    private $idUsuario;
    private $nome;
    private $email;
    private $senha;
    private $telefone;
    private $permissao;
    private $chave;
    private $verificada;
    
    private $usuarioDAO;
    
    
    function  __construct( $idUsuario, $nome, $email, $senha, $telefone, $permissao, $chave, $verificada ){
         $this->setIdUsuario($idUsuario);
         $this->setNome($nome);
         $this->setEmail($email);
         $this->setSenha($senha);
         $this->setTelefone($telefone);
         $this->setPermissao($permissao);
         $this->setChave($chave);
         $this->setVerificada($verificada);
         
         $this->usuarioDAO = new UsuarioDAO();
    }
    
    
    public function toArray() {
        return (
            array(
                $this->getIdUsuario(),
                $this->getNome(),
                $this->getEmail(),
                $this->getSenha(),
                $this->getTelefone(),
                $this->getPermissao(),
                $this->getChave(),
                $this->getVerificada()
            )
        );
    }

    public function save(){
        if( $this->getIdUsuario() == 0){
            $this->usuarioDAO->create($this);
        }else {
            $this->usuarioDAO->update($this);
        }
    }
    
    public function checkLogin(){
        // Limpar o SQLInjection do Email e Senha
        $dbQuery = new DBQuery("", "", "");
        $this->email = $dbQuery->clearSQLInjection($this->email);
        $this->senha = $dbQuery->clearSQLInjection($this->senha);
        
        // Verificar quantas linhas um Select por Email e Senha realiza 
        $resultSet =  $this->usuarioDAO->select(" email='".$this->email."' and senha='".$this->senha."' ");
        $qtdLines  =  mysqli_num_rows($resultSet);
        
        // Pegar o idUsuario da 1ª linha retornada do banco
        $lines =  mysqli_fetch_assoc($resultSet);
        $idUsuario = $lines["idUsuario"];
        

       
        // retorna aonde a função foi chamada TRUE ou FALSE para se tem mais de 0 linhas
        if ( $qtdLines > 0 ){
            // Gravar o IdUsuario e o Email em uma Sessão
            session_start();
            $_SESSION["idUsuario"] =  $idUsuario;
            $_SESSION["email"]     =  $this->email;
            return(true);
        }else{
            // Gravar o IdUsuario e o Email em uma Sessão
            session_start();
            unset($_SESSION["idUsuario"]);
            unset($_SESSION["email"]);
            return(false);
        }
    }
    
    public function read(){
        $this->usuarioDAO->read($this);
    }
    
    public function delete(){
        $this->usuarioDAO->delete($this);
    }
    
    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function listAll(){
        return ($this->usuarioDAO->listAll());
    }
    public function listAllJSon(){
        $rs     = $this->usuarioDAO->listAll();
        $lines  = array();
        while($line = mysqli_fetch_assoc($rs)) {
            $lines[] = $line;
        }
        echo (json_encode($lines));
    }
    
    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
        return $this;
    }
    
    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
        return $this;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
        return $this;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
        return $this;
    }
    
    public function getPermissao(){
        return $this->permissao;
    }

    public function setPermissao($permissao){
        $this->permissao = $permissao;
        return $this;
    }
    
    public function getChave(){
        return $this->chave;
    }

    public function setChave($chave){
        $this->chave = $chave;
        return $this;
    }

    public function getVerificada(){
        return $this->verificada;
    }

    public function setVerificada($verificada){
        $this->verificada = $verificada;
        return $this;
    }

}
