<?php
    class Menu{
        private $itens = [];
        private $class;

        function __construct($newClass=null){
            $this->class = $newClass;
        }

        function addItens($newItem){
            $this->itens[] = $newItem;
        }

        function __toString(){
            if ($this->class != null){
                $resultado = "<nav class=\"{$this->class}\">";
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