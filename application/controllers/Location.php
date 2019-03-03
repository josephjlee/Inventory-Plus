<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    
       public function del() {

   $this->db->truncate('location');
    }
    
    
    public function add() {

        $id = $_POST['id'];
        $name= $_POST['name'];
        $cols=$_POST['cols'];
        $rows=$_POST['rows'];
        $this->db->query(
                'INSERT INTO location (lid,name,cols,rows) VALUES (?, ?,?,?)', array($id,$name, $cols, $rows)
        );
    }

    public function load() {

        // header("Content-Type: application/json");
        $this->db->select('*');
        $this->db->from('location');
        $this->db->order_by("lid", "asc");
        $query['data'] = $this->db->get();
        $this->load->view('Parts/LocationTbl', $query);
    }

    public function Update() {

        // header("Content-Type: application/json");

        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $state = $_POST['status'];

        //  $sql = "Update Country set name='".$name."' where ID='".$name."'";
        ;
        $this->db->where('bid', $id);
        $this->db->set("name", $name);
        $this->db->set("status", $state);
        $this->db->set("description", $description);
        $this->db->update('brand');

        //  $query = $this->db->query($sql);
        // $this->load->view('Parts/CountryTbl', $query);
    }

}
?>

