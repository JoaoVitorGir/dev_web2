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
            $resposta = "<!DOCTYPE html> <html lang=".$this->linguagem.">".
                        $this->head.  // Adiciona a tag head
                        $this->body.  // Adiciona a tag body
                        "</html>";   // Fecha a tag html
            
            return $resposta;  // Retorna a resposta em HTML
        }
    }
?>
