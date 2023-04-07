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
      
        public function __construct($type, $name,$id, $classInp = null ,$value = null,$label = null,$disabled=false) {
          $this->type = $type;
          $this->name = $name;
          $this->value = $value;
          $this->label = $label;
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
            $html .= "<label for=\"{$this->name}\">{$this->label}</label>";
          }
          
          if ($this->InputDisabled){
            $html .= "<input {$this->Eventos} type=\"{$this->type}\" id=\"{$this->InputId}\" class=\"$this->classInp\" name=\"{$this->name}\" value=\"{$this->value}\" disabled>";
          }else{  
            $html .= "<input {$this->Eventos} type=\"{$this->type}\" id=\"{$this->InputId}\" class=\"$this->classInp\" name=\"{$this->name}\" value=\"{$this->value}\">";
          }

          return $html;
        }
      }
?>