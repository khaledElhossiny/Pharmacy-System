<?php
require_once("../Model/ProductModel.php");
if (isset($_POST['Add_Product']) && !empty($_POST['name']))
{
    $ProductControllerObject = new ProductController();
    $ProductControllerObject->Add_Product();
    header("Location:../View/Add_Product.php");
    exit;

}
else if (isset($_POST['Add_Category']))
{
    $ProductControllerObject = new ProductController();
    $ProductControllerObject->Add_Category();
    header("Location:../View/Add_Category.php");
}
else if(isset($_POST['Search']))
{
    $ProductControllerObject = new ProductController();
    $ProductControllerObject->Search();
}
else if(isset($_POST['delete']) && !empty($_POST['checkbox']))
{
    $del_id=$_POST['checkbox'];
    $ProductControllerObject = new ProductController();
    $ProductControllerObject->Del($del_id);
    header("Location:../View/Delete_Product.php");
    exit;
}
else if(isset($_POST['Edit_Product']) && !empty($_POST['name']))
{
    $ProductControllerObject = new ProductController();
    $ProductControllerObject->edit($_POST['id'],$_POST['name'],$_POST['price'],$_POST['amount'],$_POST['description'],$_POST['img']);
    header("Location:../View/EditProduct.php");
}
else if(isset($_POST['check']))
{
    $ProductControllerObject = new ProductController();
    $ProductControllerObject->check($_POST["check"],$_POST['table']);
}
class ProductController
{
    public function Add_Product()
    {
        $Name = $_POST['name']; //get data of textbox 'name' from 'view' class
        $Price = $_POST['price'];
        $Amount=$_POST['amount'];
        $Description=$_POST['description'];
        //$Catgeory=$_POST['category'];
    //*******************************File Upload******************************************************//

        $errors= array();
      $file_name = $_FILES['myfile']['name'];
      $file_size = $_FILES['myfile']['size'];
      $file_tmp = $_FILES['myfile']['tmp_name'];
      $file_type = $_FILES['myfile']['type'];
      $tmp = explode('.',$_FILES['myfile']['name']);
      $file_ext = end($tmp);

      $expensions= array("jpeg","jpg","png");
      $file_name = rand().".png";

      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }

      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"../Public/ProductImages/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }

   //*******************************

        $ModelObject = new ProductModel();
        $ModelObject->set_product_name($Name);
        $ModelObject->set_product_price($Price);
        $ModelObject->set_product_amount($Amount);
        $ModelObject->set_product_description($Description);
        //$ModelObject->set_product_category($Catgeory);
        $ModelObject->set_product_img_path($file_name);
        $ModelObject->Insert_Product();
    }
    public function Add_Category()
    {
        $Catgeory=$_POST['category'];

        $ModelObject = new ProductModel();
        $ModelObject->set_product_category($Catgeory);
        $ModelObject->Insert_Category();
    }
    public function Search()
    {
        $Name=$_POST['name'];
        //echo $Name;
        $ModelObject = new ProductModel();
        $ModelObject->set_product_name($Name);
        return $ModelObject->Select();
        /*require_once("../View/Delete_Product.php");
        $ViewObject=new DeleteProduct();
        $ViewObject->set_delete_product_data($result);
        $ViewObject->search();*/
    }
    public function Search_ID($ID)
    {
        $ModelObject = new ProductModel();
        $ModelObject->set_product_id($ID);
        return $ModelObject->Select_ID();
    }
    public function select_img_path()
    {
        $modelObject=new ProductModel();
        return $modelObject->select_img_path();
    }
    public function delete_search($name)  //display items to delete them
    {
        //echo $name;
        $ModelObject = new ProductModel();
        $ModelObject->set_product_name($name);
        return $ModelObject->Select();
    }
    public function search_categories()
    {
        $ModelObject=new ProductModel();
        return $ModelObject->Select_categories();
    }
    public function Del($id_array)
    {
        for($i=0;$i<count($id_array);$i++)
        {
            $ModelObject = new ProductModel();
            $ModelObject->set_product_id($id_array[$i]);
            $result=$ModelObject->delete_product();
        }
    }
    public function edit($id,$name,$price,$amount,$description,$img)
    {
        echo $id." ".$name." ".$price." ".$amount." ".$description." ".$img."<br>";
        $ModelObject = new ProductModel();
        $ModelObject->set_product_id($id);
        $ModelObject->set_product_name($name);
        $ModelObject->set_product_price($price);
        $ModelObject->set_product_amount($amount);
        $ModelObject->set_product_description($description);
        $ModelObject->set_product_img_path($img);
        $ModelObject->edit_product();
    }
    public function check($str,$table)
    {
        $ModelObject = new ProductModel();
        if(mysqli_num_rows($ModelObject->check($str,$table))>0)
        {
            echo "Item already exists";
        }
    }
    public function SelectAll(){
        $ProductsModel = new ProductModel();
        $Results = $ProductsModel->SelectAll();
        return $Results;
    }
    public function SelectName($ID){
        $ProductModel = new ProductModel();
        $ProductModel->set_product_id($ID);
        return $ProductModel->SelectProductName();
    }
}
?>
