<?php

    class PageController extends AbstractController{
        public function __construct(){
            
        }
        
        public function home() : void{
            $manager = new TeamsManager();
            $manager2 = new PlayerManager();
            $manager3 = new GameManager();
            
            $data = ["team" => $manager -> findAll(), "players" => $manager2 -> findAll(), "games" => $manager3 ->findOne(3)];

            
            $this -> render("home", $data);
        }
        
        public function teams(){
            $tm = new TeamsManager();
            $data = $tm -> findAll();
            
            $this -> render("teams", $data);
        }
        
        public function players(){
            $pm = new PlayerManager();
            $data = $pm -> findAll();
            
            $this -> render("players", $data);
        }
        
        public function games(){
            $tm = new TeamsManager();
            $mm = new GameManager();
            
            $data = ["games" => $mm -> findAll(), "teams" => $tm -> findAll()];
            
            $this -> render("games", $data);
        }
        
        public function teamDetails(string $id){
            $tm = new TeamsManager();
            $pm = new PlayerManager();
            $intId = intval($id);
            $data = ["team" => $tm -> findOne($intId), "players" => $pm -> findAll()];
            $this -> render("teamDetails", $data);
        }
        
        public function playerDetails(string $id){
            $pm = new PlayerManager();
            $ppm = new PlayerPerfManager();
            $intId = intval($id);
            
            $data = ["player" => $pm -> findOne($intId), "players" => $pm -> findAll(), "perfs" => $ppm -> findOne($intId)];
            
            $this -> render("playerDetails", $data);
        }
        
        public function notFound(){
            $this -> render("notFound", []);
        }
    }

?>