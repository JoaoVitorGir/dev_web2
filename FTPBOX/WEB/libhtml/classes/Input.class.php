<?php
    class Input {
        private $type;
        private $name;
        private $value;
        private $label;
        private $classInp;
        private $InputDisabled;
        private $InputId;
        private $Eventos;
        private $laberrequired;
        private $inputrequired;
        private $readOnly;


        public function __construct($type, $name=null,$id, $classInp = null ,$value = null,$label = null,$laberrequired = false,$disabled=false,$inputrequired=false,$readOnly=false) {
          $this->type = $type;
          $this->name = $name;
          $this->value = $value;
          $this->label = $label;
          $this->laberrequired = $laberrequired;
          $this->inputrequired = $inputrequired;
          $this->readOnly = $readOnly;
          $this->classInp = $classInp;
          $this->InputDisabled = $disabled;
          $this->InputId = $id;
        }
      
        function addEventos($onClick=null, $onkeyup=null){
          $Events = "";
          if ($onClick){
              $Events .= " onClick=\"{$onClick}\" ";
          }

          if ($onkeyup){
            $Events .= " onkeyup=\"{$onkeyup}\" ";
          }

          $this->Eventos = $Events;
        }

        public function Renderizar() {
          $html = '';
      
          if ($this->label) {
            if ($this->laberrequired){
              $html .= "<label for=\"{$this->name}\" required >{$this->label}</label>";
            }else{
              $html .= "<label for=\"{$this->name}\" >{$this->label}</label>";
            }
          }

          $AddRequired = $this->inputrequired == false ? null : "required";
          $readOnly = $this->readOnly == false ? null : "readonly";
          $disabled = $this->InputDisabled == false ? null : "disabled";

          $html .= "<input {$this->Eventos} type=\"{$this->type}\" id=\"{$this->InputId}\" class=\"$this->classInp\" name=\"{$this->name}\" value=\"{$this->value}\" $AddRequired $readOnly $disabled >";

          return $html;
        }
      }
?>