<?php
require_once ("../Controller/UserController.php");
require_once ("../Model/UserModel.php");
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

</head>
<body>
First Name: <?php echo $Result->getFirstname(); ?><br>
Last Name:  <?php echo $Result->getLastname(); ?><br>
Email:      <?php echo $Result->getEmail(); ?><br>
Date Of Birith: <?php echo $Result->getDOB(); ?><br>
Username:  <?php echo $Result->getUsername(); ?><br>
Address:    <?php echo $Result->getAddress(); ?><br>
Gender:  <?php echo $Result->getGender(); ?><br>
<a href="ModifyAdmin.php?ID=<?php echo $_GET['ID']?>"><button>Modify Profile</button></a>
<a href="ModifyEmail.php?ID=<?php echo $_GET['ID'] ?>"><button>Modify Email Address</button></a>
</body>
</html>
