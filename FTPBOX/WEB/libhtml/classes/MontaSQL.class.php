<?php
    class MontaSQL{
        private $SQL;

        private function MontaSelect($tabela,$campos){
            if ($campos){
                $PreSQL = "select ";
                $ultimoCampo = end($campos);
                reset($campos);
                foreach($campos as $campo){
                    if ($campo === $ultimoCampo){
                        $PreSQL .= $campo;
                    }else{
                        $PreSQL .= $campo.",";
                    }
                }
                $PreSQL .= " from {$tabela}";   
            }else{
                $PreSQL = "select * from {$tabela}"; 
            }
            return $PreSQL;
        }

        function __construct($tabela,$metodo="select",$campos=null){
            if ($metodo == "select"){
                $this->SQL = $this->MontaSelect($tabela,$campos);
            }
        }

        function addJoins($joins){
            $this->SQL .= $joins;
        }

        function setSQL($tabela,$campos){
            $this->SQL = $this->MontaSelect($tabela,$campos);
        }

        function addParametros($where=null,$orderBy=null,$offSet=null,$limit=null){
            $preParametros = "";

            $where ? $preParametros = " where ".$where : null;
            $orderBy ? $preParametros .= " order By ".$orderBy : null;
            $offSet ? $preParametros .= " offset ".$offSet : null;
            $limit ? $preParametros .= " limit ".$limit : null;

            $this->SQL .= $preParametros;
        }

        function getSQL(){
            return $this->SQL;
        }
    }
?>
