<?php

    class Title extends ObjPrincipal{
        private $nivelTitle;
        private $value;
        
        function __construct($value,$nivel=1,$class=null,$id=null){
            parent::__construct($id,$class);
            $this->nivelTitle = $nivel;
            $this->value = $value;
        }

        function Rederizar(){
            $resultado = "<h{$this->nivelTitle}";
            
            $resultado .= " class=\"{$this->getClass()}\"";
           
            if ($this->getId() != null){
                $resultado .= " id=\"{$this->getId()}\" "; 
            }

            $resultado .= ">";
            $resultado .= "{$this->value} </h{$this->nivelTitle}>";

            return $resultado;
        }
    }
?>