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
<div class="navbar">
    <nav>
        <ul>
            <li><a href="UserHomePage.php">Home Page</a></li>
            <?php
            session_start();
            if (!empty($_SESSION['ID'])){
                echo "  <li><a href='ViewProfile.php'>Hello ".$_SESSION['ID']."</a>
            <a href='../Controller/UserController.php?request=logout'>(Logout)</a></li>";
            }
            else{
            echo "<li><a href='Login.html'>Login</a><a href='Register.php'>Register</a> </li>";
            }


            ?>
        </ul>
    </nav>
</div>
<br>
<div style="text-align: center;">
    <h4>Login</h4>
    <h4 style="color: red;">An Error has occured Please try again later and check your Data</h4>
    <form action = "../Controller/UserController.php" method="post">
        Username / Email <input type="text" name = "username" id = "username" placeholder="Username or Email" required>
        <div id = "PasswordDIV" style="visibility: hidden;">
            Password <input type="password" name = "password" id = "password" placeholder="*****" required><br>
            <input type="submit" name = "Login" id = "Login" value="Login">
        </div>
    </form>
</div>
</body>
</html>