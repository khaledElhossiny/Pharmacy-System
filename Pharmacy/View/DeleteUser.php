
<?php
//TODO Implement Search For the Table
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

$UserController = new UserController();
$UserArray = $UserController->SelectUsers();
?>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        function Confirmation() {
            var value = confirm("Do you really want to delete this user");
            if (value){

            }
            else{
                event.preventDefault();
            }
        }
        
        function search(){
            var Value = document.getElementById("search").value;
            if (Value == ""){
                
            }
            else{
                $.ajax({
                    type : "post",
                    url : "../Controller/UserController.php",
                    data : {requestType : "search" , value : Value},
                    success : function (data) {

                       if (data == 0){
                           var rowCount = document.getElementById('users').rows.length;
                           for (var x=1; x<rowCount;x++){
                               document.getElementById("users").deleteRow(x);

                           }
                           var table = document.getElementById("users");
                           var Row = table.insertRow(1);
                           Row.innerHTML = "Sorry No Results Found";
                           Row.style.color = "white";
                       }
                       else{
                           var Data = JSON.parse(data);
                       }

                    }
                });
            }
        }
    </script>
    <link rel="stylesheet" type="text/css" href="../Public/CSS/Menu.css"></head>

</head>
<body>
<br>
<div style="text-align: center">
    <fieldset>
        <input type="text" name = "search" id = "search" onkeyup="search()">
        <label><h1>User Panel</h1></label>

        <div style="text-align: center">
            <table id = "users">
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