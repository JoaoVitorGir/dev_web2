<?php
    class ClaHead{
        private $metas = [];
        private $title;

        function addMetas($meta){
            $this->metas = $meta;
        }

        function __construct($title)
        {
            $this->title = $title;
        }

        function __toString()
        {
            $resultado = "<head>";
            foreach($this->metas as $itensMeta){
                $resultado = $resultado. $itensMeta; 
            }
            $resultado = $resultado. $this->title;
            $resultado = $resultado. "</head>";
            return $resultado;
        }
    }
?>