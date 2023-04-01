<?php

    class Footer extends ObjPrincipal{
        private $itens = [];

        function __construct($class=null,$id=null){
            parent::__construct($id,$class);
        }

        function addItens($item){
            $this->itens[] = $item;
        }

        function Renderizar(){
            $resultado = "<footer ";
            if ($this->getClass() != null){
                $resultado .= "class=\"{$this->getClass()}\"";
            }
            
            if ($this->getId() != null){
                $resultado .= " id=\"{$this->getId()}\"";
            }

            $resultado .= ">";

            foreach($this->itens as $item){
                $resultado .= $item;
            }

            $resultado .= "</footer>";
            return $resultado;
        }
    }
?>