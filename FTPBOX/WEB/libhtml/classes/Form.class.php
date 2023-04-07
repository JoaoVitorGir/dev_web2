<?php

    class Form extends ObjPrincipal {
        private $method;
        private $inputs = [];
        private $itensInput = [];

        function __construct($method,$name=null, $id=null, $class=null){
            parent::__construct($id,$class,$name);
            $this->method = $method;
        }

        function AddInput($Input){
            $this->inputs[] = $Input;
        }

        function AddItemForm($item){
            $this->itensInput[] = $item;
        }

        function Renderizar(){
            $Form = "<form method=\"{$this->method}\" id=\"{$this->getId()}\" name=\"{$this->getName()}\" class=\"{$this->getClass()}\" >";

            if ($this->inputs){
                foreach($this->inputs as $Input){
                    $Form .= $Input;
                }
            }

            if ($this->itensInput){
                foreach ($this->itensInput as $Item) {
                    $Form .= $Item;
                }
            }

            $Form .= "</form>";

            return $Form;

        }
    }

?>