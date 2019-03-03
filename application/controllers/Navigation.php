<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Navigation extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function Location() {
        $this->load->model('ItemModel');
        $data['items'] = $this->ItemModel->LoadItems();
        $this->load->view('Products/Location', $data);
    }

    public function Brand() {
        $this->load->model('ItemModel');
        $data['items'] = $this->ItemModel->LoadItems();
        $this->load->view('Products/Brand', $data);
    }

    public function Model() {
        $this->load->model('ItemModel');
        $data['items'] = $this->ItemModel->LoadItems();
        $this->load->view('Products/Model', $data);
    }

    public function Country() {
        $this->load->model('ItemModel');
        $data['items'] = $this->ItemModel->LoadItems();
        $this->load->view('Products/Country', $data);
    }

    public function Type() {
        $this->load->model('ItemModel');
        $data['items'] = $this->ItemModel->LoadItems();
        $this->load->view('Products/Type', $data);
    }

    public function Item() {



//        
//        $this->load->library('tcpdf/tcpdf.php');
//             $this->load->library('PHPJasperXML.inc.php');
//        
//        $xml =  simplexml_load_file('report/sampleReport.jrxml');
//
//$PHPJasperXML = new PHPJasperXML();
        
       
     //$this->load->library('PHPJasperXML.inc');

        $this->load->model('ItemModel');
        $data['model'] = $this->ItemModel->loadModel();
        $data['type'] = $this->ItemModel->loadType();
        $data['country'] = $this->ItemModel->loadCountry();
        $data['brand'] = $this->ItemModel->loadBrand();
         $data['location'] = $this->ItemModel->loadLocation();
//
//        $this->db->select('*');
//        $this->db->from('location');
//        $this->db->order_by("lid", "asc");
//        $data['data'] = $this->db->get();


        $this->load->view('Products/Item', $data);
        
//        
//        $this->load->library('tcpdf/tcpdf');
//       $this->load->library('PHPJasperXML');
      
        
        
//        $PHPJasperXML = new PHPJasperXML();
////$PHPJasperXML->debugsql=true;
//$PHPJasperXML->arrayParameter=array("parameter1"=>1);
//$PHPJasperXML->load_xml_file('C:\wamp\www\Inventory\application\sample1.jrxml');
//$PHPJasperXML->transferDBtoArray('localhost', 'root', '', 'Inventoryplus');
// ob_end_clean();
//$PHPJasperXML->outpage('I');    //page output method I:standard output  D:Download file
        //$xml=  simplexml_load_file("sample1.jrxml");
    }
    
    
    
      public function Grn() {




        $this->load->model('ItemModel');
        $data['item'] = $this->ItemModel->loadItem();
        $data['customer'] = $this->ItemModel->loadSeller();
        $data['barcode'] = $this->ItemModel->loadBarcode();


//        $this->db->select('*,(select name from item where location=location.lid) as item');
//        $this->db->from('location');
//
//        $this->db->order_by("lid", "asc");
//
//
//        $data['location'] = $this->db->get();



        $this->db->select('max(IID) as IID');
        $this->db->from('Grn');




        $in = $this->db->get();
        $IID = $in->result();
        $data['invoiceid'] = $IID;

        $this->load->view('Grn', $data);
    }

    public function Invoice() {




        $this->load->model('ItemModel');
        $data['item'] = $this->ItemModel->loadItem();
        $data['customer'] = $this->ItemModel->loadCustomer();
        $data['barcode'] = $this->ItemModel->loadBarcode();


//        $this->db->select('*,(select name from item where location=locations.bid) as item');
//        $this->db->from('locations');
//
//        $this->db->order_by("name", "asc");
//
//
//        $data['location'] = $this->db->get();



        $this->db->select('max(IID) as IID');
        $this->db->from('invoice');




        $in = $this->db->get();
        $IID = $in->result();
        $data['invoiceid'] = $IID;

        $this->load->view('invoice', $data);
    }

    public function InvoiceSearch() {


         
        $this->db->select('*,(select name from customer where cid=customerid) as cus');
        $this->db->from('invoice');
         
        $in = $this->db->get();
        
        $data['invoice'] = $in;
 
         


        $this->load->view('Invoice/BillSearch', $data);
    }

    
       public function Debitors() {


         
        $this->db->select('*,(select name from customer where cid=debetors.CID) as cus');
        $this->db->from('debetors');
         $this->db->where('status','true');
        $in = $this->db->get();
        
        $data['invoice'] = $in;
 
         


        $this->load->view('Invoice/Debitors', $data);
    }
    
    
       public function Creditors() {

     $this->db->select('*,(select name from seller where cid=creditors.CID) as cus');
        $this->db->from('creditors');
         $this->db->where('status','true');
        $in = $this->db->get();
        
        $data['invoice'] = $in;
 
         


        $this->load->view('Grn/Creditors', $data);
    }

    
       public function GrnSearch() {


         
        $this->db->select('*,(select name from seller where cid=customerid) as cus');
        $this->db->from('grn');
         
        $in = $this->db->get();
        
        $data['invoice'] = $in;
 
         


        $this->load->view('Grn/BillSearch', $data);
    }
}

?>