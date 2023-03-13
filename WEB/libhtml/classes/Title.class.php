<?php

    class Title extends ObjPrincipal{
        private $nivelTitle;
        private $value;
        
        function __construct($value,$nivel=1,$class=null,$id=null){
            parent::__construct($id,$class);
            $this->nivelTitle = $nivel;
            $this->value = $value;
        }

        function __toString(){
            $resultado = "<h".$this->nivelTitle;
            
            if ($this->getId() != null){
                $resultado .= " id=\"{$this->getId()}\" "; 
            }
            
            $resultado .= " class=\"{$this->getClass()}\"> ".$this->value." </h".$this->nivelTitle.">";

            return $resultado;
        }
    }
?>