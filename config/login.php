<?php
include_once 'database.php';
include_once 'session.php';
Class Login
{
    private $db;
    public function __construct()
    {
            $this->db=new Database();
    }

    public function getIdByEmail($email)
    {
         $result=$this->db->select("select id from users where email='$email'");
        $result=$result->fetch_assoc();
         return $result['id'];
    }
    function checkEmailExits($email)
    {
        return $this->db->select("select * from users where email='$email'");
    }

    function createAccount($role,$name,$email,$pass)
    {
        return $this->db->insert("INSERT INTO users(name,email,password,role) VALUES('$name','$email','$pass','$role')");
    }

    function passwordCorrect($password, $email)
    {
        $result=$this->db->select("select password from users where email='$email'");
        $result=$result->fetch_assoc();
        if($result['password']==$password)
        return true;
        else
            return false;
    }

    function changePassword($password,$email)
    {
        return $this->db->update("UPDATE users set password='$password' where email='$email'");
    }

    function updateProfile($title,$name,$img,$address,$about,$phone,$email,$id)
    {
        $oldEmail=Session::get('email');
        $oldImg=Session::get('img');

        $getEmail=$this->db->select("select * from users where email = '$email'");
        $getsEmail=$getEmail->fetch_assoc();
        if($oldEmail==$email)
        {
            $this->db->update("UPDATE users set title='$title',name='$name',address='$address',about='$about',phone='$phone',email='$email' where id='$id'");
            return "Update profile Successfully";
        }else
        {

        }


//        $result=$this->db->select("select * from users where email <> '$email'");
//        $result=$result->fetch_assoc();
//        echo $result['email'];
//        echo $email;
//        if($result['email']!=$email) {
//         //   $this->db->update("UPDATE users set title='$title',name='$name',img='$img',address='$address',about='$about',phone='$phone',email='$email' where id='$id'");
//          //  Session::set('email',$email);
//        }else
//        {
//            return "Email Already Exits";
//        }
    }

    function getCurrentUser($email)
    {
        return $this->db->select("select * from users where email='$email'");
    }
    function checkImage($target_file,$name)
    {
        $message="";
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check file size

        if ($_FILES[$name]["size"] > 2000000) {
            $message.= "1. Sorry, your file is too large.<br>";
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            $message.= "2. Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
        }
        if($message)
        {
            return $message;
        }else
            return 2;

    }




}
?>
