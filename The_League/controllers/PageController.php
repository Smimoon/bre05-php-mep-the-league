<?php

    class PageController extends AbstractController{
        public function __construct(){
            
        }
        
        public function home() : void{
            $manager = new TeamsManager();
            $manager2 = new PlayerManager();
            $manager3 = new GameManager();
            
            $data = ["team" => $manager -> findOne(1), "players" => $manager2 -> findAll(), "games" => $manager3 ->findOne(3)];
            
            $this -> render("home", $data);
        }
        
        public function teams(){
            $this -> render("teams", []);
        }
    
        
        public function notFound(){
            $this -> render("notFound", []);
        }
    }

?>