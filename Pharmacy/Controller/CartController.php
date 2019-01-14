<?php
if (session_id() == ''){
    session_start();
}
require_once ("../Model/CartModel.php");
if (isset($_GET['ID'])){
    echo "Good";
    CartController::AddItem();
}
class CartController{
    public function AddItem(){
        if (empty($_SESSION['ID'])){
            header("Location:../View/Login.php");
            exit;

        }
        $CartModel = new CartModel();
        $CartModel->setUserID($_SESSION['ID']);
        $Result = $CartModel->SelectCart();
        if ($Result == 0){
            $CartModel->setStatus(0);
            $CartModel->setTotalPrice(0);
            $CartModel->Insert();
            $Result = $CartModel->SelectCart();
        }

            require_once ("../Model/ProductModel.php");
            $ProductModel = new ProductModel();
            $ProductModel->set_product_id($_GET['ID']);
            $Price = $ProductModel->SelectPrice();
            require_once ("../Model/Cart_ItemsModel.php");
            $Item = new Cart_ItemsModel();
            $Item->setCartID($Result);
            $Item->setProductID($_GET['ID']);
            $Item->setQuantity(1);
            $Item->setTotalPrice($Price);
            $Item->Insert();
            $CartModel->setID($Result);
            $TotalPrice = $CartModel->SelectTotal();
            $TotalPrice = $TotalPrice + $Price;
            $CartModel->setTotalPrice($TotalPrice);
            $CartModel->UpdatePrice();

    }
}
?>