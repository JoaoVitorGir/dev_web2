<?php

    class Span{
        private $atibutos = [];
        private $conteudos = [];

        function addAtributos($aria_hidden=null){
            $aria_hidden ? $this->atibutos[] = " aria-hidden = \"{$aria_hidden}\"" : null;
        }

        function addConteudo($conteudo){
            $this->conteudos[] = $conteudo;
        }

        function Renderizar(){
            $nav = "<nav";
            
            if ($this->atibutos != null){
                foreach($this->atibutos as $atributo){
                    $nav .= $atributo;
                }
            }
            
            $nav .= ">";

            if ($this->conteudos != null){
                foreach($this->conteudos as $conteudo){
                    $nav .= $conteudo;
                }
            }

            $nav .= "</nav>";

            return $nav;
        }
    }

?>