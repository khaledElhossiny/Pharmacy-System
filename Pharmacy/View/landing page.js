var file_path="../Public/Pictures/";
var images=['1.jpg','2.jpg','3.jpg','4.png'];
var i=0;
function getImage()
{
	var image = images[Math.floor(Math.random()*images.length)]; //choose random index and return its image src
	return image;
}

function displayImage()
{
	var htmlImageEmelement1=document.getElementById("medicine_img_1");
	htmlImageEmelement1.src=(file_path+getImage());
	
	var htmlImageEmelement2=document.getElementById("medicine_img_2");
	htmlImageEmelement2.src=(file_path+getImage());
	
	var htmlImageEmelement3=document.getElementById("medicine_img_3");
	htmlImageEmelement3.src=(file_path+getImage());
}

window.onload=function()
{
	setInterval(function(){displayImage();}, 2000); /*diplays the function for a certain time in milliSeconds*/
}