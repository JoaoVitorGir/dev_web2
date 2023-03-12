<?php
    class Menu extends ObjPrincipal{
        private $itens = [];
        private $class;

        function __construct($newClass=null){
            parent::__construct(null,$newClass);
        }

        function addItens($newItem){
            $this->itens[] = $newItem;
        }

        function __toString(){
            if ($this->getClass() != null){
                $resultado = "<nav class=\"{$this->getClass()}\">";
            }else{
                $resultado = "<nav>";
            }

            foreach($this->itens as $resItem){
                $resultado = $resultado.$resItem;
            }
            $resultado = $resultado."</nav>";
            
            return $resultado;
        }
    }
?>