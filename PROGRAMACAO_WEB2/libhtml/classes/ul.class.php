<?php

    class Listas {
        private $id;
        private $class;
        private $value;
        private $tipoLista;
        private $definicao;
        // private $arr = array("valor1", "valor2", "valor3");

        function __construct($id,$class,$tipoDaLista,$value,$definicao = null){
            $this->id = $id;
            $this->class = $class;
            $this->value = $value;
            $this->tipoLista = $tipoDaLista;
            $this->definicao = $definicao;
        }
  
        

        function __toString(){
            $resultado = " ";
            if ($this->tipoLista == "ol" || $this->tipoLista == "ul"){
                foreach($this->value as $retorno){
                    $resultado = $resultado. "<li class=\"{$this->class}\" id=\"{$this->id}\">{$retorno}</li> ";  
                }
            }

            if ($this->tipoLista == "ol"){

                return "<ol>".$resultado."</ol>";

            }elseif($this->tipoLista == "dl"){
                $valores = 0;
                foreach($this->value as $retorno){
                    $resultado = $resultado. "<dt class=\"{$this->class}\">{$retorno}</dt>";  
                    $resultado = $resultado. "<dd>{$this->definicao[$valores]}</dd>";  
                    $valores++;
                }

                return "<dl>".$resultado."</dl>";

            }elseif($this->tipoLista == "ul"){

                return "<ul>".$resultado."</ul>";

            }
            
        }

    }


