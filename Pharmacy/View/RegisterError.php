<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../Public/CSS/Menu.css"></head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="icon" href="../Public/Pictures/Logo.png">

<meta charset="UTF-8">
<title>Register</title>
<script>
    var checkUsername = false;
    var checkEmail = false;
    var checkPhone = false;
    $(document).ready(function () {
        $("#username").change(function () {
            var value = document.getElementById("username").value;
            $.ajax({
                type : "POST",
                url : "../Controller/UserController.php",
                data : {requestType : "Username" , Username : value},
                success : function (Response) {
                    if (Response == 0){
                        document.getElementById("Message").innerHTML = "Available To Use";
                        document.getElementById("Message").style.color = "green";
                        checkUsername = false
                    }
                    else{
                        document.getElementById("Message").innerHTML = "Previously Used Please use another one";
                        document.getElementById("Message").style.color = "red";
                        checkUsername = true;
                    }
                }
            });
        });

        $("#email").change(function () {
            var value2 = document.getElementById("email").value;
            $.ajax({
                type : "POST",
                url : "../Controller/UserController.php",
                data : {requestType : "Email" , Email : value2},
                success : function (Response2) {
                    if (Response2 == 0){
                        document.getElementById("Message2").innerHTML = "Available To Use";
                        document.getElementById("Message2").style.color = "green";
                        checkEmail = false
                    }
                    else{
                        document.getElementById("Message2").innerHTML = "Previously Used Please use another one or <a href='Login.php'>Login</a>";
                        document.getElementById("Message2").style.color = "red";
                        checkEmail = true;
                    }
                }
            });
        });
        $("#phone").change(function () {
            var value3 = document.getElementById("phone").value;
            $.ajax({
                type : "POST",
                url : "../Controller/PhoneController.php",
                data : {requestType : "phone" , phone : value3},
                success : function (Response3) {
                    if (Response3 == 0){

                        document.getElementById("Message3").innerHTML = "Available To Use";
                        document.getElementById("Message3").style.color = "green";
                        checkPhone = false
                    }
                    else{
                        document.getElementById("Message3").innerHTML = "Previously Used Please use another one or <a href='Login.php'>Login</a>";
                        document.getElementById("Message3").style.color = "red";
                        checkPhone = true;
                    }
                }
            });

        });
    });

    function check() {
        if(checkUsername == true || checkEmail == true || checkPhone == true){
            alert("Please check your data and try again")
            event.preventDefault();
        }
    }
</script>
</head>
<body>
<div class="navbar">
    <nav>
        <ul>
            <li><a href="UserHomePage.php">Home Page</a></li>
            <?php
            if (!empty($_SESSION['ID'])){
                echo "  <li><a href='ViewProfile.php'>Hello ".$_SESSION['ID']."</a>
            <a href='../Controller/UserController.php?request=logout'>(Logout)</a></li>";
            }
            else{
            echo "<li><a href='Login.php'>Login</a><a href='Register.html'>Register</a> </li>";
            }


            ?>
        </ul>
    </nav>
</div>
<br>
<h4 style="text-align: center;">Register</h4>
<div style="text-align: center;">
    <h4 style="color: red">Sorry there was an error</h4>
    <form action="../Controller/UserController.php" method="post">
        First Name <input type = "text" name = "firstname" id = "firstname" required placeholder="First Name"><br>
        Last Name <input type="text" name="lastname" id="lastname" required placeholder="Last Name"><br>
        Email <input type="email" name = "email" id = "email" required placeholder="something@Something.com"><h5 id = "Message2" style="display: inline;"></h5><br>
        Username <input type="text" name = "username" id = "username" placeholder="Username"><h5 id = "Message" style="display: inline;"></h5><br>
        Password <input type = "password" name = "password" id = "password" placeholder="********" required><br>
        Date Of Birith <input type="date" name = "dob" id = "dob" required><br>
        Address <input type="text" name = "address" id = "address" required placeholder="Street name , Cairo , Egypt"><br>
        Phone <input type="number" name = "phone" id = "phone" required placeholder="010000000000"><h5 id = "Message3" style="display: inline;"></h5><br>
        Gender: <input type = "radio" name = "gender" id = "male" value = "male" required>Male <input type="radio" name="gender" id="female"value="female" required >Female
        <br><input type="submit" name = "Register" id = "Register" value="Register" onclick="check()">
    </form>
</div>

</body>
</html>