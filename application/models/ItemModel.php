    

<?php

class ItemModel extends CI_Model {

    public function LoadItems() {

        $sql = "SELECT * FROM item WHERE status = ?";
        ;

        $query = $this->db->query($sql, "true");



        return $query;
    }

    public function loadModel() {

        //header("Content-Type: application/json");
        $this->db->select('bid as value,name as text');
        $this->db->from('model');
        $this->db->where('status', 'true');
        $query = $this->db->get();

        return '[{ list:' . json_encode($query->result(), true) . '}]';
    }

    public function loadType() {

        //header("Content-Type: application/json");
        $this->db->select('bid as value,name as text');
        $this->db->from('type');
        $this->db->where('status', 'true');
        $query = $this->db->get();

        return '[{ list:' . json_encode($query->result(), true) . '}]';
    }

    public function loadCountry() {

        //header("Content-Type: application/json");
        $this->db->select('ID as value,name as text');
        $this->db->from('country');
        $this->db->where('status', 'true');
        $query = $this->db->get();

        return '[{ list:' . json_encode($query->result(), true) . '}]';
    }

    public function loadBrand() {

        //header("Content-Type: application/json");
        $this->db->select('bid as value,name as text');
        $this->db->from('brand');
        $this->db->where('status', 'true');
        $query = $this->db->get();

        return '[{ list:' . json_encode($query->result(), true) . '}]';
    }
    
        public function loadLocation() {

        //header("Content-Type: application/json");
        $this->db->select('bid as value,name as text');
        $this->db->from('locations');
        $this->db->where('status', 'true');
        $query = $this->db->get();

        return '[{ list:' . json_encode($query->result(), true) . '}]';
    }


    public function loadItem() {

        //header("Content-Type: application/json");
        $this->db->select('ID as value,name as text');
        $this->db->from('item');
        $this->db->where('status', 'true');
        $query = $this->db->get();

        return '[{ list:' . json_encode($query->result(), true) . '}]';
    }

    public function loadCustomer() {

        //header("Content-Type: application/json");
        $this->db->select('cid as value,name as text');
        $this->db->from('customer');
        $this->db->where('status', 'true');
        $query = $this->db->get();

        return '[{ list:' . json_encode($query->result(), true) . '}]';
    }

    public function loadSeller() {

        //header("Content-Type: application/json");
        $this->db->select('cid as value,name as text');
        $this->db->from('seller');
        $this->db->where('status', 'true');
        $query = $this->db->get();

        return '[{ list:' . json_encode($query->result(), true) . '}]';
    }

    public function loadBarcode() {

        //header("Content-Type: application/json");
        $this->db->select('ID  as value,barcode as text');
        $this->db->from('item');
        $this->db->where('status', 'true');
        $query = $this->db->get();

        return '[{ list:' . json_encode($query->result(), true) . '}]';
    }

}
?>


