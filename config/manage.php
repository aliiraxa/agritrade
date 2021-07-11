<?php
include_once 'database.php';
include_once 'session.php';
Class Manage
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();

    }
    function addProduct($title,$price,$name,$email,$phone,$category,$about,$city,$district,$street,$img,$oldEmail)
    {

        $getUser=$this->db->select("select * from users where email='$oldEmail'");
        $getUsers=$getUser->fetch_assoc();
        $user_id=$getUsers['id'];


        $this->db->insert("INSERT INTO product(user_id,title,price,name,email,phone,category,about,city,district,street,img) VALUES('$user_id','$title','$price','$name','$email','$phone','$category','$about','$city','$district','$street','$img')");
    }

    //get category
    function getAllCategroy()
    {
        return $this->db->select("select * from categories");
    }




}
?>