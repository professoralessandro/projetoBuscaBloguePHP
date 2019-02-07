<?php
class Usuario
{
    //ATRIBUTOS
    private $id;
    private $usuario;
    private $senha;
    //ATRIBUTOS
        
    //CONSTRUTOR
    public function __construct($id, $usuario, $senha) {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->senha = $senha;
    }
    //CONSTRUTOR
	
    //PROPRIEDADES
    public function getId() {
        return $this->id;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }
    //PROPRIEDADES
}//class
?>