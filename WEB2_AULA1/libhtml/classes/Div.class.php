<?php

    class Div{
        // Atributos da div
        private $class;
        private $id;
        private $itensDiv = [];

        // Construtor que recebe a classe e o id da div
        function __construct($class=null,$id = null){
            $this->class = $class;
            $this->id = $id;
        }

        // Método que adiciona itens à div
        function addItens($item){
            $this->itensDiv[] = $item; 
        } 

        // Método que retorna a string HTML da div
        function __toString(){
            // Inicia a string HTML com a tag de abertura da div e seus atributos
            $resultado = "<div ".($this->id == null ? null : "id=\"{$this->id}\"").
                         ($this->class == null ? null : "class=\"{$this->class}\"").">";
            // Itera sobre os itens adicionados à div e os adiciona à string HTML
            foreach($this->itensDiv as $item){
                $resultado = $resultado. $item;
            }
            $resultado = $resultado. "</div>";
            return $resultado;
        }
    }

?>
