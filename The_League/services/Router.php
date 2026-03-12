<?php

    class Router{
        public function __construct(){
            
        }
        
        public function handleRequest(){
            if(isset($_GET["route"])){
                if($_GET["route"] === "teams"){
                        $ctrl = new PageController();
                        $ctrl -> teams();
                }
                else if($_GET["route"] === "games"){
                    $ctrl = new PageController();
                    $ctrl -> games();
                }
                else if($_GET["route"] === "players"){
                    $ctrl = new PageController();
                    $ctrl -> players();
                }
                else if($_GET["route"] === "teamDetails" && $_GET["team_id"]){
                    $ctrl = new PageController();
                    $ctrl -> teamDetails($_GET["team_id"]);
                }
                else if($_GET["route"] === "playerDetails" && $_GET["player_id"]){
                    $ctrl = new PageController();
                    $ctrl -> playerDetails($_GET["player_id"]);
                }
                else if($_GET["route"] === "gameDetails" && $_GET["game_id"]){
                    $ctrl = new PageController();
                    $ctrl -> gameDetails($_GET["game_id"]);
                }
                else{
                    $ctrl = new PageController();
                    $ctrl -> notFound();
                }
            }
            else{
                $ctrl = new PageController();
                $ctrl -> home();
            }
        }
    }

?>