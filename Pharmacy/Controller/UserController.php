<?php
if (session_id() == ''){
    session_start();
}
require_once ("../Model/UserModel.php");
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
        UserController::AdminDelete();

    }
}
elseif (isset($_POST['modify'])){
    UserController::Modify();
}
elseif (isset($_GET['request'])){
    if($_GET['request']=="logout"){
        UserController::Logout();
    }
    elseif ($_GET['request'] == "delete"){
        UserController::DeleteProfile();
    }
}
elseif (isset($_POST['AddUser'])){
    UserController::AdminAddUser();
}
elseif (isset($_POST['modifyAdmin'])){
    UserController::ModifyAdmin();
}
elseif (isset($_POST['ModifyMail'])){
    UserController::changeMail();
}
elseif (isset($_POST['ModifyPassword'])){
    UserController::ModifyPassword();
}
if (isset($_POST['requestType'])){
    if ($_POST['requestType'] == "search"){

        UserController::Search();
    }
}
//TODO Delete the  User on Failing to add Phone Number
//TODO Logout Button on the Menu
//TODO Get Username Function for the Menu

class UserController{
    public function Register(){
        require_once ("PhoneController.php");
        $Firstname = $_POST['firstname'];
        $Lastname = $_POST['lastname'];
        $Email = $_POST['email'];
        $Gender = $_POST['gender'];
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
                $UserModel->setGender($Gender);
                $UserModel->Insert();
                $UserID = $UserModel->SelectUser();
                $PhoneController = new PhoneController();
                $Result3 = $PhoneController->Insert($UserID,$Phone);
                if ($Result3 == 0){
                    header("Location:../View/Register.php");
                    exit;
                }
                else{
                    header("Location:../View/RegisterError.php");
                }

            }
            else{
                header("Location:../View/RegisterError.php");
                exit;
            }
        }
        else{
            header("Location:../View/RegisterError.php");
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
            $_SESSION['ID'] = $Result->getID();
            $_SESSION['Usertype'] = $Result->getUsertypeID();
            header("Location:../View/UserHomePage.php");
            exit;
        }
        else{
            header("Location:../View/LoginError.php");
            exit;
        }

    }
    public function SelectUsers(){
        $UserModel = new UserModel();
        $UsersArray = $UserModel->Select();
        return $UsersArray;
    }
    public function AdminDelete(){
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
        header("Location:../View/ViewProfile.php");
        exit;


    }
    public function Logout(){
        session_destroy();
        header("Location:../View/UserHomePage.php");
        exit;
    }
    public function DeleteProfile(){
        $ID = $_SESSION['ID'];
        $UserModel = new UserModel();
        $UserModel->setID($ID);
        $UserModel->Delete();
        session_destroy();
        header("Location:../View/UserHomePage.php");
        exit;

    }
    public function checkAdminStatus($ID){
        $UserModel = new UserModel();
        $UserModel->setID($ID);
        $Result = $UserModel->checkAdminStatus();
        return $Result;
    }
    public function AdminAddUser(){
        require_once ("PhoneController.php");
        $Firstname = $_POST['firstname'];
        $Lastname = $_POST['lastname'];
        $Email = $_POST['email'];
        $Gender = $_POST['gender'];
        $Username = $_POST['username'];
        $Password = $_POST['password'];
        $DOB = $_POST['dob'];
        $Address = $_POST['address'];
        $UserModel = new UserModel();
        $Phone = $_POST['phone'];
        $UserType = $_POST['usertype'];
        $UserModel->setUsername($Username);
        $UserModel->setEmail($Email);
        $UserModel->setFirstname($Firstname);
        $UserModel->setLastname($Lastname);
        $UserModel->setEmail($Email);
        $UserModel->setUsername($Username);
        $UserModel->setPassword($Password);
        $UserModel->setDOB($DOB);
        $UserModel->setAddress($Address);
        $UserModel->setUsertypeID($UserType);
        $UserModel->setGender($Gender);
        $UserModel->Insert();
        $UserID = $UserModel->SelectUser();
        $PhoneController = new PhoneController();
        $Result3 = $PhoneController->Insert($UserID, $Phone);


        }
    public function ModifyAdmin(){
        $ID = $_POST['ID'];
        $Firstname = $_POST['firstname'];
        $Lastname = $_POST['lastname'];
        $Address = $_POST['address'];
        $Usertype = $_POST['usertype'];
        $UserModel = new UserModel();
        $UserModel->setID($ID);
        $UserModel->setFirstname($Firstname);
        $UserModel->setLastname($Lastname);
        $UserModel->setAddress($Address);
        $UserModel->setUsertypeID($Usertype);
        $UserModel->ModifyAdmin();
        header("Location:../View/DeleteUser.php");
        exit;
    }
    public function SelectMail($ID){
        $UserModel = new UserModel();
        $UserModel->setID($ID);
        return $UserModel->SelectEmail();
    }
    public function changeMail(){
        $ID = $_POST['ID'];
        $Email = $_POST['email'];
        $UserModel = new UserModel();
        $UserModel->setID($ID);
        $UserModel->setEmail($Email);
        $UserModel->ChangeMail();
        header("Location:../View/ModifyMenu.php?ID=".$ID);
        exit;
    }
    public function getUsername($ID){
        $UserModel = new UserModel();
        $UserModel->setID($ID);
        return $UserModel->SelectUsername();
    }

    public function ModifyPassword(){
        $ID = $_POST['ID'];
        $NewPassword = $_POST['password'];
        $UserModel = new UserModel();
        $UserModel->setID($ID);
        $UserModel->setPassword($NewPassword);
        $UserModel->ModifyPassword();
        header("Location:../View/ViewProfile.php");
        exit;
    }

    public function getUsertype($ID){
        $UserModel = new UserModel();
        $UserModel->setID($ID);
        return $UserModel->GetUserType();
    }

    public function Search(){
        $Value = $_POST['value'];
        $UserModel = new UserModel();
        $UserModel->setUsername($Value);
        $Results = $UserModel->Search();
        if ($Results == 0){
            echo json_encode(0);
        }
        else{
            for ($x=0;$x<sizeof($Results);$x++){
                echo json_encode(array(
                    "Firstname"=>$Results[$x]->getFirstname(),
                    "Lastname"=>$Results[$x]->getLastname(),
                    "Username"=>$Results[$x]->getUsername(),
                    "Email"=>$Results[$x]->getEmail(),
                    "Address"=>$Results[$x]->getAddress()
                ));
            }
        }
    }
}
?>