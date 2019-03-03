<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function add() {

        $name = $_POST['name'];
        $description = $_POST['description'];
        $this->db->query(
                'INSERT INTO model (name,status,description) VALUES (?, ?,?)', array($name, "true", $description)
        );
    }

    public function load() {

        // header("Content-Type: application/json");
        $this->db->select('*');
        $this->db->from('model');
        $query['data'] = $this->db->get();
        $this->load->view('Parts/ModelTbl', $query);
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
        $this->db->update('model');

        //  $query = $this->db->query($sql);
        // $this->load->view('Parts/CountryTbl', $query);
    }

}
?>

