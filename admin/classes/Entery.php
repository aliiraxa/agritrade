<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../classes/Bus.php');
include_once ($filepath.'/../classes/Driver.php');
include_once ($filepath.'/../classes/Route.php');
class Entery
{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function noteEntryByBusNo($busNo)
    {
        $bus=new Bus();
        $driver=new Driver();
        $route=new Route();
        if($bus->getByBusNo($busNo)!=false) {
            $date = new DateTime("now", new DateTimeZone('Asia/Karachi') );
            $query="Select * From tb_entry WHERE bus_No='$busNo' && Status='U'";
            $result=$this->db->select($query);
            if($result==false)
            {
                $outTime = $date->format('H:i:s');
                $entryOutDate = $date->format('Y-m-d');

                $Res = $bus->getByBusNo($busNo);
                $idResult = $Res->fetch_assoc();
                $route_id=$idResult['route_id'];
                $driver_id=$idResult['driver_id'];
                $bus_plate=$idResult['bus_plateNo'];

                $ResDriver = $driver->getById($driver_id);
                $ResultD = $ResDriver->fetch_assoc();
                $driver_name=$ResultD['driver_name'];
                $driver_cnic=$ResultD['driver_cnic'];

                $ResRoute = $route->getById($route_id);
                $ResultRoute = $ResRoute->fetch_assoc();
                $route_no=$ResultRoute['route_No'];
                $route_add=$ResultRoute['route_address'];


                $InsertNewQuery="INSERT INTO tb_entry(bus_No,bus_plateNo,bus_driver,driver_cnic,bus_Route_No,bus_route_address,OutTime,Entry_Out_Date,Status) VALUES($busNo,'$bus_plate','$driver_name','$driver_cnic',$route_no,'$route_add','$outTime','$entryOutDate','U')";
                $result=$this->db->insert($InsertNewQuery);
                if($result)
                {
                    $outTime = $date->format('H:i:s');
                    $entryOutDate = $date->format('Y-m-d');

                    $entrymsg = "Bus Out Time Entry Noted...";
                    return $entrymsg;
                }
                else
                {
                    $entrymsg = "Bus Time Out Not Note!";
                    return $entrymsg;
                }
            }else
            {
                $InTime = $date->format('H:i:s');
                $entryInDate = $date->format('Y-m-d');

                $query="UPDATE tb_entry SET InTime='$InTime', Entry_In_Date='$entryInDate', Status='C' WHERE bus_No='$busNo'";
                $RE=$this->db->update($query);
                if($RE)
                {
                    $entrymsg = "Bus In Time Entry Noted..";
                    return $entrymsg;
                }else
                {
                    $entrymsg = "Bus Time In Not Note!";
                    return $entrymsg;
                }
            }
        }
        else
        {
            $entrymsg="Bus Not Exist";
            return $entrymsg;
        }
    }


    public function noteEntryByBusPlate($busPlateNo)
    {
        $bus=new Bus();
        $driver=new Driver();
        $route=new Route();
        $date = new DateTime("now", new DateTimeZone('Asia/Karachi') );
        if($bus->getByBusPlateNo($busPlateNo)!=false)
        {
            $query="Select * From tb_entry WHERE bus_plateNo='$busPlateNo' && Status='U'";
            $result=$this->db->select($query);
            if($result==false)
            {
                $outTime = $date->format('H:i:s');
                $entryOutDate = $date->format('Y-m-d');

                $Res = $bus->getByBusPlateNo($busPlateNo);
                $idResult = $Res->fetch_assoc();
                $route_id=$idResult['route_id'];
                $driver_id=$idResult['driver_id'];
                $busNo=$idResult['bus_no'];

                $ResDriver = $driver->getById($driver_id);
                $ResultD = $ResDriver->fetch_assoc();
                $driver_name=$ResultD['driver_name'];
                $driver_cnic=$ResultD['driver_cnic'];

                $ResRoute = $route->getById($route_id);
                $ResultRoute = $ResRoute->fetch_assoc();
                $route_no=$ResultRoute['route_No'];
                $route_add=$ResultRoute['route_address'];

                $InsertNewQuery="INSERT INTO tb_entry(bus_No,bus_plateNo,bus_driver,driver_cnic,bus_Route_No,bus_route_address,OutTime,Entry_Out_Date,Status) VALUES($busNo,'$busPlateNo','$driver_name','$driver_cnic',$route_no,'$route_add','$outTime','$entryOutDate','U')";
                $result1=$this->db->insert($InsertNewQuery);
                if($result1)
                {
                    $entrymsg = "Bus Out Time Entry Noted...";
                    return $entrymsg;
                }
                else
                {
                    $entrymsg = "Bus Time Out Not Note!";
                    return $entrymsg;
                }
            }else
            {
                $InTime = $date->format('H:i:s');
                $entryInDate = $date->format('Y-m-d');
                $query="UPDATE tb_entry SET InTime='$InTime', Entry_In_Date='$entryInDate', Status='C' WHERE bus_plateNo='$busPlateNo'";
                $RE=$this->db->update($query);
                if($RE)
                {
                    $entrymsg = "Bus In Time Entry Noted..";
                    return $entrymsg;
                }else
                {
                    $entrymsg = "Bus Time In Not Note!";
                    return $entrymsg;
                }
            }
        }
        else
        {
            $entrymsg="Bus Not Exist";
            return $entrymsg;
        }
    }
    public function getByAllEntry()
    {
        $query="SELECT *FROM tb_entry";
        $result=$this->db->select($query);
        return $result;
    }
    public function getEntryByRouteNO($routeNo)
    {
        $query="SELECT *FROM tb_entry WHERE bus_Route_No='$routeNo'";
        $result=$this->db->select($query);
        return $result;
    }
    public function getEntryByBusNo($busNo)
    {
        $query="SELECT *FROM tb_entry WHERE bus_No='$busNo'";
        $result=$this->db->select($query);
        return $result;
    }
    public function getEntryByDriver($driver)
    {
        $query="SELECT *FROM tb_entry WHERE bus_driver='$driver'";
        $result=$this->db->select($query);
        return $result;
    }
    public function getByDate($date)
    {
        $query="SELECT *FROM tb_entry where Entry_Out_Date='$date'";
        $result=$this->db->select($query);
        return $result;
    }
    public function getByBothDate($sdate,$edate)
    {
        $query="SELECT *FROM tb_entry where Entry_Out_Date>='$sdate' && Entry_Out_Date<='$edate'";
        $result=$this->db->select($query);
        if($result)
        return $result;
        else return false;
    }
    public function getById($id)
    {
        $query="SELECT *FROM tb_entry WHERE entry_id='$id'";
        $result=$this->db->select($query);
        return $result;
    }
    public function getByAll()
    {
        $query="select tb_entry .*,tb_bus.bus_No,tb_bus.bus_plateNo From tb_entry INNER JOIN tb_bus ON tb_entry.bus_id=tb_bus.bus_id";
        $result=$this->db->select($query);
        return $result;
    }
    public function updateEntry($busNo,$driverName,$RouteAddress,$outDate,$InDate,$busPlateNo,$routeNo,$outTime,$InTime,$id,$cnic)
    {
        $query="update tb_entry set bus_No='$busNo', bus_Driver='$driverName', bus_route_address='$RouteAddress',Entry_Out_Date='$outDate',Entry_In_Date='$InDate',bus_plateNo='$busPlateNo',bus_Route_No='$routeNo',OutTime='$outTime',driver_cnic='$cnic',InTime='$InTime' WHERE entry_id='$id'";
        $result=$this->db->update($query);
        if($result)
        {
            $entrymsg = "Entry Updated..";
            return $entrymsg;
        }else
        {
            $entrymsg = "Entry Not Updated..";
            return $entrymsg;
        }
    }
    public function deleteAll()
    {
        $query="TRUNCATE tb_entry";
        $result=$this->db->delete($query);
        if($result)
        {
            $msg="<span class='sucess'>All Entries Delete..!</span>";
            return $msg;
        }else
        {
            $msg="<span class='error'>error Entry Not Deleted..!</span>";
            return $msg;
        }
    }

   public function deleteEntry($id)
    {
        $query="DELETE FROM tb_entry where entry_id='$id'";
        $result=$this->db->delete($query);
        if($result)
        {
            $msg="<span class='sucess'>Entry Delete..!</span>";
            return $msg;
        }else
        {
            $msg="<span class='error'>error Entry Not Deleted..!</span>";
            return $msg;
        }

    }


    public function search($busNo,$routeNo,$Date,$sDate,$eDate)
    {
        if($busNo!=null && $routeNo!=null && $Date!=null && $sDate==null && $eDate==null)
        {
            $query="SELECT *FROM tb_entry where bus_No='$busNo' && bus_Route_No='$routeNo' && Entry_Out_Date='$Date'";
            $result=$this->db->select($query);
            return $result;
        }else if($busNo!=null && $routeNo!=null && $Date==null && $sDate!=null && $eDate!=null)
        {
            $query="SELECT *FROM tb_entry where bus_No='$busNo' && bus_Route_No='$routeNo' &&  Entry_Out_Date>='$sDate' && Entry_Out_Date<='$eDate' ";
            $result=$this->db->select($query);
            return $result;
        }else if($busNo!=null && $routeNo==null && $Date!=null && $sDate==null && $eDate==null)
        {
            $query="SELECT *FROM tb_entry where bus_No='$busNo' && Entry_Out_Date='$Date'";
            $result=$this->db->select($query);
            return $result;
        }else if($busNo!=null && $routeNo==null && $Date==null && $sDate!=null && $eDate!=null)
        {
            $query="SELECT *FROM tb_entry where bus_No='$busNo' &&  Entry_Out_Date>='$sDate' && Entry_Out_Date<='$eDate' ";
            $result=$this->db->select($query);
            return $result;
        }else if($busNo==null && $routeNo!=null && $Date!=null && $sDate==null && $eDate==null)
        {
            $query="SELECT *FROM tb_entry where  bus_Route_No='$routeNo' && Entry_Out_Date='$Date'";
            $result=$this->db->select($query);
            return $result;
        }else if($busNo==null && $routeNo!=null && $Date==null && $sDate!=null && $eDate!=null)
        {
            $query="SELECT *FROM tb_entry where  bus_Route_No='$routeNo' &&  Entry_Out_Date>='$sDate' && Entry_Out_Date<='$eDate' ";
            $result=$this->db->select($query);
            return $result;
        }else if($busNo!=null)
        {
           return $this->getEntryByBusNo($busNo);
        }else if($routeNo!=null) {
            return $this->getEntryByRouteNO($routeNo);
        }else if($Date!=null && $sDate==null && $eDate==null)
        {
            return $this->getByDate($Date);
        }else
        {
            return $this->getByBothDate($sDate,$eDate);
        }

    }


}
?>