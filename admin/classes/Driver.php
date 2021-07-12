<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
class Driver
{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function insertdriver($driverName,$fatherName,$driverNo,$cnic)
    {
        if (empty($driverName) || empty($fatherName) || empty($driverNo) || empty($cnic))
        {
            $drivermsg="Any Feild must not be empty!";
            return $drivermsg;
        }else {
            $query = "select *from tb_driver where driver_number='$driverNo'";
            $result = $this->db->select($query);

            $query1 = "select *from tb_driver where driver_cnic='$cnic'";
            $result1 = $this->db->select($query1);

            $query2 = "select *from tb_driver where driver_cnic='$cnic'";
            $result2 = $this->db->select($query2);

          if($result==false && $result1==false && $result2==false)
            {
                $InsertQuery="INSERT INTO tb_driver(driver_name,father_name,driver_number,driver_cnic) VALUES('$driverName','$fatherName','$driverNo','$cnic')";
                $InsertResult=$this->db->insert($InsertQuery);
                if($InsertResult)
                {
                    $drivermsg="Driver Inserted..";
                    return $drivermsg;
                }
            }
            else
            {
                if($result2)
                {
                    $drivermsg="Both Driver No AND CNIC ALready Exist..!";
                    return $drivermsg;
                }else if($result)
                {
                    $drivermsg="Driver No Alreadly Exists!";
                    return $drivermsg;
                }else {
                    $drivermsg="Driver CNIC Alreadly Exists!";
                    return $drivermsg;
                }

            }
        }
    }


    public function updateDriver($id,$driverName,$fatherName,$driverNumber,$cnic)
    {
        if (empty($driverName) || empty($fatherName) ||empty($driverNumber) || empty($cnic))
        {
            $drivermsg="DirverNo or DriverName must not be empty!";
            return $drivermsg;
        }else
        {
            $query="select *from tb_driver where driver_number='$driverNumber'";
            $result=$this->db->select($query);

            $query1="select *from tb_driver where driver_cnic='$cnic'";
            $result1=$this->db->select($query1);

            $query2="select *from tb_driver where driver_cnic='$cnic' && driver_number='$driverNumber'";
            $result2=$this->db->select($query2);

            if($result2)
            {
                $InsertQuery="update tb_driver set driver_name='$driverName',father_name='$fatherName' where driver_id='$id'";
                $InsertResult=$this->db->insert($InsertQuery);
                if($InsertResult)
                {
                    $drivermsg="Driver Number AND CNIC Already Exist Only Driver Name,Father Namme Updated..";
                    return $drivermsg;
                }
            }else if($result1)
            {
                $InsertQuery="update tb_driver set driver_name='$driverName',father_name='$fatherName', driver_number='$driverNumber'  where driver_id='$id'";
                $InsertResult=$this->db->insert($InsertQuery);
                if($InsertResult)
                {
                    $drivermsg="Driver CNIC Already Exist Other Things Updated..";
                    return $drivermsg;
                }
            }else if($result)
            {
                $InsertQuery="update tb_driver set driver_name='$driverName',father_name='$fatherName',driver_cnic='$cnic'  where driver_id='$id'";
                $InsertResult=$this->db->insert($InsertQuery);
                if($InsertResult)
                {
                    $drivermsg="Driver No already Exist Other Things Updated..";
                    return $drivermsg;
                }
            }
            else
            {
                $InsertQuery="update tb_driver set driver_name='$driverName',father_name='$fatherName', driver_number='$driverNumber',driver_cnic='$cnic'  where driver_id='$id'";
                $InsertResult=$this->db->insert($InsertQuery);
                if($InsertResult)
                {
                    $drivermsg="Driver Updated..";
                    return $drivermsg;
                }
            }
        }
    }


    public function getByAll()
    {
        $query="select *from tb_driver";
        $result=$this->db->select($query);
        return $result;
    }

    public function getById($id)
    {
        $query="select *from tb_driver where driver_id='$id'";
        $result=$this->db->select($query);
        if($result)
        {
            return $result;
        }else false;
    }

    public function deleteAll()
    {
        $query="delete From tb_driver";
        $result=$this->db->delete($query);
        $query1="TRUNCATE tb_bus";
        $result1=$this->db->delete($query1);
        if($result==true && $result1==true)
        {
            $msg="<span class='sucess'>Driver Delete..!</span>";
            return $msg;
        }else
        {
            $msg="<span class='error'>Check Your Driver..!</span>";
            return $msg;
        }
    }
    public function deleteDriver($id)
    {
        $query="DELETE FROM tb_driver where driver_id='$id'";
        $result=$this->db->delete($query);
        if($result)
        {
            $msg="<span class='sucess'>Driver Delete..!</span>";
            return $msg;
        }else
        {
            $msg="<span class='error'>Check Your Driver..!</span>";
            return $msg;
        }

    }
}

?>