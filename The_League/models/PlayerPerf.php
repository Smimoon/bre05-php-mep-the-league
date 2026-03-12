<?php
    class PlayerPerf {
        public function __construct(private Player $player, private Game $game, private int $points, private int $assits, private ? int $id)
        {
            
        }
        
        public function getPlayer():Player
        {
            return $this->player;
        }
        public function setPlayer(Player $player):void
        {
            $this->player = $player;
        }
        
        public function getGame():Game
        {
            return $this->game;
        }
        public function setGame(Game $game):void
        {
            $this->game = $game;
        }
        
        public function getPoints():int
        {
            return $this->points;
        }
        public function setPoints(int $points):void
        {
            $this->points = $points;
        }
        
        public function getId():int
        {
            return $this->id;
        }
        public function setId(int $id):void
        {
            $this->id = $id;
        }
        
    }