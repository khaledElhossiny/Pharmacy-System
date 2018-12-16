<?php
require_once ("../Controller/UserController.php");
$ID = $_SESSION['ID'];
$UserController = new UserController();
$Username = $UserController->getUsername($ID);
?>
<html>
    <head>

    </head>
    <body>
        <div style="text-align: center;">
            You are modify the User : <?php echo $Username; ?>
            <form action = "../Controller/UserController.php" method="post">
                New Password: <input type="password" name = "password" id = "password" required><br>
                <input type="number" name="ID" id="ID" value="<?php echo $ID; ?>" style="visibility: hidden;"><br>
                <input type="submit" name="ModifyPassword" id = "ModifyPassword">
            </form>
        </div>

    </body>
</html>
