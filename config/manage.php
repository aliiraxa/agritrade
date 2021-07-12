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

    function addProduct($title,$price,$stock,$name,$email,$phone,$category,$about,$city,$district,$street,$img,$oldEmail,$temps)
    {

        $getUser=$this->db->select("select * from users where email='$oldEmail'");
        $getUsers=$getUser->fetch_assoc();
        $user_id=$getUsers['id'];


        $this->db->insert("INSERT INTO product(user_id,title,price,stock,name,email,phone,category,about,city,district,street,img) VALUES('$user_id','$title','$price','$stock','$name','$email','$phone','$category','$about','$city','$district','$street','$img')");
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

    function getSellerById($id)
    {
        $get=$this->db->select("select name from users where id='$id'");
        $cat=$get->fetch_assoc();
        return $cat['name'];

    }
    function getProductById($id)
    {
        return $this->db->select("select * from product where id='$id'");
    }

    function editProduct($title,$price,$stock,$name,$email,$phone,$category,$about,$city,$district,$street,$id,$img=0,$temp=0)
    {
        if(!$img)
        $this->db->update("update product set title='$title',stock='$stock',price='$price',name='$name',email='$email',phone='$phone',category='$category',about='$about',city='$city',district='$district',street='$street'  where id='$id'");
        else
        {

            $this->db->update("update product set title='$title',price='$price',stock='$stock',name='$name',email='$email',phone='$phone',category='$category',about='$about',city='$city',district='$district',street='$street',img='$img'   where id='$id'");
            move_uploaded_file($temp,$img);
        }

    }

    function getSellers()
    {
        return $this->db->select("select * from users where role=1");
    }

    function getRandomHomePage()
    {
        return $this->db->select("SELECT * FROM product ORDER BY RAND() LIMIT 20");
    }
    function getThreeRandom()
    {
        return $this->db->select("SELECT * FROM product ORDER BY RAND() LIMIT 3");
    }

    function research($name,$location,$cat=0)
    {



       if($cat==0)
       {
           return $this->db->select("SELECT * FROM product WHERE title LIKE'%" . $name . "%'
        OR city LIKE '%" . $location . "%'
        OR district LIKE '%" . $location . "%'");
       }else
       {
           return $this->db->select("SELECT * FROM product WHERE title LIKE'%" . $name . "%'
        OR city LIKE '%" . $location . "%'
        OR district LIKE '%" . $location . "%' AND category='$cat'");
       }


    }

    function applyForAgent($email)
    {
        return $this->db->update("update users set status='0' where email='$email'");
    }

    function getStatus($email)
    {
        return $this->db->select("select * from users where status=0 AND email='$email'")->fetch_assoc();
    }
    function getStores()
    {
        return $this->db->select("select * from store");
    }

    function checkStore($email)
    {
        return $this->db->select("select * from store where email='$email'");
    }

    function submitStoreInfo($title,$email,$phone,$city,$district,$street,$userId)
    {
        $result=$this->db->select("select * from store where user_id='$userId'");
        if($result)
        {
            $this->db->update("Update  store set name='$title',city='$city',district='$district',street='$street',phone='$phone',email='$email' where user_id='$userId'");
        }else
        {
            $this->db->insert("INSERT INTO store(name,city,district,street,phone,email,user_id) VALUES('$title','$city','$district','$street','$phone','$email','$userId')");
        }
    }

    function getStoreByUser($id)
    {
        return $this->db->select("select * from store where user_id='$id'");
    }

    function getQTY($id)
    {
        $data=$this->db->select("select stock from product where id='$id'")->fetch_assoc();
        return $data['stock'];
    }

    function orderNow($title,$price,$qty,$name,$email,$phone,$city,$district,$street,$oldEmail)
    {
        $getUser=$this->db->select("select * from users where email='$oldEmail'");
        $getUsers=$getUser->fetch_assoc();
        $getUsers['id'];

        $this->db->insert("INSERT INTO tb_order ");

    }






}
?>