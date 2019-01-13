<?php
			require_once("../Controller/ProductController.php");
			$viewControllerObject=new ProductController();
			$result=$viewControllerObject->select_img_path();
			while($row=mysqli_fetch_array($result))
			{
				$img[]=$row["Img_Path"];
				
			}


?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<script>
//	console.log(img);

	
	
		//	console.log(typeof(images));
		//var image = images[Math.floor(Math.random()*images.length)]; //choose random index and return its image src
		var images = <?php echo json_encode($img); ?>;
	function displayImage(value)
	{
		var page_number=parseInt(value);
		var last_img=(15*page_number)-1;
		var first_img=(last_img-15)+1;
		//console.log(first_img);
		//var div=document.getElementById("prod1");
		//$(document).ready(function(){
//for(var x=0;x<images.length%15;x++){
	//	$("#prod"+x).hide()
//}
//});
			//	var getdivID =document.getElmenetById("product_container_1");
			
	
		for(var i=first_img ; i<=last_img;i++){
            if(i<images.length){
                console.log(i); 
                var x=1;
                var div=document.createElement("div"); 
				div.setAttribute('id','prod'+i);
				div.setAttribute('class','prod');
				var x = document.createElement("IMG");
				var buttonImg = document.createElement("IMG");
				var button= document.createElement("button");
				var label= document.createElement("label");
				label.setAttribute("value","dhbgwe");
				x.setAttribute("id","medicine_img_"+((i%15)+1));
				button.setAttribute("id","button_id_"+((i%15)+1));
                button.setAttribute('class',"add_to_cart_but");
				button.setAttribute("value", "helloButton");
    			buttonImg.setAttribute("src","cart.png");
				button.innerHTML = 'test value';
				//button.appendChild(label);
				//button.attachEvent('OnClick',);   //add to cart 
				button.appendChild(buttonImg);
                div.appendChild(x);
                div.appendChild(button);
                if(i==5||i==10||i==15)
                {
                    if(x<=3){
                      x++  
                    }
                    
                }
				var theMainContainer = document.getElementById("product_container_1");
                theMainContainer.appendChild(div);	var htmlImageEmelement1=document.getElementById("medicine_img_"+((i%15)+1));
		//console.log(((i%15)+1));
		
		htmlImageEmelement1.setAttribute('src',images[i])
            }
           

        


	;
		}
	}
	
	</script>
<link rel="stylesheet" href="display random img.css">

<body>
<div class="window_container">

	<div class="home_bar">
		<div class="dropdown">
			<button class="dropdown_but"> Categories </button>
			<div class="dropdown_content">
				<a href="#">link1</a>
				<a href="#">link2</a>
				<a href="#">link3</a>
			</div>
		</div>
		
		<div class="search_div">
			<input type="textbox" id="search_box" placeholder="Search" >
		</div>
		
		<div id="bar_links_div">
			<div> <a href="#" class="bar_links">Home</a> </div>
			<div> <a href="#" class="bar_links">Login</a> </div>
			<div> <a href="#" class="bar_links">Register</a> </div>
		</div>
	</div>
	<div class="product_container_0">
		<div>
				<input type="button" onclick="displayImage(this.value)" id="myBtn1" value="1">
				<input type="button" onclick="displayImage(this.value)" id="myBtn2" value="2">
				<input type="button" onclick="displayImage(this.value)" id="myBtn3" value="3">
				<p > your page number equal = </p>
				<p id="demo"></p>
		</div>
		
	<div class="product_container" id="product_container_1">
	
    </div>
    <div class="product_container" id="product_container_2">
	
    </div>
    <div class="product_container" id="product_container_3">
	
	</div>

	
</div>
</div>

