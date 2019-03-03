    

<?php

class ItemModel extends CI_Model {

    public function LoadItems() {

        $sql = "SELECT * FROM LOcation";
        ;

        $query = $this->db->query($sql);

 

        return $query;
    }

}
?>


