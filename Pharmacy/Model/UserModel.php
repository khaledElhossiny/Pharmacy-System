<?php
require_once ("../Public/Database/DatabaseConnection.php");
class UserModel{
    private $ID;
    private $Firstname;
    private $Lastname;
    private $Email;
    private $Username;
    private $Password;
    private $Usertype_ID;
    private $DOB;
    private $Address;

    public function getID()
    {
        return $this->ID;
    }
    public function setID($ID)
    {
        $this->ID = $ID;
    }
    public function getFirstname()
    {
        return $this->Firstname;
    }
    public function setFirstname($Firstname)
    {
        $this->Firstname = $Firstname;
    }
    public function getLastname()
    {
        return $this->Lastname;
    }
    public function setLastname($Lastname)
    {
        $this->Lastname = $Lastname;
    }
    public function getEmail()
    {
        return $this->Email;
    }
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }
    public function getUsername()
    {
        return $this->Username;
    }
    public function setUsername($Username)
    {
        $this->Username = $Username;
    }
    public function getPassword()
    {
        return $this->Password;
    }
    public function setPassword($Password)
    {
        $this->Password = $Password;
    }
    public function getUsertypeID()
    {
        return $this->Usertype_ID;
    }
    public function setUsertypeID($Usertype_ID)
    {
        $this->Usertype_ID = $Usertype_ID;
    }
    public function getDOB()
    {
        return $this->DOB;
    }
    public function setDOB($DOB)
    {
        $this->DOB = $DOB;
    }
    public function getAddress()
    {
        return $this->Address;
    }
    public function setAddress($Address)
    {
        $this->Address = $Address;
    }

    public function Insert(){
        $this->Password = sha1($this->Password);
        $sql = "INSERT INTO `user`(`Firstname`, `Lastname`, `Email`, `Username`, `Password`, `Usertype_ID`, `DOB`, `Address`) VALUES
                  ('".$this->Firstname."','".$this->Lastname."','".$this->Email."','".$this->Username."','".$this->Password."','".$this->Usertype_ID."','".$this->DOB."','".$this->Address."')";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Connection->Execute($sql);
    }
    public function CheckUsername (){
        $sql = "SELECT * FROM user WHERE Username = '".$this->Username."'";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Result = $Connection->Execute($sql);
        if ($Result->num_rows>0){
            return 1;
        }
        else{
            return 0;
        }
    }
    public function CheckEmail (){
        $sql = "SELECT * FROM user WHERE Email = '".$this->Email."'";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Result = $Connection->Execute($sql);
        if ($Result->num_rows>0){
            return 1;
        }
        else{
            return 0;
        }
    }
    public function SelectUser(){
        $sql = "SELECT ID FROM `user` WHERE Username = '".$this->Username."'";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Result = $Connection->Execute($sql);
        $Row = mysqli_fetch_array($Result);
        return $Row['ID'];

    }
    public function CheckLogin(){
        $sql = "SELECT * FROM user WHERE Username = '".$this->Username."' OR Email = '".$this->Email."'";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Result = $Connection->Execute($sql);
        if ($Result->num_rows>0){
            return 1;
        }
        else{
            return 0;
        }
    }
    public function Login(){
        $this->Password = sha1($this->Password);
        $sql = "SELECT ID FROM user WHERE Username = '".$this->Username."' OR Email = '".$this->Email."' AND Password = '".$this->Password."'";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Result = $Connection->Execute($sql);
        if ($Result->num_rows>0){
            $row = mysqli_fetch_array($Result);
            return $row['ID'];
        }
        else{
            return null;
        }

    }

    public function Select(){
        $sql = "SELECT * FROM user";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Result = $Connection->Execute($sql);
        if ($Result->num_rows>0){
            $UsersArray = array();
            $x=0;
            while($row = mysqli_fetch_array($Result)){
                $UsersArray[$x] = new UserModel();
                $UsersArray[$x]->setID($row['ID']);
                $UsersArray[$x]->setFirstname($row['Firstname']);
                $UsersArray[$x]->setLastname($row['Lastname']);
                $UsersArray[$x]->setEmail($row['Email']);
                $UsersArray[$x]->setUsername($row['Username']);
                $UsersArray[$x]->setUsertypeID($row['Usertype_ID']);
                $UsersArray[$x]->setDOB($row['DOB']);
                $UsersArray[$x]->setAddress($row['Address']);
                $x++;
            }
            return $UsersArray;
        }
        else{
            return NULL;
        }
    }

    public function Delete(){
        $sql = "DELETE FROM `user` WHERE ID = '".$this->ID."'";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Connection->Execute($sql);
    }

    public function Modify(){
        $sql = "UPDATE `user` SET `Firstname` = '".$this->Firstname."',`Lastname`='".$this->Lastname."',`Address`='".$this->Address."' WHERE ID = '".$this->ID."'";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Connection->Execute($sql);

    }

    public function SelectUserData(){
        $sql = "SELECT * FROM user WHERE ID = '".$this->ID."'";
        $Connection = new DatabaseConnection();
        $Connection->Connect();
        $Result = $Connection->Execute($sql);
        $Row = mysqli_fetch_array($Result);
        $data= new UserModel();
        $data->setID($Row['ID']);
        $data->setFirstname($Row['Firstname']);
        $data->setLastname($Row['Lastname']);
        $data->setAddress($Row['Address']);
        return $data;
    }

}

?>