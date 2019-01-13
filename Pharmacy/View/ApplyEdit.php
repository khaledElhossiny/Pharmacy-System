<?php
require_once("../Controller/ProductController.php");
require_once ("NavBar.php");
$ProductControllerObject=new ProductController();
$result=$ProductControllerObject->Search_ID($_GET['id']);
while($row=mysqli_fetch_array($result))
{
    $id=$row['ID'];
    $name=$row['Name'];
    $price=$row['Price'];
    $amount=$row['Amount'];
    $description=$row['Description'];
    $img=$row['Img_Path'];
}
?>
<html>
<link rel="stylesheet" href="../Public/CSS/Menu.css">
<script type="text/javascript" src="Validations.js"></script>

<body>
    <div style="text-align: center">
        <fieldset>
            <div style="text-align: center">
                <form id="add_product_form" action = "../Controller/ProductController.php" method="post">

                    <label class="add_product_form_labels">Name:</label>
                    <input type = "text" name = 'name' class="add_product_form_inputs" value="<?php echo $name;?>"
                           onkeyup="text_validations(this.value);" required>

                    <label class="add_product_form_labels" id="check_label"></label>

                    <label class="add_product_form_labels">Price:</label>
                    <input type = "number" step="0.1" name = "price" class="add_product_form_inputs" value="<?php echo $price;?>" required> <br>

                    <label class="add_product_form_labels">Amount:</label>
                    <input type = "number" name = "amount" class="add_product_form_inputs" value="<?php echo $amount;?>" required> <br>

                    <label class="add_product_form_labels">Category:</label>
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
                    <label class="add_product_form_labels">Description:</label>
                    <textarea name="description" ><?php echo $description;?></textarea> <br>

                    <label class="add_product_form_labels">Select image source:</label>
                    <input type="file" accept=".jpg, .png, .jpeg" name="img" value="<?php echo $img;?>" required> <br>

                    <input type="hidden" name="id" value="<?php echo $id;?>"> <!--input id but is sent hidden-->

                    <input type = "submit" name = "Edit_Product" id="Submit" value = "Edit Product" class="add_product_form_inputs">
                </form>
            </div>

        </fieldset>
    </div>


</body>

</html>
