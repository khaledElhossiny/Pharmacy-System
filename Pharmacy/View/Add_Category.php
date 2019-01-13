<?php
    require_once ("NavBar.php");
?>
<html>
<head>
    <link rel="stylesheet" href="../Public/CSS/Menu.css">
    <script type="text/javascript" src="Validations.js"></script>
</head>

<body>
    <div style="text-align: center">
        <fieldset>
            <div style="text-align: center">
                <form id="add_product_form" action = "../Controller/ProductController.php" method="post">
                    <label class="add_product_form_labels">Category:</label>
                    <input type = "text" name = 'category' class="add_product_form_inputs"
                           onkeyup="text_validations(this.value);entry_exists_in_DB(this.value,'category');" required> <br>
                    <label id="check_label"></label>
                    <input type = "submit" name = "Add_Category" id="Submit" value = "Add Category" class="add_product_form_inputs">
                </form>
            </div>

        </fieldset>
    </div>

</body>



</html>
