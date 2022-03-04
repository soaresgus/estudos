<?php

    class Conexao
    {
        private $host = 'localhost';
        private $dbname = 'udemy_pdo';
        private $user = 'root';
        private $pass = '';

        public function conectar()
        {
            try {
                $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);

                return $pdo;
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

    }

?>