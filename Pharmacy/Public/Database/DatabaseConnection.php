<?php

class DatabaseConnection{
    private $Hostname = "localhost";
    private $Username = "root";
    private $Password = "nashaatx";
    private $DBName = "pharmacy";
    private $connection = null;

    public function Connect(){
        $this->connection = new mysqli($this->Hostname,$this->Username,$this->Password,$this->DBName,8080);
    }
    public function Execute($sql){
        $Result = $this->connection->query($sql);
        return $Result;
    }
}

?>