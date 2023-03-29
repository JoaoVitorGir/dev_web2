<?php

    class ObjPrincipal{
        private $id;
        private $class;
        private $name;

        function __construct($id=null,$class=null,$name=null){
            $this->id = $id;
            $this->class = $class;
            $this->name = $name;
        }

        function getId(){
            return $this->id;
        }

        function getClass(){
            return strval($this->class);
        }

        function getName(){
            return $this->name;
        }

    }

?>