<?php
require_once ("../Public/Database/DatabaseConnection.php");

class UserTypeModel{
    private $ID;
    private $Type;
    public function getID()
    {
        return $this->ID;
    }
    public function setID($ID)
    {
        $this->ID = $ID;
    }
    public function getType()
    {
        return $this->Type;
    }
    public function setType($Type)
    {
        $this->Type = $Type;
    }

    public function Select(){
        $sql = "SELECT * FROM usertype";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Result = $Connection->Execute($sql);
        if ($Result->num_rows>0){
            $MyArray = array();
            $x=0;
            while ($Row = mysqli_fetch_array($Result)){
                $Object = new UserTypeModel();
                $Object->setID($Row['ID']);
                $Object->setType($Row['Type']);
                $MyArray[$x] = $Object;
                $x++;
            }
            return $MyArray;
        }
        else{
            return NULL;
        }
    }
}
?>