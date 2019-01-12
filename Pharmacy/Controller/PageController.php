<?php
require_once ("../Model/PagesModel.php");
if(isset($_POST['addNew'])){
    PageController::AddNew();
}
elseif (isset($_POST['requestType'])){
    if ($_POST['requestType'] == "CheckFriendlyName"){
        PageController::CheckFriendlyName();
    }
    elseif ($_POST['requestType'] == "CheckURL"){
        PageController::CheckURL();
    }

}
class PageController{
    public function SelectAll(){
        $PagesModel = new PagesModel();
        $Result = $PagesModel->SelectAll();
        return $Result;
    }
    public function AddNew(){
        $URL = $_POST['URL'];
        $FriendlyName = $_POST['friendlyname'];
        $PageModels = new PagesModel();
        $PageModels->setURL($URL);
        $PageModels->setFriendlyName($FriendlyName);
        $PageModels->AddPage();
        header("Location: ../View/AddNewPage.php");
        exit;
    }
    public function CheckURL(){
        $URL = $_POST['URL'];
        $PagesModel = new PagesModel();
        $PagesModel->setURL($URL);
        $Result = $PagesModel->CheckURL();
        echo json_encode($Result);
    }
    public function CheckFriendlyName(){
        $FriendlyName = $_POST['friendlyname'];
        $PagesModel = new PagesModel();
        $PagesModel->setFriendlyName($FriendlyName);
        $Result = $PagesModel->CheckFriendlyName();
        echo json_encode($Result);
    }
}
?>