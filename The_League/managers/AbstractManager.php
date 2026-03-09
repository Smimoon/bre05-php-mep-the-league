<?php
    $host = "db.3wa.io";
    $port = "3306";
    $dbname = "simonlaroche_the_league";
    $connexionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";
    
    $user = "simonlaroche";
    $password = "8d907e25f2f03cd13dc353d2ae9f5891";
    
    $db = new PDO(
        $connexionString,
        $user,
        $password,
    );
    
?>