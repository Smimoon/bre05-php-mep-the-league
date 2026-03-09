<?php
    class GameManager extends AbstractManager{
        public function __construct()
        {
            parent::__construct();
        }
        
        public function findOne(int $id) : ?game
        {
            $query = $this->db->prepare(
                'SELECT games. *,
                team1.name AS team_1_name,
                team2.name AS team_2_name
                FROM games 
                JOIN teams AS team1 ON team1.id = games.team_1
                JOIN teams AS team2 ON team2.id = games.team_2
                WHERE games.id = :id'
            );
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
                'SELECT games. *,
                team1.name AS team_1_name,
                team2.name AS team_2_name
                FROM games 
                JOIN teams AS team1 ON team1.id = games.team_1
                JOIN teams AS team2 ON team2.id = games.team_2'
                
                );
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