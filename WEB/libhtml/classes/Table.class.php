<?php

    class Table extends ObjPrincipal{

        private $thTitle;
        private $tdLinhas = [];
        private $classThead;
        private $classTd;
        private $classTr;

        function __construct($classTable = null,$classThead=null,$classTr=null,$classTd=null, $id = null, $name = null){
            parent::__construct($id,$classTable,$name);
            $this->classTd = $classTd;
            $this->classThead = $classThead;
            $this->classTr = $classTr;
        }

        function addLinha($linha){
            $this->tdLinhas[] = $linha;
        }

        function addArrTitle($arrTitle){
            $this->thTitle = $arrTitle;
        }

        function Renderizar(){
            $tr = $this->classTr != null ? "<tr class=\"{$this->classTr}\">" : "<tr>";
            $td = $this->classTd != null ? "<td class=\"{$this->classTd}\">" : "<td>";

            $resposta = "<table class=\"{$this->getClass()}\">";
            $resposta .="<thead class=\"{$this->classThead}\"> ".$tr;
            foreach($this->thTitle as $titulos){
                $resposta .= "<th>{$titulos}</th>";
            }
            
            $resposta .= "</tr> </thead>";
            
            for ($I=0; $I < count($this->tdLinhas); $I++) { 
                $resposta .= $tr;
                foreach($this->tdLinhas[$I] as $itensLinha){
                    $resposta .= $td."{$itensLinha}</td>";
                }
                $resposta .= "</tr>";
            }

            $resposta .= "</table>";

            return $resposta;
        }

    }

?>