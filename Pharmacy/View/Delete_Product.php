<!DOCTYPE html>
<html>

  <head>
      <link rel="stylesheet" href="Delete_Product - Copy.css">
      <script type="text/javascript" src="Validations.js"></script>
  </head>
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
  <body>
		<!-- html search form for product -->
        <div id="del_product_div">
            <fieldset>
                <legend id="border_title">Delete Product</legend> <!--border title-->
                <form action = "" method="post" id="del_product_form">
                    <label class="add_product_form_labels">Name:</label>
                    <input type = "text" name = 'name' class="del_product_form_inputs"
                           onkeyup="text_validations(str);" required>
                    <label class="del_product_form_labels" id="check_label"></label>
                    <input type = "submit" name = "Search" value = "Search" id="Submit" class="del_product_form_inputs">
                </form>
                <!--div and fieldset closing is after the table in the PHP-->
  </body>
<?php
				/*$name="<script> document.getElementById('name').value; </script>";
				echo $name;*/
				$confirmation_message="Are you sure you want to DELETE this item?";
		   if(!empty($_POST['Search']))
		   {
				require_once("../Controller/ProductController.php");
				$ProductControllerObject=new ProductController();
				$result=$ProductControllerObject->delete_search($_POST['name']);
				if(mysqli_num_rows($result)>0)
				{
				    //display header
				    echo
				    "<table border='1' id='product_table'>
				    <form action='../Controller/ProductController.php' method='post'>
					    <tr bgcolor='#CCCCCC'>
						    <td>#</td> <td>ID</td> <td>Name</td> <td>Price</td> <td>Amount</td> <td>Delete</td>
					    </tr>";
	
				    while($rows=mysqli_fetch_array($result))
				    {
					    //display data
					    echo
					    "<tr>"
					    ."<td> <input type='checkbox' name= 'checkbox[]' id='checkbox[]' value=".$rows['ID']."> </td>"
					    ."<td>".$rows['ID']."</td>"
					    ."<td>".$rows['Name']."</td>"
					    ."<td>".$rows['Price']."</td>"
					    ."<td>".$rows['Amount']."</td>"
					    ."</tr>";
				    }
				    echo "</table>";
                    echo '<input type="submit" name="delete" value="delete" id="delete_but">';
                    echo "</form></fieldset></div>";
			    }
		   }
	  ?>
<footer>
    <p>Designed by Khaled Elhossiny, Mohamed Nashaat, Mina Magdy	Copyright ©2018 all rights reserved 	Contact information: <a href="mailto:someone@example.com">someone@example.com</a></p>
</footer>

</html>
