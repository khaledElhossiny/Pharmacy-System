<?php
require_once ("NavBar.php");
?>
<!DOCTYPE html>
<html>

  <head>
      <link rel="stylesheet" href="../Public/CSS/Menu.css">
      <script type="text/javascript" src="Validations.js"></script>
  </head>

  <body>
        <div style="text-align: center">

            <fieldset>
                <legend id="border_title">Edit Product</legend> <!--border title-->
                <form action = "" method="post" id="del_product_form">
                    <label class="add_product_form_labels">Name:</label>
                    <input type = "text" name = 'name' class="del_product_form_inputs"
                           onkeyup="text_validations(str);" required>
                    <label class="del_product_form_labels" id="check_label"></label>
                    <br><input type = "submit" name = "Search" value = "Search" id="Submit" class="del_product_form_inputs">
                </form>
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
				    <form action=''>
					    <tr bgcolor='#CCCCCC'>
						    <td>ID</td> <td>Name</td> <td>Price</td> <td>Amount</td> <td>Description</td> <td>Image</td> <td>Edit</td>
					    </tr>";
	
				    while($rows=mysqli_fetch_array($result))
				    {
					    //display data
					    echo
					    "<tr>"
					    ."<td>".$rows['ID']."</td>"
                        ."<td>".$rows['Name']."</td>"
                        ."<td>".$rows['Price']."</td>"
                        ."<td>".$rows['Amount']."</td>"
                        ."<td>".$rows['Description']."</td>"
                        ."<td>".$rows['Img_Path']."</td>"
                        ."<td>".'<a href="ApplyEdit.php?id='.$rows['ID'].'">edit</a>'."</td>"
					    ."</tr>";
				    }
				    echo "</table>";
                    echo "</form></fieldset></div>";
			    }
		   }
	  ?>


</html>
