<?php
require_once ("../Controller/UserController.php");
require_once ("NavBar.php");
$ID = $_SESSION['ID'];
$UserController = new UserController();
$Username = $UserController->getUsername($ID);
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../Public/CSS/Menu.css"></head>
    </head>
    <body>
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
