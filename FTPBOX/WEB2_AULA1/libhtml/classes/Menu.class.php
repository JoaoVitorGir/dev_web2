<?php
    class Menu{
        private $itens = [];
        private $class;

        function addItens($newItem, $newClass=null){
            $this->itens[] = $newItem;
        }
    }
?>