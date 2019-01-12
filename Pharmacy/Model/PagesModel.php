<?php
require_once ("../Public/Database/DatabaseConnection.php");
class PagesModel{
    private $ID;
    private $URL;
    private $FriendlyName;
    public function getID()
    {
        return $this->ID;
    }
    public function setID($ID)
    {
        $this->ID = $ID;
    }
    public function getURL()
    {
        return $this->URL;
    }
    public function setURL($URL)
    {
        $this->URL = $URL;
    }
    public function getFriendlyName()
    {
        return $this->FriendlyName;
    }
    public function setFriendlyName($FriendlyName)
    {
        $this->FriendlyName = $FriendlyName;
    }

    public function AddPage(){
        $sql = "INSERT INTO `pages`(`URL`, `FriendlyName`) 
                  VALUES ('".$this->URL."','".$this->FriendlyName."')";
        echo $sql;
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Connection->Execute($sql);
    }
    public function Delete(){
        $sql = "DELETE FROM `pages` WHERE ID = '".$this->ID."'";
        $Connection  = new DatabaseConnection();
        $Connection->Connect();
        $Connection->Execute($sql);
    }
    public function Modify(){
        $sql = "UPDATE `pages` SET `URL`='".$this->URL."',`FriendlyName`='".$this->FriendlyName."'WHERE ID = '".$this->ID."'";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Connection->Execute($sql);
    }
    public function SelectByID(){
        $sql = "SELECT * FROM pages WHERE ID = '".$this->ID."'";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Result = $Connection->Execute($sql);
        $row = mysqli_fetch_array($Result);
        $Object = new self();
        $Object->setID($row['ID']);
        $Object->setFriendlyName($row['FriendlyName']);
        $Object->setURL($row['URL']);
        return $Object;
    }
    public function SelectAll(){
        $sql = "SELECT * FROM pages";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Result = $Connection->Execute($sql);
        $MyArray = array();
        $x=0;
        while ($row = mysqli_fetch_array($Result)){
            $MyArray[$x] = new self();
            $MyArray[$x]->setID($row['ID']);
            $MyArray[$x]->setFriendlyName($row['FriendlyName']);
            $x++;
        }
        return $MyArray;
    }
    public function CheckURL(){
        $sql = "SELECT * FROM pages WHERE URL = '".$this->URL."'";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Result = $Connection->Execute($sql);
        if ($Result->num_rows>0){
            return 1;
        }
        else{
            return 0;
        }
    }
    public function CheckFriendlyName(){
        $sql = "SELECT * FROM pages WHERE FriendlyName = '".$this->FriendlyName."'";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Result = $Connection->Execute($sql);
        if ($Result->num_rows>0){
            return 1;
        }
        else{
            return 0;
        }
    }

}
?>