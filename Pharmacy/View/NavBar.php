<html>
<head>
    <link rel="stylesheet" type="text/css" href="../Public/CSS/Menu.css"></head>

</head>
<body>
<div class="navbar">
    <nav>
        <ul>
<?php
if(session_id()==''){
    session_start();
}
if (!empty($_SESSION['ID'])){
    require_once ("../Controller/UsertypePagesController.php");
    require_once ("../Model/UsertypePagesModel.php");
    $UserTypePages = new UsertypePagesController();
    $Pages = $UserTypePages->NavBarItems($_SESSION['Usertype']);
    require_once ("../Controller/UserController.php");
    $UserController = new UserController();
    $Username = $UserController->getUsername($_SESSION['ID']);
    ?>
    <li><a href="UserHomePage.php">Home Page</a></li>
    <?php
    for ($x=0;$x<sizeof($Pages);$x++){
        echo "<li><a href=".$Pages[$x]->getURL().">".$Pages[$x]->getFriendlyName()."</a></li>";
    }
    echo "  <li><a href='ViewProfile.php'>Hello ".$Username."</a> ";
}
else{
    echo $_SESSION['ID'];
}
?>
        </ul>
    </nav>
</div>
<br>
</body>
</html>