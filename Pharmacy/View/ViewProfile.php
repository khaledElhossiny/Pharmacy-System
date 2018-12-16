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

    </head>
    <body>
        First Name: <?php echo $Result->getFirstname(); ?><br>
        Last Name:  <?php echo $Result->getLastname(); ?><br>
        Email:      <?php echo $Result->getEmail(); ?><br>
        Date Of Birith: <?php echo $Result->getDOB(); ?><br>
        Username:  <?php echo $Result->getUsername(); ?><br>
        Address:    <?php echo $Result->getAddress(); ?><br>
        Gender:  <?php echo $Result->getGender(); ?><br>
        <a href="ModifyUser.php"><button>Modify Profile</button></a>
        <a href="ModifyPassword.php"><button>Modify Password</button></a>
        <a href="../Controller/UserController.php?request=delete"><button>Delete Profile</button></a>
    </body>
</html>
