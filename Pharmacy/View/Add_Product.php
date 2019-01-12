<html>
<link rel="stylesheet" href="Add_Product.css">
<script type="text/javascript" src="Validations.js"></script>

<body>
<div class="window_container">

	<div class="home_bar">
		<div class="hotline_div"> <img id="hotline_img" src="../Public/Pictures/hotline.png"></img> </div>
		
		<div class="dropdown_div">
			<button class="dropdown_but"> Categories </button>
			<div class="dropdown_content">
            <a href="#">link1</a>
            <a href="#">link2</a>
            <a href="#">link3</a>
            </div>
		</div> 
		
		<div class="search_div">
			<form  action="../Controller/ProductController.php" method="post">
				<input type="textbox" name="product_search" id="search_box"  placeholder="Search" >
			</form>
		</div>
		
		<div id="bar_links_div">
			<div> <a href="#" class="bar_links"><b>Home</b></a> </div>
			<div> <a href="#" class="bar_links"><b>Login</b></a> </div>
			<div> <a href="#" class="bar_links"><b>Register</b></a> </div>
		</div>
	</div>
	
	<div id="add_product_div">
        <fieldset>
            <legend id="border_title">Add Product</legend> <!--border title-->
            <form id="add_product_form" action = "../Controller/ProductController.php" method="post">
                <label class="add_product_form_labels">Name:</label> <input type = "text" name = 'name' class="add_product_form_inputs"
                                             onkeyup="text_validations(this.value); entry_exists_in_DB(this.value,'product');" required>
                <label class="add_product_form_labels" id="check_label"></label>
                <label class="add_product_form_labels">Price:</label> <input type = "number" step="0.1" name = "price" class="add_product_form_inputs" required> <br>
                <label class="add_product_form_labels">Amount:</label> <input type = "number" name = "amount" class="add_product_form_inputs" required> <br>
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
                <label class="add_product_form_labels">Description:</label> <textarea name="description"></textarea> <br>
                <label class="add_product_form_labels">Select image source:</label> <input type="file" accept=".jpg, .png, .jpeg" name="img_path"> <br>
                <input type = "submit" name = "Add_Product" id="Submit" value = "Add Product" class="add_product_form_inputs">
            </form>
        </fieldset>
    </div>

</div>
</body>

<footer>
	<p>Designed by Khaled Elhossiny, Mohamed Nashaat, Mina Magdy	Copyright ©2018 all rights reserved 	Contact information: <a href="mailto:someone@example.com">someone@example.com</a></p>
</footer>
</html>
