<?php
    class Html{
        private $linguagem;
        private $head;
        private $body;
        private $scripts = [];

        function __construct($linguagem, $head, $body)
        {
            $this->linguagem = $linguagem;
            $this->body = $body;
            $this->head = $head;
        }

        function addScript($src=null,$integrity=null,$crossorigin=null){
            $newScript = "<script ";
            if ($src != null){
                $newScript .= " src=\"$src\"";
            }
            if ($integrity != null){
                $newScript .= " integraty=\"$integrity\"";
            }
            if ($crossorigin != null){
                $newScript .= " crossorigin=\"$crossorigin\"";
            }

            $newScript .= "></script>";

            $this->scripts[] = $newScript;
        }

        function __toString()
        {
            // Começa a construir a resposta em HTML
            $resposta = "<!DOCTYPE html> <html lang=".$this->linguagem.">".
                        $this->head.  // Adiciona a tag head
                        $this->body;  // Adiciona a tag body

                        foreach($this->scripts as $itens){
                           $resposta .= $itens; 
                        }
                        
            $resposta .= "</html>";   // Fecha a tag html
            
            return $resposta;  // Retorna a resposta em HTML
        }
    }
?>
