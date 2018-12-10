<?php
require_once ("../Public/Database/DatabaseConnection.php");
class PhoneModel{
    private $ID;
    private $Phone;
    private $User_ID;

    public function getID()
    {
        return $this->ID;
    }
    public function setID($ID)
    {
        $this->ID = $ID;
    }
    public function getPhone()
    {
        return $this->Phone;
    }
    public function setPhone($Phone)
    {
        $this->Phone = $Phone;
    }
    public function getUserID()
    {
        return $this->User_ID;
    }
    public function setUserID($User_ID)
    {
        $this->User_ID = $User_ID;
    }

    public function Insert(){
        $sql = "INSERT INTO `phone_numbers`(`Phone`, `User_ID`)
                VALUES ('".$this->Phone."','".$this->User_ID."')";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Connection->Execute($sql);
    }
    public function CheckPhone(){
        $sql = "SELECT * FROM phone_numbers WHERE Phone = '".$this->Phone."'";
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