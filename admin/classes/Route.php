<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
class Route
{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function insertRoute($routeNo,$routeAddress)
    {
        if (empty($routeNo) || empty($routeAddress))
        {
            $routemsg="RouteNo or RouteAddress must not be empty!";
            return $routemsg;
        }else
        {
            $query="select *from tb_route where route_no='$routeNo'";
            $result=$this->db->select($query);
            if($result==false)
            {
                $InsertQuery="INSERT INTO tb_route(route_No,route_address) VALUES('$routeNo','$routeAddress')";
                $InsertResult=$this->db->insert($InsertQuery);
                if($InsertResult)
                {
                    $routemsg="Route Inserted..";
                    return $routemsg;
                }
            }
            else
            {
                $routemsg="Route No Alreadly Exists!";
                return $routemsg;
            }
        }
    }

    public function UpdateRoute($id,$routeNo,$routeAddress)
    {
        if (empty($routeNo) || empty($routeAddress))
        {
            $routemsg="RouteNo or Route Address must not be empty!";
            return $routemsg;
        }else
        {
            $query="select *from tb_route where route_no='$routeNo'";
            $result=$this->db->select($query);
            if($result)
            {
                $InsertQuery = "update tb_route set route_address='$routeAddress' where route_id='$id'";
                $InsertResult = $this->db->insert($InsertQuery);
                if ($InsertResult) {
                    $routemsg = "If Route No Already Exists Then Only Route Address Updated..";
                    return $routemsg;
                }
            }else
            {
                $InsertQuery = "update tb_route set route_no='$routeNo',route_address='$routeAddress' where route_id='$id'";
                $InsertResult = $this->db->insert($InsertQuery);
                if ($InsertResult) {
                    $routemsg = "Route Updated..";
                    return $routemsg;
                }
            }
        }
    }


    public function getByAll()
    {
        $query="select *from tb_route";
        $result=$this->db->select($query);
        return $result;
    }
    public function getById($id)
    {
        $query="select *from tb_route where route_id='$id'";
        $result=$this->db->select($query);
        return $result;
    }
    public function deteteAll()
    {
        $query1="TRUNCATE tb_bus";
        $result1=$this->db->delete($query1);
        $query="delete From tb_route";
        $result=$this->db->delete($query);

        if($result==true && $result1==true)
        {
            $msg="<span class='sucess'>Route Delete..!</span>";
            return $msg;
        }else
        {
            $msg="<span class='error'>Check Your Route..!</span>";
            return $msg;
        }
    }
    public function deleteById($routeId)
    {
        $query="DELETE from tb_route where route_id='$routeId'";
        $result=$this->db->delete($query);
        if($result)
        {
            $msg="<span class='sucess'>Route Delete..!</span>";
            return $msg;
        }else
        {
            $msg="<span class='error'>Check Your Route..!</span>";
            return $msg;
        }
    }
}
