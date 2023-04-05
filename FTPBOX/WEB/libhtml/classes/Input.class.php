<?php
    class Input {
        private $type;
        private $name;
        private $value;
        private $label;
      
        public function __construct($type, $name, $value = '', $label = '') {
          $this->type = $type;
          $this->name = $name;
          $this->value = $value;
          $this->label = $label;
        }
      
        public function Renderizar() {
          $html = '';
      
          if ($this->label) {
            $html .= "<label for=\"{$this->name}\">{$this->label}</label>";
          }
      
          $html .= "<input type=\"{$this->type}\" name=\"{$this->name}\" value=\"{$this->value}\">";
      
          return $html;
        }
      }
?>