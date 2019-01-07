<?php
require_once ("../Controller/UserController.php");
$ID = $_SESSION['ID'];
$UserController = new UserController();
$Username = $UserController->getUsername($ID);
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../Public/CSS/Menu.css"></head>
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
                    echo "<li><a href='Login.php'>Login</a><a href='Register.php'>Register</a> </li>";
                }


                ?>
            </ul>
        </nav>
    </div>
    <br>
        <div style="text-align: center;">

            <fieldset>
                <div style="text-align: center">
                    <label>You are modify the User : <?php echo $Username; ?></label>
                    <br>
                    <form action = "../Controller/UserController.php" method="post">
                        New Password: <input type="password" name = "password" id = "password" required><br>
                        <input type="number" name="ID" id="ID" value="<?php echo $ID; ?>" style="visibility: hidden;"><br>
                        <input type="submit" value="Modify" name="ModifyPassword" id = "ModifyPassword">
                    </form>
                </div>
            </fieldset>

        </div>

    </body>
</html>
