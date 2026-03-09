<?php
    class GameManager extends AbstractManager{
        public function __construct()
        {
            parent::__construct();
        }
        
        public function findOne(int $id) : ?game
        {
            $query = $this->db->prepare(
                'SELECT games.*, teams.name
                FROM games 
                JOIN teams
                ON teams.id = games.team_01
                JOIN teams
                ON teams.id = games.team_02
                WHERE games.id = :id
                ');
            $parameters = [
                'id' => $id
            ];
            
            $query->execute($parameters);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if($result !== false){
                $game = new Game($result["name"], $result["date"], $result["name"], $result["name"], $result["name"], $result["id"]);
                return $game;
            }
            else{
                return NULL;
            }
        }
        public function findAll():array
        {
            $query = $this->db->prepare(
                'SELECT games.*, teams.name
                FROM games 
                JOIN teams
                ON teams.id = games.team_01
                JOIN teams
                ON teams.id = games.team_02
                
                ');
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            $games = [];
            foreach($results as $result){
                $games[] = new Game($result["name"], $result["date"], $result["name"], $result["name"], $result["name"], $result["id"]);
            }
            return $games;
        }
    }
?>