<?php

    class PageController extends AbstractController{
        public function __construct(){
            
        }
        
        public function home() : void{
            $manager = new TeamsManager();
            $manager2 = new PlayerManager();
            
            $data = ["team" => $manager -> findAll(), "players" => $manager2 -> findAll()];
            
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