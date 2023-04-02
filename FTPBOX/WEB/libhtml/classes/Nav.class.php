<?php

    class Nav{
        private $atibutos = [];
        private $conteudos = [];

        function addAtributos($aria_label=null){
            $aria_label ? $this->atibutos[] = " aria-label = \"{$aria_label}\"" : null;
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