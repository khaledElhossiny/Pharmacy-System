<?php
require_once ("../Controller/UserController.php");
require_once ("NavBar.php");
$ID = $_GET['ID'];
$UserController = new UserController();
$Email = $UserController->SelectMail($ID);
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../Public/CSS/Menu.css"></head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="icon" href="../Public/Pictures/Logo.png">
        <script>
            var checkEmail = false;
            var mail = "<?php echo $Email; ?>";
            $(document).ready(function () {
                $("#email").change(function () {
                    if (document.getElementById("email").value == mail){
                        alert("Sorry can't change the email to the same one used before");
                        checkEmail = true;
                    }
                    else{
                        var value2 = document.getElementById("email").value;
                        $.ajax({
                            type : "POST",
                            url : "../Controller/UserController.php",
                            data : {requestType : "Email" , Email : value2},
                            success : function (Response2) {
                                if (Response2 == 0){
                                    document.getElementById("Message2").innerHTML = "Available To Use";
                                    document.getElementById("Message2").style.color = "green";
                                    checkEmail = false
                                }
                                else{
                                    document.getElementById("Message2").innerHTML = "Previously Used Please use another one";
                                    document.getElementById("Message2").style.color = "red";
                                    checkEmail = true;
                                }
                            }
                        });
                    }

                });
            });

            function check() {
                if (checkEmail){
                    alert("Please Fix the Problems and Try again");
                    event.preventDefault();
                }
                else{

                }

            }
        </script>
    </head>
    <body>
        <div style="text-align: center;">
            <fieldset>
                <div style="text-align: center">
                    <label>The Old Mail Is : <?php echo $Email; ?></label><br>
                    <form action = "../Controller/UserController.php" method="post">
                        <label for="email">New Email:</label> <input type="email" name="email" id = "email" required><h5 id = "Message2" style="display: inline;"></h5><br>
                        <input type="number" name="ID" id = "ID" style="visibility: hidden;" value="<?php echo $ID; ?>"><br>
                        <input type = "submit" name = "ModifyMail" id = "ModifyMail" value="Change" onclick="check()">
                    </form>
                </div>
            </fieldset>

        </div>
    </body>
</html>
