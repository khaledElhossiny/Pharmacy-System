<?php
require_once ("../Controller/UserController.php");
require_once ("../Model/UserModel.php");
require_once ("../Controller/UserTypeController.php");
require_once ("../Model/UserTypeModel.php");
require_once ("../Model/UserModel.php");
require_once ("../Controller/UserController.php");
require_once ("NavBar.php");
if (!empty($_SESSION['ID'])){
    $UserController = new UserController();
    $Result = $UserController->checkAdminStatus($_SESSION['ID']);
    if ($Result == 1){

    }
    elseif ($Result == NULL){
        header("Location:AccessDenied.php");
        exit;
    }
    else{
        header("Location:Error.php");
        exit;
    }
}
else{
    header("Location:Login.php");
    exit;
}
$UserTypeController = new UserTypeController();
$Result2 = $UserTypeController->getUserTypes();

if (isset($_GET['ID'])){
      $ID = $_GET['ID'];
}
else{
    header("Location:DeleteUser.php");
    exit;
}


$UserController = new UserController();
$Result = $UserController->SelectUserData($ID);
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../Public/CSS/Menu.css">
    <script>
        function check() {
            var value = confirm("Please Make sure of the Permission before Continue")
            if (value){

            }
            else{
                event.preventDefault();
            }
        }
    </script>
</head>
<body>
<br>
<br>
<br>
<br><br><br><br>
<div style="text-align: center;">
    <fieldset>
        <div style="text-align: center">
            <form action = "../Controller/UserController.php" method="post">
                <label for="firstname">Firstname:</label> <input type="text" name = "firstname" id = "firstname" value="<?php echo $Result->getFirstname();?>" required><br>
                <label for="lastname">Lastname: </label> <input type="text" name = "lastname" id = "lastname" value="<?php echo $Result->getLastname();?>" required><br>
                <label for="address">Address:</label>  <input type="text" name = "address" id = "address" value="<?php echo $Result->getAddress();?>" required><br>
                <input type="number" value="<?php echo $Result->getID();?>" style="visibility: hidden;" name="ID" id = "ID"><br>
                <label for="usertype">Permission :</label>  <select id = "usertype" name = "usertype">
                    <?php
                    if ($Result2 != NULL){
                        for ($x=0;$x<sizeof($Result2);$x++){
                            echo "<option value='".$Result2[$x]->getID()."'>".$Result2[$x]->getType()."</option>";
                        }
                    }
                    else{
                        echo "<option>No Data to Show</option>";
                    }
                    ?>
                </select><br>
                <input type="submit" name = "modifyAdmin" value="Modify" id = "modifyAdmin" onclick="check()">
            </form>
        </div>
    </fieldset>

</div>

</body>
</html>
