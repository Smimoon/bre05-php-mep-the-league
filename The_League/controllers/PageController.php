<?php

    class PageController extends AbstractController{
        public function __construct(){
            
        }
        
        public function home() : void{
            $manager = new TeamsManager();
            $manager2 = new PlayerManager();
            $manager3 = new GameManager();
            
<<<<<<< HEAD
            
=======
            $data = ["team" => $manager -> findAll(), "players" => $manager2 -> findAll()];
>>>>>>> 5b41cfd7064cec109b8191717c8a42b1750cc205
            
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