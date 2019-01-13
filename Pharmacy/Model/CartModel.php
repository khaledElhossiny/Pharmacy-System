<?php
require_once ("../Public/Database/DatabaseConnection.php");
class CartModel{
    private $ID;
    private $Total_Price;
    private $User_ID;
    private $Status;

    public function getID()
    {
        return $this->ID;
    }
    public function setID($ID)
    {
        $this->ID = $ID;
    }
    public function getTotalPrice()
    {
        return $this->Total_Price;
    }
    public function setTotalPrice($Total_Price)
    {
        $this->Total_Price = $Total_Price;
    }
    public function getUserID()
    {
        return $this->User_ID;
    }
    public function setUserID($User_ID)
    {
        $this->User_ID = $User_ID;
    }
    public function getStatus()
    {
        return $this->Status;
    }
    public function setStatus($Status)
    {
        $this->Status = $Status;
    }

    public function Insert(){
        $sql = "INSERT INTO `cart`(`TotalPrice`, `User_ID`, `Status`) VALUES 
                  ('".$this->Total_Price."','".$this->User_ID."','".$this->Status."')";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Connection->Execute($sql);
    }
    public function Update(){
        $sql = "UPDATE `cart` SET `TotalPrice`='".$this->Total_Price."',`User_ID`='".$this->User_ID."',`Status`='".$this->Status."' WHERE ID = '".$this->ID."'";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Connection->Execute($sql);
   }
    public function SelectbyUserID(){
        $sql = "SELECT * FROM `cart` WHERE User_ID = '".$this->User_ID."'";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Result = $Connection->Execute($sql);
        if ($Result->num_rows>0){
            $Carts = array();
            $x = 0;
            while ($row = mysqli_fetch_array($Result)){
                $Carts[$x] = new CartModel();
                $Carts[$x]->setID($row['ID']);
                $Carts[$x]->setTotalPrice($row['TotalPrice']);
                $Carts[$x]->setUserID($row['User_ID']);
                $Carts[$x]->setStatus($row['Status']);
                $x++;
            }
            return $Carts;
        }
        else{
            return 0;
        }
    }
    public function SelectCart(){
        $sql = "SELECT ID FROM cart WHERE User_ID = '".$this->User_ID."' AND Status='0'";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Result = $Connection->Execute($sql);
        if ($Result->num_rows>0){
            $row = mysqli_fetch_array($Result);
            return $row['ID'];
        }
        else{
            return 0;
        }
    }
    public function SelectTotal(){
        $sql = "SELECT TotalPrice FROM cart WHERE ID = '".$this->ID."'";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Result = $Connection->Execute($sql);
        $row = mysqli_fetch_array($Result);
        return $row['TotalPrice'];
    }
    public function UpdatePrice(){
        $sql = "UPDATE `cart` SET `TotalPrice`='".$this->Total_Price."' WHERE ID = '".$this->ID."'";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Connection->Execute($sql);
    }

}
?>