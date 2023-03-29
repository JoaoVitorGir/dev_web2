<?php
    class A  extends ObjPrincipal{
        private $href;
        private $target;
        private $value;
 
        
        function __construct($href, $class, $value, $id = null, $target = null)
        {
            // Define as propriedades da classe a partir dos parâmetros do construtor
            $this->href = $href;
            $this->target = $target;
            $this->value = $value;

            parent::__construct($id,$class);
        }

        function __toString()
        {
            // Cria uma string com a tag <a> a partir das propriedades da classe
            $resultado = "<a href=\"{$this->href}\" class=\"{$this->getClass()}\"";

            // Adiciona o atributo 'id' caso ele tenha sido definido
            if ($this->getId() != null) {
                $resultado .= " id=\"{$this->getId()}\"";
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
