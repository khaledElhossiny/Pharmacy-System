<?php
require_once ("../Model/UserTypeModel.php");
class UserTypeController{
    public function getUserTypes(){
        $UserTypeModel = new UserTypeModel();
        $Result = $UserTypeModel->Select();
        return $Result;
    }
}
?>