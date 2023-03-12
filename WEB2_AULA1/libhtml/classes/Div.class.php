<?php

    class Div extends ObjPrincipal{
        // Atributos da div
        private $class;
        private $id;
        private $itensDiv = [];

        // Construtor que recebe a classe e o id da div
        function __construct($class=null,$id = null){
            parent::__construct($id,$class);
        }

        // Método que adiciona itens à div
        function addItens($item){
            $this->itensDiv[] = $item; 
        } 

        // Método que retorna a string HTML da div
        function __toString(){
            // Inicia a string HTML com a tag de abertura da div e seus atributos
            $resultado = "<div ".($this->getId() == null ? null : "id=\"{$this->getId()}\"").
                         ($this->getClass() == null ? null : "class=\"{$this->getClass()}\"").">";
            // Itera sobre os itens adicionados à div e os adiciona à string HTML
            foreach($this->itensDiv as $item){
                $resultado = $resultado. $item;
            }
            $resultado = $resultado. "</div>";
            return $resultado;
        }
    }

?>
