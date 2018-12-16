<?php

class DatabaseConnection{
    private $Hostname = "localhost";
    private $Username = "root";
    private $Password = "";
    private $DBName = "pharmacy";
    private $connection = null;

    public function Connect(){
        $this->connection = new mysqli($this->Hostname,$this->Username,$this->Password,$this->DBName);
    }
    public function Execute($sql){
        $Result = $this->connection->query($sql);
        return $Result;
    }
}

?>