<?php
require_once ("../Controller/UserController.php");
require_once ("../Model/UserModel.php");
require_once ("NavBar.php");
if (!empty($_SESSION['ID']) || isset($_GET['ID'])){
    if (isset($_GET['ID'])){
        $ID = $_GET['ID'];
    }
    else{
        $ID = $_SESSION['ID'];
    }
}
else{
    header("Location:Login.php");
    exit;
}


$UserController = new UserController();
$Result = $UserController->SelectUserData($ID);
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../Public/CSS/Menu.css"></head>

</head>
<br>
<body>
<div style="text-align: center;">
    <fieldset>
        <div style="text-align: center">
            <form action = "../Controller/UserController.php" method="post">
                <label for="firstname">Firstname:</label> <input type="text" name = "firstname" id = "firstname" value="<?php echo $Result->getFirstname();?>" required><br>
                <label for="lastname">Lastname:</label> <input type="text" name = "lastname" id = "lastname" value="<?php echo $Result->getLastname();?>" required><br>
                <label for="address">Address:</label> <input type="text" name = "address" id = "address" value="<?php echo $Result->getAddress();?>" required><br>
                <input type="number" value="<?php echo $Result->getID();?>" style="visibility: hidden;" name="ID" id = "ID"><br>
                <input type="submit" name = "modify" value="Modify" id = "modify">
            </form>
        </div>
    </fieldset>

</div>

</body>
</html>
