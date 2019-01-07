<?php
require_once ("../Controller/UserController.php");
require_once ("../Model/UserModel.php");
if(!empty($_SESSION['ID'])){
    $UserController = new UserController();
    $Result = $UserController->SelectUserData($_SESSION['ID']);
}
else{
    header("Location:Login.php");
}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../Public/CSS/Menu.css"></head>
    <script>
            function ConfrimUserDelete() {
                var Choice = confirm("Do You Really Want to Delete Your Profile Once You Delete it you won't be able to access it again");
                if (Choice){

                }
                else{
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
        <div style="text-align: center">
            <label>First Name: <?php echo $Result->getFirstname(); ?></label><br>
            <label>Last Name:  <?php echo $Result->getLastname(); ?></label><br>
            <label> Email:      <?php echo $Result->getEmail(); ?></label><br>
            <label>Date Of Birith: <?php echo $Result->getDOB(); ?></label><br>
            <label>Username:  <?php echo $Result->getUsername(); ?></label><br>
            <label>Address:    <?php echo $Result->getAddress(); ?></label><br>
            <label>Gender:  <?php echo $Result->getGender(); ?></label><br>
            <label><a href="ModifyUser.php"><button>Modify Profile</button></a>
                <label><a href="ModifyPassword.php"><button>Modify Password</button></a>
        <a href="../Controller/UserController.php?request=delete"><button onclick="ConfrimUserDelete()">Delete Profile</button></a>
        </div>
    </fieldset>
    </div>
    </body>
</html>
