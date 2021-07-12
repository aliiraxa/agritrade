<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');

class ManageAdmin
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    function getBuyer()
    {
        return $this->db->select("select * from users where role=2");
    }
    function getSellers()
    {
        return $this->db->select("select * from users where role=1");
    }
    function getAgent()
    {
        return $this->db->select("select * from users where role=3");
    }
    function getStoreListers()
    {
        return $this->db->select("select * from users where role=4");
    }

    function deleteUser($id)
    {
        $data=$this->db->select("select * from users where id='$id'")->fetch_assoc();
        $this->db->delete("delete * from users where id='$id'");
        unlink($data['img']);
    }

}