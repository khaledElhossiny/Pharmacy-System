<?php
require_once ("NavBar.php");
?>
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
                    success : function (eq) {
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
<br>
<div style="text-align: center;">
    <fieldset>
        <label><h4 style="text-align: center;">Register</h4></label>
        <form action="../Controller/UserController.php" method="post">
       <label for="firstname">First Name</label> <input type = "text" name = "firstname" id = "firstname" required placeholder="First Name"><br><br>
        <label for="lastname">Last Name</label> <input type="text" name="lastname" id="lastname" required placeholder="Last Name"><br><br>
        <label for="email">Email</label> <input type="email" name = "email" id = "email" required placeholder="something@Something.com"><h5 id = "Message2" style="display: inline;"></h5><br><br>
        <label for="username">Username</label> <input type="text" name = "username" id = "username" placeholder="Username"><h5 id = "Message" style="display: inline;"></h5><br><br>
        <label for="password">Password</label> <input type = "password" name = "password" id = "password" placeholder="********" required><br><br>
        <label for="dob">Date Of Birith</label> <input type="date" name = "dob" id = "dob" required><br><br>
        <label for="address">Address</label> <input type="text" name = "address" id = "address" required placeholder="Street name , Cairo , Egypt"><br><br>
        <label for="phone">Phone</label> <input type="number" name = "phone" id = "phone" required placeholder="010000000000"><h5 id = "Message3" style="display: inline;"></h5><br><br>
       <label for="male">Male</label> <input type = "radio" name = "gender" id = "male" value = "male" required><br> <label for="female">Female</label> <input type="radio" name="gender" id="female"value="female" required >
        <br><input type="submit" name = "Register" id = "Register" value="Register" onclick="check()">
    </form>
    </fieldset>
</div>

</body>
</html>