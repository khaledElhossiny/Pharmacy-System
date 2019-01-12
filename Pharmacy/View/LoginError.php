<?php
require_once ("NavBar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../Public/CSS/Menu.css"></head>
<meta charset="UTF-8">
    <title>Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="icon" href="../Public/Pictures/Logo.png">
    <script>
        var check = false;
        $(document).ready(function () {
            $("#username").change(function () {
                var value = document.getElementById("username").value;
                $.ajax({
                    type : "post",
                    url : "../Controller/UserController.php",
                    data : {requestType : "Login" , Username : value},
                    success : function (Data) {
                        if (Data == 1){
                            document.getElementById("PasswordDIV").style.visibility = "visible";
                            check = false;
                        }
                        else{
                            document.getElementById("PasswordDIV").style.visibility = "hidden";
                            check = true;
                        }
                    }
                });
            });
        });

        function check() {
            if (check == true){
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
        <div style="text-align: center">
            <label><h4>Login</h4></label><br>
            <label><h4 style="color: red;">An Error has occured Please try again later and check your Data</h4></label><br>
            <form action = "../Controller/UserController.php" method="post">
                <label for="username">Username / Email</label>  <input type="text" name = "username" id = "username" placeholder="Username or Email" required>
                <div id = "PasswordDIV" style="visibility: hidden;">
                    <label for="password">Password</label> <input type="password" name = "password" id = "password" placeholder="*****" required><br>
                    <input type="submit" name = "Login" id = "Login" value="Login">
                </div>
            </form>
        </div>
    </fieldset>

</div>
</body>
</html>