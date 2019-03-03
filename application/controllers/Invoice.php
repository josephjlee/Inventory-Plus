<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function getPrice() {

        $id = $_POST['id'];

        $this->db->select('sellprice,name,(select count from stock where item=item.ID) as qty,(select name from locations where bid=item.location) as location');
        $this->db->from('item');
        $this->db->where('ID', $id);
        $query = $this->db->get();
        $a = $query->row();
        echo $a->sellprice . ',' . $a->name . ',' . $a->location. ',' . $a->qty;
    }

    public function getInfo() {

        $id = $_POST['id'];

        $this->db->select('sellprice,name,ID');
        $this->db->from('item');
        $this->db->where('location', $id);
        $query = $this->db->get();
        $a = $query->row();
        echo $a->sellprice . ',' . $a->name . ',' . $a->ID;
    }

    public function SaveTable() {

        $table = $_POST['o'];
        $customer = $_POST['customer'];
        $total = $_POST['total'];
        $balance = $_POST['balance'];
        $qty = $_POST['qty'];
        $table = $_POST['o'];
        $pay = $_POST['pay'];



        $date = new DateTime("now", new DateTimeZone("Asia/Calcutta"));
        $d = $date->format("Y-m-d");


        $this->db->query(
                'INSERT INTO invoice (billAmount,qty,customerid,date,balance) VALUES (?, ?,?,?,?)', array($total, $qty, $customer, $d, $balance)
        );
        $invoiceid = $this->db->insert_id();

        if ($total > $pay) {



            $this->db->query(
                    'INSERT INTO debetors (CID,TotalBalance,Payment,IID,Remain,date) VALUES (?, ?,?,?,?,?)', array($customer, $total, $pay, $invoiceid, $balance, $d)
            );
        }



        $id = 0;
        $val;
        foreach ($table as $item):
            $id++;


            $this->db->query(
                    'INSERT INTO invoiceinfo (IID,qty,price,item,total) VALUES (?, ?,?,?,?)', array($invoiceid, $item[3], $item[4], $item[1], $item[5])
            );
            $this->db->query('update stock set count=count-"' . $item[3] . '" where item="' . $item[1] . '"');




        endforeach;


        //$xml=  simplexml_load_file("sample1.jrxml");
      //  var_dump($PHPJasperXML->outpage('I'));
    }
    
    public function printBill(){
        
        $this->load->library('tcpdf/tcpdf');
        $this->load->library('PHPJasperXML');
     
        $customer = $_POST['customer'];
        $total = $_POST['total'];
 
        $d = $_POST['date'];
        $invoiceid = $_POST['id'];
        



        $PHPJasperXML = new PHPJasperXML();
//$PHPJasperXML->debugsql=true;
        $PHPJasperXML->arrayParameter = array("customer" => $customer,"date"=>$d,"amount"=>$total,"id"=>$invoiceid);
        $PHPJasperXML->load_xml_file(base_url('report\invoice.jrxml'));
        $PHPJasperXML->transferDBtoArray('localhost', 'root', '', 'Inventoryplus');
        ob_end_clean();
        $PHPJasperXML->outpage('I');     
    }

    public function CustomerAdd() {

        $name = $_POST['name'];
        $address = $_POST['address'];
        $tp = $_POST['tp'];

        $this->db->query(
                'INSERT INTO customer (name,address,tp,status) VALUES (?, ?,?,?)', array($name, $address, $tp, "true")
        );
        $cusid = $this->db->insert_id();
        echo $cusid . ',' . $name;
    }

    public function load() {

        // header("Content-Type: application/json");
        $this->db->select('*');
        $this->db->from('brand');
        $query['data'] = $this->db->get();
        $this->load->view('Parts/BrandTbl', $query);
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

    public function search() {

        $id = $_POST['id'];
        $this->db->select('*,(select name from item where ID=item) as it');
        $this->db->from('invoiceinfo');
        $this->db->where("IID", $id);

        $data = $this->db->get();
        echo '<table id="tbles" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Item</th>
                <th>Price</th>
                    <th>Quantity</th>
                 <th>total</th>
               
           
            </tr>
        </thead>
       <tbody> ';
        $str = "";
        foreach ($data->result() as $row) {
            echo '<tr>';
            echo '<td>' . $row->it . '</td>';
            echo '<td>' . $row->price . '</td>';
            echo '<td>Rs.' . $row->qty . '</td>';
            echo '<td>Rs.' . $row->total . '</td>';
            echo '</tr>';
        }
    }

}
?>

