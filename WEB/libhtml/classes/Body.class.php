<?php

    // Declaração da classe Body
    class Body extends ObjPrincipal{
        private $totalItens = [];
        private $scripts = [];

        function __construct($class=null){
            parent::__construct(null,$class);
        }

        // Método para adicionar itens ao Body
        function addItens($novoItem){
            $this->totalItens[] = $novoItem;
        }
        function addScript($src=null,$integrity=null,$crossorigin=null){
            $newScript = "<script ";
            if ($src != null){
                $newScript .= " src=\"$src\"";
            }
            if ($integrity != null){
                $newScript .= " integraty=\"$integrity\"";
            }
            if ($crossorigin != null){
                $newScript .= " crossorigin=\"$crossorigin\"";
            }

            $newScript .= "></script>";

            $this->scripts[] = $newScript;
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

            foreach($this->scripts as $itens){
                $resultado .= $itens; 
             }

            $resultado = $resultado."</body>";
        
            return $resultado;
        }
    } 

?>
