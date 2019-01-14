<?php
    require_once ("NavBar.php");
?>
<html>
<link rel="stylesheet" href="../Public/CSS/Menu.css">
<script type="text/javascript" src="Validations.js"></script>

<body>
            <div style="text-align: center">
                <fieldset>
                    <label><h4>Add Product</h4></label>
                    <form id="add_product_form" action = "../Controller/ProductController.php" method="post" enctype='multipart/form-data'>
                        <label >Name:</label> <input type = "text" name = 'name' class="add_product_form_inputs"
                                                                                    onkeyup="text_validations(this.value); entry_exists_in_DB(this.value,'product');" required>
                        <label id="check_label"></label>
                        <br><label>Price:</label> <input type = "number" name = "price"  required> <br>
                        <label >Amount:</label> <input type = "number" name = "amount" class="add_product_form_inputs" required> <br>
                        <label >Category:</label>
                        <select name="category">
                            <?php
                            require_once("../Controller/ProductController.php");
                            $ProductControllerObject=new ProductController();
                            $result=$ProductControllerObject->search_categories();
                            while($row=mysqli_fetch_array($result))
                            {
                                echo "<option name= 'category' value=".$row['ID'].">".$row['Name']."</option>";
                            }
                            ?>
                        </select> <br>
                        <label for="description">Description:</label> <textarea name="description" id = "description"></textarea> <br>
                        <label >Select image source:</label> <input type="file" accept=".jpg, .png, .jpeg" name="myfile"> <br>
                        <input type = "submit" name = "Add_Product" id="Submit" value = "Add Product" class="add_product_form_inputs">
                    </form>
                </fieldset>

            </div>

</body>

</html>
