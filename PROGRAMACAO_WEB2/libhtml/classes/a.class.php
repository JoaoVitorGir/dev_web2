<?php
    class A {
        //<a href="" id="" class="" target="">texto</a>
        private $href;
        private $id;
        private $class;
        private $target;
        private $value;

        function __construct($href, $id, $class, $target, $value)
        {
            $this->href = $href;
            $this->id = $id;
            $this->class = $class;
            $this->target = $target;
            $this->value = $value;
        }

        function __toString()
        {
            return "<a href=\"{$this->href}\" 
            id=\"{$this->id}\" class=\"{$this->class}\" 
            target=\"{$this->target}\">{$this->value}</a>";
        }
    }