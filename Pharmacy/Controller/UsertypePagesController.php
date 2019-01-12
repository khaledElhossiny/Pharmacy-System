<?php
require_once ("../Model/UsertypePagesModel.php");
require_once ("../Model/PagesModel.php");
if(isset($_POST['Insert'])){
    UsertypePagesController::Insert();
}
elseif (isset($_POST['requestType'])){
    if ($_POST['requestType'] == "CheckPagesUsertype"){
        UsertypePagesController::Check();
    }
}
class UsertypePagesController{
    public function Insert(){
        $Usertype_ID = $_POST['usertype'];
        $Page_ID = $_POST['page'];
        $UsertypePagesModel = new UsertypePagesModel();
        $UsertypePagesModel->setUsertypeID($Usertype_ID);
        $UsertypePagesModel->setPagesID($Page_ID);
        $UsertypePagesModel->Insert();
    }
    public function Check(){
        $PageID = $_POST['PageID'];
        $Usertype = $_POST['Usertype'];
        $UsertypePagesModel = new UsertypePagesModel();
        $UsertypePagesModel->setUsertypeID($Usertype);
        $UsertypePagesModel->setPagesID($PageID);
        $Result = $UsertypePagesModel->Check();
        echo json_encode($Result);
    }

    public function NavBarItems($ID){
        $UsertypePages = new UsertypePagesModel();
        $UsertypePages->setUsertypeID($ID);
        $Results = $UsertypePages->SelectwithUserType();
        $PagesModel = new PagesModel();
        $Pages = array();
        for ($x=0;$x<sizeof($Results);$x++){
            $PagesModel->setID($Results[$x]->getPagesID());
            $Pages[$x] = $PagesModel->SelectByID();
        }
        return $Pages;
    }
}
?>