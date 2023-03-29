<?php
    class A {
        private $href;
        private $id;
        private $class;
        private $target;
        private $value;

        function __construct($href, $class, $value, $id = null, $target = null)
        {
            // Define as propriedades da classe a partir dos parâmetros do construtor
            $this->href = $href;
            $this->id = $id;
            $this->class = $class;
            $this->target = $target;
            $this->value = $value;
        }

        function __toString()
        {
            // Cria uma string com a tag <a> a partir das propriedades da classe
            $resultado = "<a href=\"{$this->href}\" class=\"{$this->class}\"";

            // Adiciona o atributo 'id' caso ele tenha sido definido
            if ($this->id != null) {
                $resultado .= " id=\"{$this->id}\"";
            }

            // Adiciona o atributo 'target' caso ele tenha sido definido
            if ($this->target != null) {
                $resultado .= " target=\"{$this->target}\"";
            }

            // Adiciona o valor do link à tag <a>
            $resultado .= ">{$this->value}</a>";

            return $resultado;
        }
    }
?>
