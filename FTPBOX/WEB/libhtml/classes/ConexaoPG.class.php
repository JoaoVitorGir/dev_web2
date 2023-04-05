<?php

    class ConexaoPG {
        private $pdo;

        function __construct($dbname, $dbuser, $dbpass, $host="localhost") {
            $dsn = "pgsql:host=$host;dbname=$dbname;user=$dbuser;password=$dbpass";
            try {
                $this->pdo = new PDO($dsn);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Erro ao conectar com o PostgreSQL: ' . $e->getMessage();
            }
        }
 

        function execDelete($SQL){
            $stmt = $this->pdo->prepare($SQL);
            $stmt->execute();
        }
        

        function execQuery($sql, $params = null) {
            try {
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute($params);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo 'Erro ao executar consulta no PostgreSQL: ' . $e->getMessage();
            }
        }
    }

?>

