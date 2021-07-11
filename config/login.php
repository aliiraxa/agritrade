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

    public function login($email,$password)
    {
        return $this->db->select("select * from users where email='$email' && password='$password'");
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

    function updateProfile($title,$name,$img,$address,$about,$phone,$email,$id,$newPic,$temps)
    {
        $oldEmail=Session::get('email');
        $oldImg=Session::get('img');


        if($oldEmail==$email)
        {
            if($newPic)
            {
                $this->db->update("UPDATE users set title='$title',name='$name',img='$img',address='$address',about='$about',phone='$phone',email='$email' where id='$id'");
                move_uploaded_file($temps, $img);
            }else
            {
            $this->db->update("UPDATE users set title='$title',name='$name',address='$address',about='$about',phone='$phone',email='$email' where id='$id'");
            }

            return "Update profile Successfully";
        }else {
            $getEmail = $this->db->select("select * from users where email = '$email'");
            if ($getEmail != false)
            {
                return "Email Already Exist";
            }else
            {
                if($newPic)
                {
                    $this->db->update("UPDATE users set title='$title',name='$name',img='$img',address='$address',about='$about',phone='$phone',email='$email' where id='$id'");
                    move_uploaded_file($temps, $img);
                }else
                {
                    $this->db->update("UPDATE users set title='$title',name='$name',address='$address',about='$about',phone='$phone',email='$email' where id='$id'");
                }

                Session::set('email',$email);
              return "Update profile Successfully";
            }

        }


    }

    function getCurrentUser($email)
    {
        return $this->db->select("select * from users where email='$email'");
    }
    function checkImage($target_file,$img)
    {

        $message="";
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check file size

        if ($img["size"] > 2000000) {
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
