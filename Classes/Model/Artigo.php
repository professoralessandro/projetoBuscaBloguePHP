<?php
class Artigo
{
    //ATRIBUTOS
    private $id;
    private $idUsuario;
    private $titulo;
    private $link;
    //ATRIBUTOS
	
    //CONSTRUTOR
    public function __construct($id ="", $idUsuario ="", $titulo ="", $link ="")
    {
        $this->id = $id;
        $this->idUsuario = $idUsuario;
        $this->titulo = $titulo;
        $this->link = $link;
    }
    //CONSTRUTOR
        
    //PROPRIEDADES
    public function getId() {
        return $this->id;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getLink() {
        return $this->link;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setLink($link) {
        $this->link = $link;
    }
    //PROPRIEDADES
}//class
?>