<?php
    abstract class AbstractManager{
        protected PDO $db;
    
        public function __construct()
        {
            $host = "sql201.infinityfree.com";
            $port = "3306";
            $dbname = "if0_41430473_the_league_online";
            $connexionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";
    
            $user = "if0_41430473";
            $password = "1ngresYG";
    
            $this->db = new PDO(
                $connexionString,
                $user,
                $password
            );
        }
    }
?>