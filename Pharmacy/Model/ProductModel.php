<?php
require_once("../Public/Database/DBConnect.php");
class ProductModel
{ 
  private $ID;
  private $Name;
  private $Price;
  private $Amount;
  private $Description;
  private $Category;
  private $img_path;
  

  /*****************************************************SETTERS***************************************/
  public function set_product_id($id)
  {
	  $this->ID=$id;
  }
  public function set_product_name($name)
  {
	  $this->Name=$name;
  }
  public function set_product_price($price)
  {
	  $this->Price=$price;
  }
  public function set_product_amount($amount)
  {
	  $this->Amount=$amount;
  }
  public function set_product_description($description)
  {
	  $this->Description=$description;
  }
  public function set_product_category($category)
  {
	  $this->Category=$category;
  }
  public function set_product_img_path($path)
  {
	  $this->img_path=$path;
  }
  /*****************************************************GETTERS***************************************/
  public function get_product_id()
  {
	  return $this->ID;
  }
  public function get_product_name()
  {
	  return $this->Name;
  }
  public function get_product_price()
  {
	  return $this->Price;
  }
  public function get_product_amount()
  {
	  return $this->Amount;
  }
  public function get_product_descritption()
  {
	  return $this->Description;
  }
  public function get_product_category()
  {
	  return $this->Category;
  }
  public function get_product_imge_path()
  {
	  return $this->img_path;
  }
  /****************************************************************FUNCTIONS************************************/
  public function Insert_Product(){
      //$sql = "INSERT INTO `product`(`Name`, `Price`, `Amount`) VALUES ('".$this->Name."' , '".$this->Price."' , '".$this->Amount."')";
      $sql="INSERT INTO `product`(`Category_ID`, `Name`, `Amount`, `Price`, `Description`, `Img_Path`)
				VALUES ('".$this->Category."','".$this->Name."','".$this->Amount."','".$this->Price."','".$this->Description."','".$this->img_path."')";
	  echo $sql;
       $DatabaseObject = new DBConnect();
       $DatabaseObject->connect();
       $DatabaseObject->execute($sql);
  }
  public function Insert_Category(){
      //$sql = "INSERT INTO `product`(`Name`, `Price`, `Amount`) VALUES ('".$this->Name."' , '".$this->Price."' , '".$this->Amount."')";
      $sql="INSERT INTO `category`(`Category_Name`) VALUES ('".$this->Category."')";
	  echo $sql;
       $DatabaseObject = new DBConnect();
       $DatabaseObject->connect();
       $DatabaseObject->execute($sql);
  }
  public function Select()
  {
	  $sql="SELECT * FROM `product` WHERE Name like '%".$this->Name."%' ";
	  $DatabaseObject= new DBConnect();
	  $DatabaseObject->connect();
	  $result=$DatabaseObject->execute($sql);
	  return $result;
  }
  public function Select_categories()
  {
	  $sql="SELECT * FROM `category`";
	  $DatabaseObject= new DBConnect();
	  $DatabaseObject->connect();
	  $result=$DatabaseObject->execute($sql);
	  /*while($row=$result)
	  {
		  echo "".$row['Category_ID']."";
	  }*/
	  return $result;
  }
    public function Select_ID()
    {
        $sql="SELECT * FROM `product` WHERE ID = '".$this->ID."' ";
        $DatabaseObject= new DBConnect();
        $DatabaseObject->connect();
        $result=$DatabaseObject->execute($sql);
        return $result;
    }
  public function delete_product()
  {
	  $sql="DELETE FROM `product` WHERE ID= '".$this->ID."' ";
	  $DatabaseObject= new DBConnect();
	  $DatabaseObject->connect();
	  return $DatabaseObject->execute($sql);
  }
  public function edit_product()
  {
	  echo $this->Name;
	  echo $this->Price;
	  echo $this->Amount;
	  $sql="UPDATE `product` SET`Name`='".$this->Name."',`Price`='".$this->Price."',`Amount`='".$this->Amount."'
	   ,`Description`='".$this->Description."', `Img_Path`='".$this->img_path."' WHERE ID='".$this->ID."' ";
	  echo $sql;
	  $DatabaseObject= new DBConnect();
	  $DatabaseObject->connect();
	  $DatabaseObject->execute($sql);
  }
  public function check($str,$table)
  {
      $sql="SELECT * FROM `$table` WHERE Name='$str'";
      $DatabaseObject= new DBConnect();
      $DatabaseObject->connect();
      $result=$DatabaseObject->execute($sql);
      return $result;
  }
  public function select_img_path()
  {
	  $sql="select Img_Path from product";
	  $DatabaseObject= new DBConnect();
	  $DatabaseObject->connect();
	  $result=$DatabaseObject->execute($sql);
	  return $result;
  }
}
?>
