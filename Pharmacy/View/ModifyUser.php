<?php
require_once ("../Controller/UserController.php");
require_once ("../Model/UserModel.php");
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

</head>
<body>
<div style="text-align: center;">
    <form action = "../Controller/UserController.php" method="post">
        Firstname: <input type="text" name = "firstname" id = "firstname" value="<?php echo $Result->getFirstname();?>" required><br>
        Lastname: <input type="text" name = "lastname" id = "lastname" value="<?php echo $Result->getLastname();?>" required><br>
        Address: <input type="text" name = "address" id = "address" value="<?php echo $Result->getAddress();?>" required><br>
        <input type="number" value="<?php echo $Result->getID();?>" style="visibility: hidden;" name="ID" id = "ID"><br>
        <input type="submit" name = "modify" value="Modify" id = "modify">
    </form>
</div>

</body>
</html>
