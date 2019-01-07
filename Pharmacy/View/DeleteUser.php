
<?php
//TODO Implement Search For the Table
require_once ("../Model/UserModel.php");
require_once ("../Controller/UserController.php");
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

$UserController = new UserController();
$UserArray = $UserController->SelectUsers();
?>
<html>
<head>
    <style>

    </style>
    <script>
        function Confirmation() {
            var value = confirm("Do you really want to delete this user");
            if (value){

            }
            else{
                event.preventDefault();
            }
        }
    </script>
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
<div style="text-align: center">
    <fieldset>
        <label><h1>User Panel</h1></label>

        <div style="text-align: center">
            <table>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
                <?php
                for ($x=0;$x<sizeof($UserArray);$x++){
                    echo " <tr>
            <td>".$UserArray[$x]->getFirstname()."</td>
            <td>".$UserArray[$x]->getLastname()."</td>
            <td>".$UserArray[$x]->getUsername()."</td>
            <td>".$UserArray[$x]->getEmail()."</td>
            <td>".$UserArray[$x]->getAddress()."</td>
            <td><a href='../Controller/UserController.php?action=Delete&ID=".$UserArray[$x]->getID()."' onclick='Confirmation()'><img src='../Public/Pictures/Delete.png'height='20' width='20'></a> 
            <a href='ModifyMenu.php?ID=".$UserArray[$x]->getID()."' ><img src='../Public/Pictures/Modify.png'height='20' width='20'></a></td>
            </tr>";
                }

                ?>
            </table>
        </div>
    </fieldset>
</div>


</body>
</html>