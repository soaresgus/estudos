<?php

    namespace App;

    class Connection
    {
        public static function getDb()
        {
            try {
                $pdo = new \PDO("mysql:host=localhost;dbname=udemy_mvc;charset=utf8", "root", "");

                return $pdo;
            } catch(\PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

?>