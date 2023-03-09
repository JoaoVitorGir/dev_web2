<?php

    // Declaração da classe Body
    class Body{
        private $totalItens = [];
        private $class;

        function __construct($class=null){
            $this->class = $class;
        }

        // Método para adicionar itens ao Body
        function addItens($novoItem){
            $this->totalItens[] = $novoItem;
        }

        // Método para retornar o Body como uma string formatada em HTML
        function __toString(){
            //adiciona uma class caso tenha sido passado uma
            if ($this->class != null){
                $resultado = "<body class=\"{$this->class}\">";
            }else{
                $resultado = "<body>";
            }
            
            foreach($this->totalItens as $Item){
                $resultado = $resultado. $Item;
            }
            $resultado = $resultado."</body>";
        
            return $resultado;
        }
    } 

?>
