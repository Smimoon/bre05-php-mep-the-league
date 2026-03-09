<?php

    class PageController extends AbstractController{
        public function __construct(){
            
        }
        
        public function home() : void{
            // $manager = new TeamsManager();
            // $data = $manager -> findOne(1);
            
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