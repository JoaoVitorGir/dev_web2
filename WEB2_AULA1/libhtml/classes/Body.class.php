<?php

    // Declaração da classe Body
    class Body{
        private $totalItens = [];

        // Método para adicionar itens ao Body
        function addItens($novoItem){
            $this->totalItens[] = $novoItem;
        }

        // Método para retornar o Body como uma string formatada em HTML
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
