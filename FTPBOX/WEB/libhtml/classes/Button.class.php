<?php

    Class Button extends ObjPrincipal{
        private $type;
        private $dataBsToggle;
        private $dataBsTarget;
        private $dataBsDismiss;
        private $Conteudo;
        private $ariaLabel;
        private $Eventos;
        private $value;


        function __construct($conteudo=null,$class=null,$type=null,$dataBsToggle=null,$dataBsTarget=null,$dataBsDismiss=null,$id=null,$ariaLabel=null,$value=null,$name=null){
            parent::__construct($id,$class,$name);
            $this->type = $type;
            $this->dataBsToggle = $dataBsToggle;
            $this->dataBsTarget = $dataBsTarget;
            $this->dataBsDismiss = $dataBsDismiss;
            $this->Conteudo = $conteudo;
            $this->ariaLabel = $ariaLabel;
            $this->value = $value;
        }

        function addEventos($onClick=null){
            $Events = "";
            if ($onClick){
                $Events .= " onClick=\"{$onClick}\" ";
            }

            $this->Eventos = $Events;
        }

        function Renderizar(){
            $resultado = "<button ";

            $resultado .= $this->getClass() ? "class=\"{$this->getClass()}\"" : "";
            $resultado .= $this->getId() ? "id=\"{$this->getId()}\"" : "";
            $resultado .= $this->getName() ? "name=\"{$this->getName()}\"" : "";
            $resultado .= $this->type ? "type=\"{$this->type}\"" : "";
            $resultado .= $this->dataBsToggle ? "data-bs-toggle=\"{$this->dataBsToggle}\"" : "";
            $resultado .= $this->dataBsTarget ? "data-bs-target=\"{$this->dataBsTarget}\"" : "";
            $resultado .= $this->dataBsDismiss ? "data-bs-dismiss=\"{$this->dataBsDismiss}\"" : "";
            $resultado .= $this->ariaLabel ? "aria-label=\"{$this->ariaLabel}\"" : "";
            $resultado .= $this->value ? "value=\"{$this->value}\"" : "";

            if ($this->Eventos){
                $resultado .= $this->Eventos;
            }

            $resultado .= ">";

            // Conteudo dentro do botão
            $resultado .= $this->Conteudo ? $this->Conteudo : "";

            $resultado .= "</button>";
            
            return $resultado;
        }
    }

?>
