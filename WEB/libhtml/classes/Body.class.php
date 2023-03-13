<?php

    // Declaração da classe Body
    class Body extends ObjPrincipal{
        private $totalItens = [];

        function __construct($class=null){
            parent::__construct(null,$class);
        }

        // Método para adicionar itens ao Body
        function addItens($novoItem){
            $this->totalItens[] = $novoItem;
        }

        // Método para retornar o Body como uma string formatada em HTML
        function __toString(){
            //adiciona uma class caso tenha sido passado uma
            if ($this->getClass() != null){
                $resultado = "<body class=\"{$this->getClass()}\">";
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
