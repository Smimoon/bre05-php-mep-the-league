<?php
    class Team {
        public function __construct(private string $name, private string $description, private ? int $id = NULL, private ? int $logo = NULL)
        {
            
        }
        public function getId():int 
        {
            return $this->id;
        }
        public function setId(int $id):void
        {
            $this->id = $id;
        }
        public function getName():string
        {
            return $this->name;
        }
        public function setName(string $name):void
        {
            $this->name = $name;
        }
        public function getDescription():string
        {
            return $this->description;
        }
        public function setDescription(string $description):void
        {
            $this->description = $description;
        }
        public function getLogo():int
        {
            return $this->logo;
        }
        public function setLogo(int $logo):void
        {
            $this->logo = $logo;
        }
    }
?>