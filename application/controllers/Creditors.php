<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Creditors extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
 

    public function payment() {
        $id = $_POST['id'];
        $pay = $_POST['pay'];

        $date = new DateTime("now", new DateTimeZone("Asia/Calcutta"));
        $d = $date->format("Y-m-d");

        $this->db->query('update Creditors set Remain=Remain+"' . $pay . '" where IID="' . $id . '"');
        $this->db->query(
                'INSERT INTO creditorsInfo (IID,Date,Payment) VALUES (?, ?,?)', array($id, $d, $pay)
        );

        //////////////////

        $this->db->select('Remain');
        $this->db->from('debetors');
        $this->db->where('IID', $id);
        $query = $this->db->get();
        $a = $query->row();

        if ($a->Remain == 0) {
            $this->db->query('update debetors set status=false  where IID="' . $id . '"');
        }
        ///////////////////

        $this->db->select('*');
        $this->db->from('debetorsInfo');
        $this->db->where("IID", $id);
        $this->db->where("status", "true");
        $this->db->order_by('date', 'asc');

        $data = $this->db->get();
        echo '<table id="tbles1" class="display" style="width:100%">
        <thead>
            <tr>
                
              
                    <th>Date</th>
                 <th>Payment</th>
                
           
            </tr>
        </thead>
       <tbody> ';
        $str = "";
        foreach ($data->result() as $row) {
            echo '<tr>';


            echo '<td>' . $row->Date . '</td>';
            echo '<td>Rs.' . $row->Payment . '</td>';

            echo '</tr>';
        }
    }

    public function search() {

        $id = $_POST['id'];
        $this->db->select('*');
        $this->db->from('debetorsInfo');

        $this->db->where("IID", $id);
        $this->db->order_by('date', 'asc');

        $data = $this->db->get();
        echo '<table id="tbles1" class="display" style="width:100%">
        <thead>
            <tr>
                
              
                    <th>Date</th>
                 <th>Payment</th>
                
           
            </tr>
        </thead>
       <tbody> ';
        $str = "";
        foreach ($data->result() as $row) {
            echo '<tr>';


            echo '<td>' . $row->Date . '</td>';
            echo '<td>Rs.' . $row->Payment . '</td>';

            echo '</tr>';
        }
    }

}
?>

