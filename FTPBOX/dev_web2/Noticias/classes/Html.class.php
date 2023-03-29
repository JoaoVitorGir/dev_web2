<?php
    class Html{
        private $linguagem;
        private $head;
        private $body;
        
        function __construct($linguagem, $head, $body)
        {
            $this->linguagem = $linguagem;
            $this->body = $body;
            $this->head = $head;
        }

        function __toString()
        {
            // Começa a construir a resposta em HTML
            $resposta = "<!DOCTYPE html>";
            $resposta .= "<html lang={$this->linguagem}>";
            $resposta .= $this->head;  // Adiciona a tag head
            $resposta .= $this->body;  // Adiciona a tag body
                        
            $resposta .= "</html>";   // Fecha a tag html
            
            return $resposta;  // Retorna a resposta em HTML
        }
    }
?>
