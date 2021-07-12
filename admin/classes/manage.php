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
        $data = $this->db->select("select * from users where id='$id'")->fetch_assoc();
        $this->db->delete("delete * from users where id='$id'");
        unlink($data['img']);
    }

    function getStores()
    {
        return $this->db->select("select * from store");
    }

    function deleteById($id)
    {
        $this->db->delete("delete from store where id='$id'");
    }

    function getUserById($id)
    {
        return $this->db->select("select * from users where id='$id'");
    }

    function getProducts()
    {
        return $this->db->select("select * from product");
    }
    function approved($id)
    {
        return $this->db->update("update users set status=1 where id='$id'");
    }

    function reject($id)
    {
        return $this->db->update("update users set status=2 where id='$id'");
    }


    function deleteProduct($id)
    {
        $data = $this->db->select("select * from product where id='$id'")->fetch_assoc();
        $this->db->delete("delete from product where id='$id'");
        unlink('../'.$data['img']);
    }



}