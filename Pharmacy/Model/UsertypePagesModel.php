<?php
require_once ("../Public/Database/DatabaseConnection.php");
require_once ("PagesModel.php");
class UsertypePagesModel{
    private $ID;
    private $Usertype_ID;
    private $Pages_ID;

    public function getID()
    {
        return $this->ID;
    }
    public function setID($ID)
    {
        $this->ID = $ID;
    }
    public function getUsertypeID()
    {
        return $this->Usertype_ID;
    }
    public function setUsertypeID($Usertype_ID)
    {
        $this->Usertype_ID = $Usertype_ID;
    }
    public function getPagesID()
    {
        return $this->Pages_ID;
    }
    public function setPagesID($Pages_ID)
    {
        $this->Pages_ID = $Pages_ID;
    }

    public function Insert(){
        $sql = "INSERT INTO `usertypepages`(`Usertype_ID`, `Pages_ID`) 
                  VALUES ('".$this->Usertype_ID."', '".$this->Pages_ID."')";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Connection->Execute($sql);
    }

    public function Delete(){
        $sql = "DELETE FROM `usertypepages` WHERE ID = '".$this->ID."'";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Connection->Execute($sql);
    }

    public function SelectwithUserType(){
        $sql = "SELECT * FROM `usertypepages` WHERE Usertype_ID = '".$this->Usertype_ID."'";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Result = $Connection->Execute($sql);
        $MyObjects = array();
        $x = 0;
        while ($row = mysqli_fetch_array($Result)){
            $MyObjects[$x] = new self();
            $MyObjects[$x]->setID($row['ID']);
            $MyObjects[$x]->setUsertypeID($row['Usertype_ID']);
            $MyObjects[$x]->setPagesID($row['Pages_ID']);
            $x++;
        }
        return $MyObjects;
    }
    public function Check(){
        $sql = "SELECT * FROM usertypepages WHERE Usertype_ID = '".$this->Usertype_ID."' AND Pages_ID = '".$this->Pages_ID."'";
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