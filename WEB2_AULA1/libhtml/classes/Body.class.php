<?php

    class Body{
        private $totalItens = [];

        function addItens($novoItem){
            $this->totalItens[] = $novoItem;
        }

        function __toString(){
            $resultado = "<body>";
            foreach($this->totalItens as $Item){
                $resultado = $resultado. $Item;
            }
            $resultado = $resultado."</body>";
        
            return $resultado;
        }

    } 


?>