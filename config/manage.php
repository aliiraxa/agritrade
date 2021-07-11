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
    public function getIdByEmail($email)
    {
        $result=$this->db->select("select id from users where email='$email'");
        $result=$result->fetch_assoc();
        return $result['id'];
    }
    function getProductBySellerId($email)
    {
        $Id=$this->getIdByEmail($email);
        return $this->db->select("select * from product where user_id='$Id'");
    }

    function deleteProduct($id)
    {
        $this->db->delete("delete from product where id='$id'");
    }

    function getCategoryBYId($id)
    {
        $get=$this->db->select("select name from categories where id='$id'");
        $cat=$get->fetch_assoc();
        return $cat['name'];

    }
    function getProductById($id)
    {
        return $this->db->select("select * from product where id='$id'");
    }

    function editProduct($title,$price,$name,$email,$phone,$category,$about,$city,$district,$street,$id,$img=0,$temp=0)
    {
        if(!$img)
        $this->db->update("update product set title='$title',price='$price',name='$name',email='$email',phone='$phone',category='$category',about='$about',city='$city',district='$district',street='$street'  where id='$id'");
        else
        {

            $this->db->update("update product set title='$title',price='$price',name='$name',email='$email',phone='$phone',category='$category',about='$about',city='$city',district='$district',street='$street',img='$img'   where id='$id'");
            move_uploaded_file($temp,$img);
        }

    }




}
?>