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