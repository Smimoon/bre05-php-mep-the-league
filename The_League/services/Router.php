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
                else if($_GET["route"] === "matchs"){
                    $ctrl = new PageController();
                    $ctrl -> matchs();
                }
                else if($_GET["route"] === "players"){
                    $ctrl = new PageController();
                    $ctrl -> players();
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