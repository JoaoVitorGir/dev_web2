<?php
    class Head{
        private $metas = [];
        private $title;

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
            $resultado = $resultado. "<title>".$this->title."</title>";
            $resultado = $resultado. "</head>";
            return $resultado;
        }
    }
?>