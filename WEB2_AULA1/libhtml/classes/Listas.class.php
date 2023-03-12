<?php

    class Listas extends ObjPrincipal{
        private $classLi; 
        private $value = []; 
        private $tipoLista; 
        private $definicao = []; 

        function __construct($tipoDaLista,$classLi, $classLista = null, $id = null){ // Construtor da classe que recebe a classe, o tipo da lista e o ID da lista (opcional) 
            $this->classLi = $classLi;
            $this->tipoLista = $tipoDaLista;
            parent::__construct($id,$classLista);
        }

        // Adiciona um novo item à lista
        function addItens($valor, $definicao = null){ // Função que recebe o valor e a definição (opcional) do item da lista
            $this->value[] = $valor; 
            if($definicao != null){ 
                $this->definicao[] = $definicao;
            }
        } 

        // Converte a lista para uma string HTML
        function __toString(){
            $resultado = " "; 
            if ($this->tipoLista == "ol" || $this->tipoLista == "ul"){ // Se a lista for ordenada ou não ordenada, percorre o array de valores e cria uma string HTML para cada item
                foreach($this->value as $retorno){
                    $resultado = $resultado. "<li " . ($this->getId() == null ? null : "id=\"{$this->getId()}\"") . "class=\"{$this->classLi}\">{$retorno}</li> "; 
                }
            }

            if ($this->tipoLista == "ol"){ // Se a lista for ordenada, retorna a string HTML para uma lista ordenada (<ol>)

                if($this->getClass() == null){
                    return "<ol>" . $resultado . "</ol>";
                }else{
                    return "<ol class=\"{$this->getClass()}\" >".$resultado."</ol>";
                }

            } elseif($this->tipoLista == "dl"){ // Se a lista for de definição, percorre o array de valores e cria uma string HTML para cada item com sua respectiva definição
                $valores = 0;
               
                foreach($this->value as $retorno){
                    $resultado = $resultado. "<dt class=\"{$this->classLi}\">{$retorno}</dt>"; // Cria a string HTML para o item da lista
                    $resultado = $resultado. "<dd>{$this->definicao[$valores]}</dd>"; // Adiciona a definição do item à string HTML
                    $valores++;
                }

                if($this->getClass() == null){
                    return "<dl>" . $resultado . "</dl>"; 
                }else{
                    return "<dl class=\"{$this->getClass()}\" >".$resultado."</dl>";
                }

            } elseif($this->tipoLista == "ul"){ // Se a lista for não ordenada, retorna a string HTML para uma lista não ordenada (<ul>)
               
                if($this->getClass() == null){
                    return "<ul>" . $resultado . "</ul>";
                }else{
                    return "<ul class=\"{$this->getClass()}\" >".$resultado."</ul>";
                }
            }
        }
    }

?>


