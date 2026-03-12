<?php
    class TeamsManager extends AbstractManager {
        public function __construct()
        {
            parent::__construct();
        }
        
        public function findOne(int $id) : ?team
        {
            $query = $this->db->prepare('
                SELECT teams.*, media.url
                FROM teams 
                JOIN media ON media.id = teams.logo 
                WHERE teams.id = :id
                ');
            
            $parameters = [
                'id'=>$id
            ];
            
            $query -> execute($parameters);
            $results = $query -> fetch(PDO::FETCH_ASSOC);
            
            if($results!== false){
                $team = new Team ($results["name"], $results["description"], $results["url"], $results["id"]);
                return $team;
            }
            else{
                return null;
            }
        }
        public function findAll() : array
        {
            $query = $this->db->prepare('SELECT teams.* FROM teams JOIN media ON media.id = teams.logo ');
            
            $query -> execute();
            $results = $query -> fetchAll(PDO::FETCH_ASSOC);
            
            $teams = [];
            
            foreach($results as $result){
                $teams[] = new Team($result["name"], $result["description"], $result["url"], $result["id"] );
            }
            
            return $teams;
        }
    }
?>