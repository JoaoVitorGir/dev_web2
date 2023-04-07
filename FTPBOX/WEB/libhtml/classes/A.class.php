<?php
    class A  extends ObjPrincipal{
        private $href;
        private $target;
        private $value;
        private $tags = [];
        private $Eventos;
 
        
        function __construct($href, $class, $value, $id = null, $target = null)
        {
            // Define as propriedades da classe a partir dos parâmetros do construtor
            $this->href = $href;
            $this->target = $target;
            $this->value = $value;

            parent::__construct($id,$class);
        }   

        function addTags($data_bs_toggle=null,$data_bs_target=null){
            $data_bs_target ? $this->tags[] = " data-bs-target={$data_bs_target}" : null;
            $data_bs_toggle ? $this->tags[] = " data-bs-toggle={$data_bs_toggle}" : null;
        }

        function addEventos($onClick=null){
            $Events = "";
            if ($onClick){
                $Events .= " onClick=\"{$onClick}\" ";
            }

            $this->Eventos = $Events;
        }

        function __toString()
        {
            // Cria uma string com a tag <a> a partir das propriedades da classe
            $resultado = "<a href=\"{$this->href}\" class=\"{$this->getClass()}\"";

            // Adiciona o atributo 'id' caso ele tenha sido definido
            if ($this->getId()) {
                $resultado .= " id=\"{$this->getId()}\"";
            }

            // Adiciona o atributo 'target' caso ele tenha sido definido
            if ($this->target) {
                $resultado .= " target=\"{$this->target}\"";
            }

            // Adiciona as tags caso o usuario tenha passado mais algumas além das padrões
            foreach($this->tags as $tag){
                $resultado .= $tag;
            }

            if ($this->Eventos){
                $resultado .= $this->Eventos;
            }

            // Adiciona o valor do link à tag <a>
            $resultado .= ">{$this->value}</a>";

            return $resultado;
        }
    }
?>
