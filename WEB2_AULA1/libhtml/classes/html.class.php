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
            $resposta = "<!DOCTYPE html> <html lang=".$this->linguagem.">".
                        $this->head.
                        $this->body.
                        "</html>";
            
        return $resposta;
        }
    }
?>