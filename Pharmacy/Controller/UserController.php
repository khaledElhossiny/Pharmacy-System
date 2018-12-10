<?php
session_start();
require_once ("../Model/UserModel.php");
require_once ("PhoneController.php");
if (isset($_POST['Register'])){
    UserController::Register();
}
elseif (isset($_POST['requestType'])){
    if ($_POST['requestType'] == "Username"){
        UserController::CheckUsername();
    }
    elseif ($_POST['requestType'] == "Email"){
        UserController::CheckEmail();
    }
    elseif ($_POST['requestType'] == "Login"){
        UserController::CheckLogin();
    }
}
elseif (isset($_POST['Login'])){
    UserController::Login();
}
elseif (isset($_GET['action'])){
    if ($_GET['action']=="Delete"){
        UserController::Delete();

    }
}
elseif (isset($_POST['modify'])){
    UserController::Modify();
}
//TODO Delete the  User on Failing to add Phone Number
class UserController{
    public function Register(){
        $Firstname = $_POST['firstname'];
        $Lastname = $_POST['lastname'];
        $Email = $_POST['email'];
        $Username = $_POST['username'];
        $Password = $_POST['password'];
        $DOB = $_POST['dob'];
        $Address = $_POST['address'];
        $UserModel = new UserModel();
        $Phone = $_POST['phone'];
        $UserModel->setUsername($Username);
        $Result = $UserModel->CheckUsername();
        if ($Result == 0){
            $UserModel->setEmail($Email);
            $Result2 = $UserModel->CheckEmail();
            if ($Result2 == 0){
                $UserModel->setFirstname($Firstname);
                $UserModel->setLastname($Lastname);
                $UserModel->setEmail($Email);
                $UserModel->setUsername($Username);
                $UserModel->setPassword($Password);
                $UserModel->setDOB($DOB);
                $UserModel->setAddress($Address);
                $UserModel->setUsertypeID(2);
                $UserModel->Insert();
                $UserID = $UserModel->SelectUser();
                $PhoneController = new PhoneController();
                $Result3 = $PhoneController->Insert($UserID,$Phone);
                if ($Result3 == 0){
                    header("Location:../View/Register.html");
                    exit;
                }
                else{
                    header("Location:../View/RegisterError.html");
                }

            }
            else{
                header("Location:../View/RegisterError.html");
                exit;
            }
        }
        else{
            header("Location:../View/RegisterError.html");
            exit;
        }

    }
    public function CheckUsername(){
        $Username = $_POST['Username'];
        $UserModel = new UserModel();
        $UserModel->setUsername($Username);
        $Result = $UserModel->CheckUsername();
        echo json_encode($Result);

    }
    public function CheckEmail(){
        $Email = $_POST['Email'];
        $UserModel = new UserModel();
        $UserModel->setEmail($Email);
        $Result = $UserModel->CheckEmail();
        echo json_encode($Result);

    }
    public function CheckLogin(){
        $Data = $_POST['Username'];
        $UserModel = new UserModel();
        $UserModel->setEmail($Data);
        $UserModel->setUsername($Data);
        $Result = $UserModel->CheckLogin();
        echo json_encode($Result);
    }
    public function Login(){
        $Data = $_POST['username'];
        $Password = $_POST['password'];
        $UserModel = new UserModel();
        $UserModel->setUsername($Data);
        $UserModel->setEmail($Data);
        $UserModel->setPassword($Password);
        $Result = $UserModel->Login();
        if ($Result != null){
            $_SESSION['ID'] = $Result;
            //TODO Go To HomePage From Login
        }
        else{
            header("Location:../View/LoginError.html");
            exit;
        }

    }
    public function SelectUsers(){
        $UserModel = new UserModel();
        $UsersArray = $UserModel->Select();
        return $UsersArray;
    }
    public function Delete(){
        $UserModel = new UserModel();
        $ID = $_GET['ID'];
        $UserModel->setID($ID);
        $UserModel->Delete();
        header("Location:../View/DeleteUser.php");
        exit;
    }

    public function SelectUserData($UserID){
       $UserModel = new UserModel();
       $UserModel->setID($UserID);
       $Result = $UserModel->SelectUserData();
       return $Result;
    }

    public function Modify(){
        $ID = $_POST['ID'];
        $Firstname = $_POST['firstname'];
        $Lastname = $_POST['lastname'];
        $Address = $_POST['address'];
        $UserModel = new UserModel();
        $UserModel->setID($ID);
        $UserModel->setFirstname($Firstname);
        $UserModel->setLastname($Lastname);
        $UserModel->setAddress($Address);
        $UserModel->Modify();
        header("Location:../View/ModifyUser.php?ID=".$UserModel->getID());
        exit;


    }

}
?>