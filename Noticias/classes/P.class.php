<?php

    class P {
        private $Value;
        private $class;

        function __construct($class){
            $this->class = $class;
        }

        function addValue($value){
            $this->Value = $value;
        }

        function Renderizar(){
            $P = "<p class=\"$this->class\">";
            $P .= $this->Value;
            $P .= "</p>";
            return $P;
        }

    }

?>