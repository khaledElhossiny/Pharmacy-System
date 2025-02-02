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
                            document.getElementById("Message").style.visibility = "hidden";
                        }
                        else{
                            document.getElementById("PasswordDIV").style.visibility = "hidden";
                            check = true;
                            document.getElementById("Message").style.visibility = "visible";
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
        <label><h4 style="text-align: center;">Login</h4></label>
        <form action = "../Controller/UserController.php" method="post">
        <label for="username">Username / Email</label>
        <input type="text" name = "username" id = "username" placeholder="Username or Email" required><h5 id = "Message" style="display: inline; visibility: hidden;color: red;">Sorry this user doesn't exist</h5>
        <div id = "PasswordDIV" style="visibility: hidden;">
          <br>  <label for="password">Password</label> <input type="password" name = "password" id = "password" placeholder="*****" required><br>
          <br>  <input type="submit" name = "Login" id = "Login" value="Login">
        </div>
    </form>
    </fieldset>
</div>
</body>
</html>