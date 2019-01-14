<?php
require_once ("../Public/Database/DatabaseConnection.php");
class Cart_ItemsModel{
    private $ID;
    private $Cart_ID;
    private $Product_ID;
    private $Quantity;
    private $TotalPrice;

    public function getID()
    {
        return $this->ID;
    }
    public function setID($ID)
    {
        $this->ID = $ID;
    }
    public function getCartID()
    {
        return $this->Cart_ID;
    }
    public function setCartID($Cart_ID)
    {
        $this->Cart_ID = $Cart_ID;
    }
    public function getProductID()
    {
        return $this->Product_ID;
    }
    public function setProductID($Product_ID)
    {
        $this->Product_ID = $Product_ID;
    }
    public function getQuantity()
    {
        return $this->Quantity;
    }
    public function setQuantity($Quantity)
    {
        $this->Quantity = $Quantity;
    }
    public function getTotalPrice()
    {
        return $this->TotalPrice;
    }
    public function setTotalPrice($TotalPrice)
    {
        $this->TotalPrice = $TotalPrice;
    }

    public function Insert(){
        $sql = "INSERT INTO `cart_items`(`Cart_ID`, `Product_ID`, `Quantity`, `TotalPrice`) VALUES 
                ('".$this->Cart_ID."','".$this->Product_ID."','".$this->Quantity."','".$this->TotalPrice."')";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Connection->Execute($sql);
    }
    public function Delete(){
        $sql = "DELETE FROM `cart_items` WHERE ID = '".$this->ID."'";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Connection->Execute($sql);
    }
    public function SelectByCartID(){
        $sql = "SELECT * FROM `cart_items` WHERE Cart_ID = '".$this->Cart_ID."'";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Result = $Connection->Execute($sql);
        if ($Result->num_rows>0){
            $Objects = array();
            $x=0;
            while ($row = mysqli_fetch_array($Result)){
                $Objects[$x] = new self();
                $Objects[$x]->setID($row['ID']);
                $Objects[$x]->setCartID($row['Cart_ID']);
                $Objects[$x]->setProductID($row['Product_ID']);
                $Objects[$x]->setQuantity($row['Quantity']);
                $Objects[$x]->setTotalPrice($row['TotalPrice']);
                $x++;
            }
            return $Objects;
        }
        else{
            return 0;
        }
    }


}
?>