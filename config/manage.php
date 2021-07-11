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
    function checkImage($target_file,$size)
    {

        $message="";
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check file size

        if ($size > 2000000) {
            $message.= "1. Sorry, your file is too large.<br>";
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            $message.= "2. Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
        }
        if($message)
        {
            return 1;
        }else
            return 2;

    }

    function addProduct($title,$price,$name,$email,$phone,$category,$about,$city,$district,$street,$img,$oldEmail,$temps)
    {

        $getUser=$this->db->select("select * from users where email='$oldEmail'");
        $getUsers=$getUser->fetch_assoc();
        $user_id=$getUsers['id'];


        $this->db->insert("INSERT INTO product(user_id,title,price,name,email,phone,category,about,city,district,street,img) VALUES('$user_id','$title','$price','$name','$email','$phone','$category','$about','$city','$district','$street','$img')");
        move_uploaded_file($temps,$img);
        return "Product Inserted";
    }

    //get category
    function getAllCategroy()
    {
        return $this->db->select("select * from categories");
    }




}
?>