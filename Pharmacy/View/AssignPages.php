<?php
require_once ("../Controller/UserTypeController.php");
require_once ("../Model/UserTypeModel.php");
require_once ("../Controller/PageController.php");
require_once ("../Model/PagesModel.php");
require_once ("NavBar.php");
$UserTypeController = new UserTypeController();
$PagesController = new PageController();
$UserTypes = $UserTypeController->getUserTypes();
$Pages = $PagesController->SelectAll();
?>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../Public/CSS/Menu.css"></head>
        <script>
            var error1 = false;
            $(document).ready(function () {
               $("#usertype").change(function () {
                   var UserTypeValue = document.getElementById("usertype").value;
                   var PageIDValue = document.getElementById("page").value;
                   $.ajax({
                       type : "post",
                       url : "../Controller/UsertypePagesController.php",
                       data : {requestType : "CheckPagesUsertype" , PageID : PageIDValue , Usertype : UserTypeValue},
                       success : function (Response) {
                            if (Response == 0){
                                document.getElementById("Error").style.visibility = "hidden";
                                error1 = false;
                            }
                            else{
                                document.getElementById("Error").style.visibility = "visible";
                                error1 = true;
                            }
                       }
                   });
               });
               $("#page").change(function () {
                  var UserTypeValue2 = document.getElementById("usertype").value;
                  var PageIDvalue2 = document.getElementById("page").value;
                  $.ajax({
                      type : "post",
                      url : "../Controller/UsertypePagesController.php",
                      data : {requestType : "CheckPagesUsertype" , PageID : PageIDvalue2 , Usertype : UserTypeValue2},
                      success : function (Response) {
                          if (Response == 0){
                              document.getElementById("Error").style.visibility = "hidden";
                              error1 = false;
                          }
                          else{
                              document.getElementById("Error").style.visibility = "visible";
                              error1 = true;
                          }
                      }
                  });
               });
            });
                function Check() {
                    if (error1){
                        alert("Please Fix the Problems");
                        event.preventDefault();
                    }
                }
        </script>
    </head>
    <body>
        <div style="text-align: center">
            <fieldset>
                <div style="text-align: center">
                    <form action = "../Controller/UsertypePagesController.php" method="post">
                        <select name = "usertype" id = "usertype">
                            <?php
                                for ($x=0;$x<sizeof($UserTypes);$x++){
                                    echo "<option value = ".$UserTypes[$x]->getID().">".$UserTypes[$x]->getType()."</option>";
                                }
                            ?>
                        </select>
                        <br>
                        <select name="page" id = "page">
                            <?php
                            for ($x=0;$x<sizeof($Pages);$x++){
                                echo "<option value = ".$Pages[$x]->getID().">".$Pages[$x]->getFriendlyName()."</option>";
                            }
                            ?>
                        </select><br>
                        <label id = "Error" style="color: red; visibility: hidden;"><h5>Sorry This Already Exist in the Database</h5></label>
                        <br><input type="submit" name="Insert" value="Assign" onclick="Check()">
                    </form>
                </div>
            </fieldset>
        </div>
    </body>
</html>
