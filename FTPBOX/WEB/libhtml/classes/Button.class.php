<?php

    Class Button extends ObjPrincipal{
        private $type;
        private $dataBsToggle;
        private $dataBsTarget;
        private $dataBsDismiss;
        private $Conteudo;
        private $ariaLabel;
        private $Eventos;


        function __construct($conteudo=null,$class=null,$type=null,$dataBsToggle=null,$dataBsTarget=null,$dataBsDismiss=null,$id=null,$ariaLabel=null){
            parent::__construct($id,$class);
            $this->type = $type;
            $this->dataBsToggle = $dataBsToggle;
            $this->dataBsTarget = $dataBsTarget;
            $this->dataBsDismiss = $dataBsDismiss;
            $this->Conteudo = $conteudo;
            $this->ariaLabel = $ariaLabel;
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
            $resultado .= $this->type ? "type=\"{$this->type}\"" : "";
            $resultado .= $this->dataBsToggle ? "data-bs-toggle=\"{$this->dataBsToggle}\"" : "";
            $resultado .= $this->dataBsTarget ? "data-bs-target=\"{$this->dataBsTarget}\"" : "";
            $resultado .= $this->dataBsDismiss ? "data-bs-dismiss=\"{$this->dataBsDismiss}\"" : "";
            $resultado .= $this->ariaLabel ? "aria-label=\"{$this->ariaLabel}\"" : "";

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
