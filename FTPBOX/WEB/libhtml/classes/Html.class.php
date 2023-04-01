<?php
    class Html{
        private $linguagem;
        private $head;
        private $body;
        private $class;
        
        function __construct($linguagem, $head, $body, $class=null)
        {
            $this->linguagem = $linguagem;
            $this->body = $body;
            $this->head = $head;
            $this->class = $class;
        }

        function __toString()
        {
            // Começa a construir a resposta em HTML
            $resposta = "<!DOCTYPE html>";
            $resposta .= "<html lang={$this->linguagem} class=\"{$this->class}\">";
            $resposta .= $this->head;  // Adiciona a tag head
            $resposta .= $this->body;  // Adiciona a tag body
                        
            $resposta .= "</html>";   // Fecha a tag html
            
            return $resposta;  // Retorna a resposta em HTML
        }
    }
?>
