<?php
require_once ("../Model/PhoneModel.php");

if (isset($_POST['requestType'])){
    PhoneController::CheckPhone();
}
class PhoneController{
    public function Insert($UserID , $PhoneNumber){
        $PhoneModel = new PhoneModel();
        $PhoneModel->setUserID($UserID);
        $PhoneModel->setPhone($PhoneNumber);
        $Result = $PhoneModel->CheckPhone();
        if ($Result == 0){
            $PhoneModel->Insert();
            return $Result;
        }
        else{
            return $Result;
        }

    }

    public function CheckPhone(){
        $Phone = $_POST['phone'];
        $PhoneModel = new PhoneModel();
        $PhoneModel->setPhone($Phone);
        $Result = $PhoneModel->CheckPhone();
        echo json_encode($Result);
    }
}
?>