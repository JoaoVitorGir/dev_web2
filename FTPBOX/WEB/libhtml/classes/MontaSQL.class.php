<?php
    class MontaSQL{
        private $SQL;
        private $UpdateObrigaCondicao = false; //obriga a ter condicao ao fazer um update

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

        private function MontaUpdate($tabela,$campos=[],$valores=[]){
            $preUpdate = "UPDATE {$tabela} SET ";

            if (count($campos) == count($valores)){
                for ($I=0; $I < count($campos); $I++) { 
                    $preUpdate .= $campos[$I]." = '".$valores[$I]."' ";
                }
            }else{
                $preUpdate = "";
                echo "ERRO: Qtd de campos e de valores não são iguais";
            }

            return $preUpdate;
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

        private function MontaDelete($tabela){
            return "DELETE FROM {$tabela} ";
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

        function SetDelete($tabela){
            $this->SQL = $this->MontaDelete($tabela);
        }

        function SetUpdate($tabela,$campos=[],$valores=[]){
            $this->SQL = $this->MontaUpdate($tabela,$campos,$valores);
            $this->UpdateObrigaCondicao = true;
        }

        //se quiser adicionar algum parametro ou condição adiciona um SetUpdate e dps chama a fucão para a dicionar a condicao
        function addParametros($where=null,$orderBy=null,$offSet=null,$limit=null){
            $preParametros = "";

            $where ? $preParametros = " where ".$where : null;
            $orderBy ? $preParametros .= " order By ".$orderBy : null;
            $offSet ? $preParametros .= " offset ".$offSet : null;
            $limit ? $preParametros .= " limit ".$limit : null;

            $this->SQL .= $preParametros;

            $this->UpdateObrigaCondicao = false;
        }

        function getSQL(){
            if ($this->UpdateObrigaCondicao){
                echo "Updates precisam ter condicao para serem alterado adicione alguma condicao";
            }else{
                return $this->SQL;
            }
        }
    }
?>
