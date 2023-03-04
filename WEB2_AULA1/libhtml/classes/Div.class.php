<?php

    class Div{
        private $class;
        private $id;
        private $itensDiv = [];

        function addClass($class){
            $this->class = $class;
        }

        function addId($id){
            $this->id = $id;
        }

        function addItens($item){
            $this->itensDiv[] = $item; 
        } 

        function __toString(){
            $resultado = "<div id=\"$this->id\" class=\"$this->class\">";
            foreach($this->itensDiv as $item){
                $resultado = $resultado. $item;
            }
            $resultado = $resultado. "<div>";
            return $resultado;
        }


    }

?>