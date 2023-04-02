<?php
    class MontaSQL{
        private $SQL;

        private function MontaSelect($tabela,$campos=null,$count=null){
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
                if ($count){
                    $PreSQL = "select count({$count}) from {$tabela}"; 
                    
                }else{
                    $PreSQL = "select * from {$tabela}"; 
                }
            }
            return $PreSQL;
        }

        // function __construct($tabela,$metodo="select",$campos=null,$count=null){
        //     if ($metodo == "select"){
        //         $this->SQL = $this->MontaSelect($tabela,$campos,$count);
        //     }
        // }

        function addJoins($joins){
            $this->SQL .= $joins;
        }

        function setSQL($tabela,$metodo="select",$campos=null,$count=null){
            if ($metodo == "select"){
                $this->SQL = $this->MontaSelect($tabela,$campos,$count);
            }
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
