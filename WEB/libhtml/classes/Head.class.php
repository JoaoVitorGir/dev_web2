<?php

    class Head{
        private $metas = []; // Array para armazenar as tags meta
        private $title; // Título da página
        private $links = []; // Array para armazenar as tags link

        // Adiciona uma nova tag meta
        function addMetas($name=null, $content=null, $charset=null, $http_equiv=null){
            $NewMeta = "";
            if ($name != null){
                $NewMeta = $NewMeta." name=\"$name\"";
            }
            if ($content != null){
                $NewMeta = $NewMeta." content=\"$content\"";
            }
            if ($charset != null){
                $NewMeta = $NewMeta." charset=\"$charset\"";
            }
            if ($http_equiv != null){
                $NewMeta = $NewMeta." http-equiv=\"$http_equiv\"";
            }

            $this->metas[] = "<meta ".$NewMeta." >";
        }

        // Adiciona uma nova tag link
        function addlink($rel=null, $href=null, $type=null,$integrity=null,$crossorigin=null){
            $newLink = "";
            if($rel != null){
                $newLink = $newLink." rel=\"$rel\"";
            }
            if($href != null){
                $newLink = $newLink." href=\"$href\"";
            }
            if($type != null){
                $newLink = $newLink." type=\"$type\"";
            }
            if($integrity != null){
                $newLink .= " integraty=\"$integrity\"";
            }
            if($crossorigin != null){
                $newLink .= " crossorign=\"$crossorigin\"";
            }


            $this->links[] = "<link ".$newLink.">";
        }

        // Construtor da classe
        function __construct($title)
        {
            $this->title = $title;
        }

        // Converte a classe em uma string
        function __toString()
        {
            $resultado = "<head>";
            foreach($this->metas as $itensMeta){
                $resultado = $resultado. $itensMeta; 
            }
            foreach($this->links as $link){
                $resultado = $resultado. $link;    
            }
            $resultado = $resultado. "<title>".$this->title."</title>";
            $resultado = $resultado. "</head>";
            return $resultado;
        }
    }

?>