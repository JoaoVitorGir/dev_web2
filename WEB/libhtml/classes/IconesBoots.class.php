<?php

    //nesta classe é passado o Html completo de cada icone pego do bootstrap
    class IconesBoots{
        private $htmlBoots;

        function __construct($htmlBoots){
            $this->htmlBoots = $htmlBoots;
        }

        function __toString(){
            return  strval($this->htmlBoots);
        }
    }

?>