<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HomePage</title>
    <link rel="stylesheet" type="text/css" href="../Public/CSS/Menu.css"></head>
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
                echo "<li><a href='Login.php'>Login</a><a href='Register.php'>Register</a> </li>";
            }


            ?>
        </ul>
    </nav>
</div>


</body>
</html>