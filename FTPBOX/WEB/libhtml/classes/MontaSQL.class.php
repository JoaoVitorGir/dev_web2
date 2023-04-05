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

        private function MontaInsert($tabela,$campos,$valores){
            $preInsert = "INSERT INTO {$tabela} (";

            foreach($campos as $campo){
                $preInsert .= $campo.", ";
            }
            
            $preInsert = substr($preInsert,0,-2);
            $preInsert .= ") VALUES (";

            foreach($valores as $valor){
                $preInsert .= "'".$valor."', ";
            }

            $preInsert = substr($preInsert,0,-2);
            $preInsert .= ")";

            return $preInsert;
        }

        private function MontaDelete($tabela,$condicao){
            return "DELETE FROM {$tabela} where {$condicao}";
        }

        function addJoins($joins){
            $this->SQL .= $joins;
        }

        function setSelect($tabela,$campos=null,$count=null){
            $this->SQL = $this->MontaSelect($tabela,$campos,$count);
        }

        function setInsert($tabela,$campos=[],$valores=[]){
            $this->SQL = $this->MontaInsert($tabela,$campos,$valores);
        }

        function SetDelete($tabela,$condicao){
            $this->SQL = $this->MontaDelete($tabela,$condicao);
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
