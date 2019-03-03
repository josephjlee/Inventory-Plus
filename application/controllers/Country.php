<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function add() {
 
     $name = $_POST['name'];
$this->db->query(
    'INSERT INTO country (name,status) VALUES (?, ?)',
    array($name, "true")
);
    }

    public function load() {

        // header("Content-Type: application/json");
        $this->db->select('*');
        $this->db->from('country');
        $query['data'] = $this->db->get();
        $this->load->view('Parts/CountryTbl', $query);
    }

    public function Update() {

        // header("Content-Type: application/json");

        $id = $_POST['id'];
        $name = $_POST['name'];
$state = $_POST['status'];

        //  $sql = "Update Country set name='".$name."' where ID='".$name."'";
        ;
        $this->db->where('id', $id);
        $this->db->set("name", $name);
        $this->db->set("status", $state);
        $this->db->update('country');

        //  $query = $this->db->query($sql);
        // $this->load->view('Parts/CountryTbl', $query);
    }

}
?>

