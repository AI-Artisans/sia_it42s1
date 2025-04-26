<?php
class Blogs_model extends CI_Model{
    public function getSome($numrec = 0){
        $this->db->limit($numrec);
        $query = $this->db->get('blogs');
        return $query->result();
    }
}
?>
