<?php
require_once ("../Model/UserModel.php");
require_once ("../Controller/UserController.php");
$UserController = new UserController();
$UserArray = $UserController->SelectUsers();
?>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
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

</head>
<body>
<h1>User Panel</h1>
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
            <a href='ModifyUser.php?ID=".$UserArray[$x]->getID()."' ><img src='../Public/Pictures/Modify.png'height='20' width='20'></a></td>
            </tr>";
        }

        ?>
    </table>
</body>
</html>