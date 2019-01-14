<?php
require_once ("NavBar.php");

?>
<html>
<link rel="stylesheet" href="../Public/CSS/Menu.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
    <div style="text-align: center">
	<div class="product_container">

        <?php
            require_once ("../Controller/ProductController.php");
            $ProductController = new ProductController();
            $Results = $ProductController->SelectAll();
            $z=0;
            for ($x=0;$x<sizeof($Results);$x++){
                echo "<fieldset>
                        <div class = 'prod'>
                        <img src = ../Public/ProductImages/".$Results[$x]->get_product_imge_path()." width='150px' height='150px'>
                        <h5>".$Results[$x]->get_product_name()."</h5>
                        <h5>".$Results[$x]->get_product_price()."</h5>
                        <a href='../Controller/CartController.php?ID= ".$Results[$x]->get_product_id()."'> <button>Add To Cart </button></a>
                        </div>
                        </fieldset>";

            }

        ?>


    </div>
    </div>
</body>
</html>