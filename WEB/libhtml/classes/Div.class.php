<?php

    class Div extends ObjPrincipal{
        // Atributos da div
        private $itensDiv = [];
        private $dataBsBackdrop;
        private $dataBsKeyboard;
        private $tabIndex;
        private $arialLabelledby;
        private $ariaHidden;
        private $dataBsScroll;

        // Construtor que recebe a classe e o id da div
        function __construct($class=null,$id = null,$dtBackdrop=null,$dtKeyboard=null,$tabIndex=null,$arialLabelledby=null,$ariaHidden=null, $dataBsScroll=null){
            parent::__construct($id,$class);
            $this->dataBsBackdrop = $dtBackdrop;
            $this->dataBsKeyboard = $dtKeyboard;
            $this->tabIndex = $tabIndex;
            $this->arialLabelledby = $arialLabelledby;
            $this->ariaHidden = $ariaHidden;
            $this->dataBsScroll = $dataBsScroll;
        }

        // Método que adiciona itens à div
        function addItens($item){
            $this->itensDiv[] = $item; 
        } 

        // Método que retorna a string HTML da div
        function Renderizar(){
            // Inicia a string HTML com a tag de abertura da div e seus atributos
            $resultado = "<div ";

            $resultado .= $this->getClass() ? "class=\"{$this->getClass()}\"" : "";
            $resultado .= $this->getId() ? "id=\"{$this->getId()}\"" : "";
            
            $resultado .= $this->dataBsBackdrop ? "data-bs-backdrop=\"{$this->dataBsBackdrop}\"" : "";
            $resultado .= $this->dataBsKeyboard ? "data-bs-keyboard=\"{$this->dataBsKeyboard}\"" : "";
            $resultado .= $this->tabIndex ? "tabindex=\"{$this->tabIndex}\"" : "";
            $resultado .= $this->arialLabelledby ? "aria-labelledby=\"{$this->arialLabelledby}\"" : "";
            $resultado .= $this->ariaHidden ? "aria-hidden=\"{$this->ariaHidden}\"" : "";
            $resultado .= $this->dataBsScroll ? "data-bs-scroll=\"{$this->dataBsScroll}\"" : "";

            $resultado .= ">";

            // Itera sobre os itens adicionados à div e os adiciona à string HTML
            foreach($this->itensDiv as $items){
                $resultado .= $items;
            }

            $resultado .= "</div>";

            return $resultado;
        }
    }

?>
