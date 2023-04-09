<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/classes/ServicoDAO.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/barbearia_xavier/database/DBQuery.class.php';


class Servico{
    
    private $idServico;
    private $nome;
    private $preco;
    private $descricao;
    
    private $servicoDAO;
    
    
    function  __construct( $idServico, $nome, $preco, $descricao ){
         $this->setIdServico($idServico);
         $this->setNome($nome);
         $this->setPreco($preco);
         $this->setDescricao($descricao);
         
         $this->servicoDAO = new ServicoDAO();
    }
    
    public function toArray() {
        return (
            array(
                $this->getIdServico(),
                $this->getNome(),
                $this->getPreco(),
                $this->getDescricao()
            )
        );
    }

    public function save(){
        if( $this->getIdServico() == 0){
            $this->servicoDAO->create($this);
        }else {
            $this->servicoDAO->update($this);
        }
    }
    
    public function read(){
        $this->servicoDAO->read($this);
    }
    
    public function delete(){
        $this->servicoDAO->delete($this);
    }
    
    public function getIdServico(){
        return $this->idServico;
    }

    public function listAll(){
        return ($this->servicoDAO->listAll());
    }
    public function listAllJSon(){
        $rs     = $this->servicoDAO->listAll();
        $lines  = array();
        while($line = mysqli_fetch_assoc($rs)) {
            $lines[] = $line;
        }
        echo (json_encode($lines));
    }
    
    public function setIdServico($idServico){
        $this->idServico = $idServico;
        return $this;
    }
    
    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }

    public function getPreco(){
        return $this->preco;
    }

    public function setPreco($preco){
        $this->preco = $preco;
        return $this;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
        return $this;
    }

}
