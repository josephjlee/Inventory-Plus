<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function add() {

        $name = $_POST['name'];
        $description = $_POST['description'];
        $model = $_POST['model'];
        $type = $_POST['type'];
        $brand = $_POST['brand'];
        $country = $_POST['country'];
        $location = $_POST['location'];
        $buying = $_POST['buying'];
        $selling = $_POST['selling'];
        $barcode = $_POST['barcode'];

        $this->db->query(
                'INSERT INTO item (name,description,model,type,brand,country,location,buyprice,sellprice,status,barcode) VALUES (?, ?,?,?,?,?,?,?,?,?,?)', array($name, $description, $model, $type, $brand, $country, $location, $buying, $selling, "true", $barcode)
        );

        $itemid = $this->db->insert_id();
        $this->db->query(
                'INSERT INTO stock (item,count) VALUES (?, ?)', array($itemid, '0')
        );


        $this->db->where('lid', $location);

        $this->db->set("status", "false");

        $this->db->update('location');
    }

    public function load() {

        $this->load->model('ItemModel');
        $data['model'] = $this->ItemModel->loadModel();
        $data['type'] = $this->ItemModel->loadType();
        $data['country'] = $this->ItemModel->loadCountry();
        $data['brand'] = $this->ItemModel->loadBrand();
        $data['location'] = $this->ItemModel->loadLocation();

//        $this->db->select('*');
//        $this->db->from('location');
//        $this->db->order_by("lid", "asc");
//        $data['location'] = $this->db->get();




        $data['data'] = $this->db->query('select ID,name,buyprice,sellprice'
                . ',location,status from item');
        $this->load->view('Parts/ItemTbl', $data);
    }

    public function GetVals() {
        $id = $_POST['id'];





        $data = $this->db->query('select  model,country,type,brand,description,barcode,(select name from model where bid=model) as modelN,(select name from country where ID=country) as "countryN",(select name from brand where bid=brand) as brandN,(select name from type where bid=type) as typeN,(select name from locations where bid=location) as location from item where ID="' . $id . '"');

        $str = "";
        foreach ($data->result() as $row) {
            $str .= $row->modelN . ']';
            $str .= $row->typeN . ']';
            $str .= $row->countryN . ']';
            $str .= $row->brandN . ']';
            $str .= $row->description . ']';
            $str .= $row->model . ']';
            $str .= $row->type . ']';
            $str .= $row->country . ']';
            $str .= $row->brand . ']';
            $str .= $row->barcode . ']';
            $str .= $row->location . ']';
        }
        echo $str;
    }

    public function Update() {

        // header("Content-Type: application/json");

        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $model = $_POST['model'];
        $type = $_POST['type'];
        $brand = $_POST['brand'];
        $country = $_POST['country'];
        $location = $_POST['location'];
        $buying = $_POST['buying'];
        $selling = $_POST['selling'];
        $barcode = $_POST['barcode'];

        $status = $_POST['status'];

        $this->db->select('location');
        $this->db->from('item');
        $this->db->where('ID', $id);
        $data = $this->db->get();
        $dd = $data->result();

        //  $sql = "Update Country set name='".$name."' where ID='".$name."'";

        $this->db->where('ID', $id);
        $this->db->set("name", $name);
        $this->db->set("status", $status);
        $this->db->set("description", $description);
        $this->db->set("model", $model);
        $this->db->set("type", $type);
        $this->db->set("brand", $brand);
        $this->db->set("country", $country);
        $this->db->set("buyprice", $buying);
        $this->db->set("sellprice", $selling);
        $this->db->set("location", $location);
        $this->db->set("barcode", $barcode);

        $this->db->update('item');

        $this->db->where('lid', $dd[0]->location);
        $this->db->set("status", "true");
        $this->db->update('location');




        $this->db->where('lid', $location);
        $this->db->set("status", "false");
        $this->db->update('location');
        var_dump($location);

        //  $query = $this->db->query($sql);
        // $this->load->view('Parts/CountryTbl', $query);
    }

}

?>