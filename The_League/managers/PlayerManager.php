<?php
    class PlayerManager extends AbstractManager {
        public function __construct() 
        {
            parent::__construct();
        }
        
        public function findOne(int $id) : ?player
        {
            $query = $this->db->prepare(
                'SELECT *, media.url, teams.name
                FROM players
                JOIN media ON media.id = players.portrait
                JOIN teams ON teams.id = players.team
                WHERE players.id = :id');
            $parameters = [
                'id'=>$id
            ];
            $query -> execute($parameters);
            $results = $query -> fetch(PDO::FETCH_ASSOC);
            
            if($results!== false){
                $team = new Player ($results["nickname"], $results["bio"], $results["url"], $results["name"], $results["id"]);
                return $team;
            }
            else{
                return null;
            }
        }
        
        public function findAll() : array
        {
            $query = $this->db->prepare(
                'SELECT *, media.url, teams.name
                FROM players
                JOIN media ON media.id = players.portrait
                JOIN teams ON teams.id = players.team');
            $query->execute();
            $results = $query -> fetchAll(PDO::FETCH_ASSOC);
            $players=[];
            foreach($results as $result){
                $players[] = new Player($result["nickname"], $result["bio"], $result["url"], $result["name"], $result["id"]);
            }
            
            return $players;
        }
    }
?>