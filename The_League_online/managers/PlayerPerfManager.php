<?php
    class PlayerPerfManager extends AbstractManager{
        public function __construct()
        {
            Parent::__construct();
        }
        
        public function findOne(int $id): ?PlayerPerf
        {
            $query = $this->db->prepare(
                'SELECT *
                FROM player_performance
                WHERE player_performance.id = :id'
            );
            
            $parameters = [
                'id' => $id
            ];
            
            $query->execute($parameters);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            
            if($result !== false){
                $pm = new PlayerManager();
                $gm = new GameManager();
                
                $player = $pm->findOne($result["player"]);
                $game = $gm->findOne($result["game"]);
                
                $result = new PlayerPerf($player, $game, $result["points"], $result["assists"], $result["id"]);
                
                return $result;
            }
            
            else{
                return NULL;
            }
        }
        
        public function findAll():array
        {
            $query = $this->db->prepare(
                'SELECT *
                FROM player_performance'
            );
            
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            $perfs = [];
            
            if($results !== false){
                foreach($results as $result){
                    $pm = new PlayerManager();
                    $gm = new GameManager();
                    
                    $player = $pm->findOne($result["player"]);
                    $game = $gm->findOne($result["game"]);
                    
                    $results[] = new PlayerPerf($player, $game, $result["points"], $result["assists"], $result["id"]);
                }
                return $results;
            }
        }
    }