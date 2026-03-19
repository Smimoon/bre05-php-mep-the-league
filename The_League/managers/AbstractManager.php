<?php
    abstract class AbstractManager{
        protected PDO $db;
    
        public function __construct()
        {
            $host = "sql113.infinityfree.com";
            $port = "3306";
            $dbname = "if0_41430525_simon_laroche_mep_the_league";
            $connexionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";
    
            $user = "if0_41430525";
            $password = "As7jHfrVX7Ex";
    
            $this->db = new PDO(
                $connexionString,
                $user,
                $password
            );
        }
    }
?>
?>