<?php
require_once ("../Controller/UserController.php");
require_once ("../Model/UserModel.php");
require_once ("NavBar.php");
if(!empty($_GET['ID'])){
    $UserController = new UserController();
    $Result = $UserController->SelectUserData($_GET['ID']);
}
else{
    header("Location:Login.php");
}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../Public/CSS/Menu.css"></head>

</head>
<body>
<br>
<div style="text-align: center">
    <fieldset>
        <label>Modify User</label>
        <br>
        <div style="text-align: center">
            <label>First Name: </label><?php echo $Result->getFirstname(); ?><br>
            <label>Last Name:  </label><?php echo $Result->getLastname(); ?><br>
            <label>Email:      </label><?php echo $Result->getEmail(); ?><br>
            <label>Date Of Birith: </label><?php echo $Result->getDOB(); ?><br>
            <label>Username:  </label><?php echo $Result->getUsername(); ?><br>
            <label>Address:    </label><?php echo $Result->getAddress(); ?><br>
            <label>Gender:  </label><?php echo $Result->getGender(); ?><br>
            <a href="ModifyAdmin.php?ID=<?php echo $_GET['ID']?>"><button>Modify Profile</button></a>
            <a href="ModifyEmail.php?ID=<?php echo $_GET['ID'] ?>"><button>Modify Email Address</button></a>
        </div>
    </fieldset>
</div>


</body>
</html>
