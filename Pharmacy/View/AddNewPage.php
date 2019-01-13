<?php
require_once ("../Controller/UserController.php");
require_once ("../Controller/PageController.php");
require_once ("../Model/PagesModel.php");
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


?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../Public/CSS/Menu.css"></head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        var error1 = false;
        var error2 = false;
        $(document).ready(function () {
            $("#URL").change(function () {
                var URLValue = document.getElementById("URL").value;
                $.ajax({
                    type : "POST",
                    url : "../Controller/PageController.php",
                    data : {requestType: "CheckURL" , URL : URLValue},
                    success : function (Response2) {
                        if (Response2 == 0){
                            document.getElementById("URLError").innerHTML = "Available to be Added";
                            document.getElementById("URLError").style.color = "green";
                            document.getElementById("URLError").style.visibility = "visible";
                            error1 = false;
                        }
                        else{
                            document.getElementById("URLError").innerHTML = "found in the Database";
                            document.getElementById("URLError").style.color = "red";
                            document.getElementById("URLError").style.visibility = "visible";
                            error1 = true;
                        }
                    }
                });
            });
            $("#friendlyname").change(function () {
                var FriendlyNameValue = document.getElementById("friendlyname").value;
                $.ajax({
                    type : "POST",
                    url : "../Controller/PageController.php",
                    data : {requestType: "CheckFriendlyName" ,friendlyname : FriendlyNameValue},
                    success : function (Response) {
                        if (Response == 0){
                            document.getElementById("FriendlyError").innerHTML = "Available to be Added";
                            document.getElementById("FriendlyError").style.color = "green";
                            document.getElementById("FriendlyError").style.visibility = "visible";
                            error2 = false;
                        }
                        else{
                            document.getElementById("FriendlyError").innerHTML = "found in the Database";
                            document.getElementById("FriendlyError").style.color = "red";
                            document.getElementById("FriendlyError").style.visibility = "visible";
                            error2 = true;
                        }
                    }
                });
            });
        });
        function check(){
            if (error1 || error2){
                alert("Please Fix The Problems and Continue");
                event.preventDefault();
            }
        }
    </script>
</head>
<body>
    <div style="text-align: center">
        <fieldset>
            <div style="text-align: center">
                <form action = "../Controller/PageController.php" method="post">
                    <label for="friendlyname">Friendly Name</label><input type="text" name="friendlyname" id = "friendlyname" required><label id = "FriendlyError" style="visibility: hidden; display: inline-block;"></label><br>
                    <label for="URL">URL</label><input type="text" name = "URL" id = "URL" required><label id = "URLError" style="visibility: hidden; display: inline-block;"></label><br>
                    <input type="submit" name = "addNew" value = "Add" onclick="check()">

                </form>
            </div>
        </fieldset>
    </div>

</body>
</html>
