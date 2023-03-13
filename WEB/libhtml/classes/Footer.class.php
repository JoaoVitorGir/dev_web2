<?php

    class Footer extends ObjPrincipal{
        private $itens = [];

        function __construct($class=null){
            parent::__construct(null,$class);
        }

        function addItens($item){
            $this->itens[] = $item;
        }

        function __toString(){
            $resultado = "<footer ";
            if ($this->getClass() != null){
                $resultado .= "class=\"{$this->getClass()}\"";
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