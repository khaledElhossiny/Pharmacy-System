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
    <link rel="stylesheet" type="text/css" href="../Public/CSS/Menu.css"></head>

</head>
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
