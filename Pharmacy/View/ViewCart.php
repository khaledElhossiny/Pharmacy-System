<?php
require_once ("NavBar.php");
require_once ("../Controller/CartController.php");
require_once ("../Model/Cart_ItemsModel.php");
require_once ("../Controller/ProductController.php");
$CartController = new CartController();
$Results = $CartController->Select();
?>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="../Public/CSS/Menu.css">
</head>
<body>
<div style="text-align: center">
    <fieldset>
        <div style="text-align: center">
            <label>Cart Number: </label><br>
            <table>
                <tr>
                    <th>Product Name </th>
                    <th>Quantity</th>
                    <th>Price </th>
                </tr>
                <?php

                    if ($Results == 0){

                        echo "Your Cart is Empty";
                    }
                    else{
                        $ProductsController = new ProductController();
                        for ($x=0;$x<sizeof($Results);$x++){
                            echo "
                            <tr>
                                <td>".$ProductsController->SelectName($Results[$x]->getProductID())."</td>
                                <td>".$Results[$x]->getQuantity()."</td>
                                <td>".$Results[$x]->getTotalPrice()."</td>
                            </tr>
                        ";
                        }


                    }
                ?>

            </table>
            <label>Total Price: </label>
            <label style="float: right">Status: </label>



        </div>
    </fieldset>
</div>

</body>
</html>
