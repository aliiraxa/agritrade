<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');

class Bus
{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function insertBus($busPlateNo,$busNo,$routeId,$driverId)
    {
        if (empty($busPlateNo) || empty($busNo) ||  empty($routeId) ||  empty($driverId))
        {
            $busmsg="Any Filed must not be empty!";
            return $busmsg;
        }else
        {
            $query="select *from tb_bus where bus_no='$busNo' OR bus_plateNo='$busPlateNo'";
            $result=$this->db->select($query);
            if($result==false)
            {
                $InsertQuery="INSERT INTO tb_bus(bus_plateNo,bus_no,driver_id,route_id) VALUES('$busPlateNo','$busNo','$driverId','$routeId')";
                $InsertResult=$this->db->insert($InsertQuery);
                if($InsertResult)
                {
                    $busmsg="Bus Inserted..";
                    return $busmsg;
                }
            }
            else
            {
                $busmsg="Bus Alreadly Exists!";
                return $busmsg;
            }
        }
    }

    public function updateBus($id,$busPlateNo,$busNo,$routeId,$driverId)
    {
        if (empty($busPlateNo) || empty($busNo) ||  empty($routeId) ||  empty($driverId))
        {
            $busmsg="Any Filed must not be empty!";
            return $busmsg;
        }else
        {
            $query1="select *from tb_bus where bus_no='$busNo'";
            $resultBusNo=$this->db->select($query1);
            $query2="select *from tb_bus where bus_plateNo='$busPlateNo'";
            $resultPlateNo=$this->db->select($query2);
            $query3="select *from tb_bus where bus_no='$busNo' && bus_plateNo='$busPlateNo'";
            $resultBoth=$this->db->select($query3);
            if($resultBoth)
            {
                $InsertQuery = "update tb_bus set bus_no='$busNo',route_id='$routeId',driver_id='$driverId' where bus_id='$id'";
                $InsertResult = $this->db->insert($InsertQuery);
                if ($InsertResult)
                {
                    $busmsg = "Bus Plate No && Bus No Already Exist So Only Other Info Updated..";
                    return $busmsg;
                }
            }else if($resultPlateNo)
            {
                $InsertQuery = "update tb_bus set bus_no='$busNo',route_id='$routeId',driver_id='$driverId' where bus_id='$id'";
                $InsertResult = $this->db->insert($InsertQuery);
                if ($InsertResult)
                {
                    $busmsg = "Bus Plate No Already Exist So Only Other Info Updated..";
                    return $busmsg;
                }
            }else if($resultBusNo)
            {
                $InsertQuery = "update tb_bus set bus_plateNo='$busPlateNo',route_id='$routeId',driver_id='$driverId' where bus_id='$id'";
                $InsertResult = $this->db->insert($InsertQuery);
                if ($InsertResult)
                {
                    $busmsg = "Bus No Already Exist So Only Other Info Updated..";
                    return $busmsg;
                }
            }else
            {
                $InsertQuery = "update tb_bus set bus_plateNo='$busPlateNo',bus_no='$busNo',route_id='$routeId',driver_id='$driverId' where bus_id='$id'";
                $InsertResult = $this->db->insert($InsertQuery);
                if ($InsertResult)
                {
                    $busmsg = "Bus Updated..";
                    return $busmsg;
                }
            }

        }
    }

    public function getById($id)
    {
        $query="select *from tb_bus where bus_id='$id'";
        $result=$this->db->select($query);
        return $result;
    }

    public function getByBusNo($busNo)
    {
        $query="select *from tb_bus where bus_no='$busNo'";
        $result=$this->db->select($query);
        if($result!=false)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
    public function getByBusPlateNo($busPlateNo)
    {
        $query="select *from tb_bus where bus_plateNo='$busPlateNo'";
        $result=$this->db->select($query);
        if($result!=false)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }

    public function getAlBuses()
    {
        $query="select *form tb_bus";
        $result=$this->db->select($query);
        return $result;
    }

    public function getByAll()
    {
        $query="select tb_bus .*,tb_driver.driver_name,tb_route.route_address From tb_bus INNER JOIN tb_driver ON tb_bus.driver_id=tb_driver.driver_id
         INNER JOIN tb_route ON tb_bus.route_id=tb_route.route_id";
        $result=$this->db->select($query);
        return $result;

    }

   public function deleteAll()
   {
       $query="TRUNCATE tb_bus";
       $result=$this->db->delete($query);
       if($result)
       {
           $msg="<span class='sucess'>Bus Delete..!</span>";
           return $msg;
       }else
       {
           $msg="<span class='error'>Check Your Driver..!</span>";
           return $msg;
       }
   }
   public function deleteBus($id)
    {
        $query="DELETE FROM tb_bus where bus_id='$id'";
        $result=$this->db->delete($query);
        if($result)
        {
            $msg="<span class='sucess'>Bus Delete..!</span>";
            return $msg;
        }else
        {
            $msg="<span class='error'>Check Your Driver..!</span>";
            return $msg;
        }

    }
}

?>