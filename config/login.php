<?php
include_once 'database.php';
include_once 'session.php';
Class Login
{
    private $db;
    public function __construct(){
            $this->db->database();
    }

    function createAccount($role,$name,$email,$pass)
    {
        $this->db->select("INSERT INTO user(name,email,password,role) VALUES('$role','$name','$email','$pass')");
    }


}
?>
