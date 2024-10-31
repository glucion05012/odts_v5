<?php
class Config_model extends CI_Model{
    public function __construct(){
        $this->dniis = $this->load->database('dniis', TRUE);
        $this->load->database();
    }
    
    public function category_list(){
        $query = $this->db->query("SELECT * FROM conf_category");
        return $query->result_array();
    }

    public function sub_category_list(){
        $query = $this->db->query("SELECT * FROM conf_sub_category");
        return $query->result_array();
    }

    public function office_list(){
        $query = $this->dniis->query("SELECT * FROM systems_office");
        return $query->result_array();
    }

    public function division_list(){
        $query = $this->dniis->query("SELECT * FROM systems_division");
        return $query->result_array();
    }

    public function section_list(){
        $query = $this->dniis->query("SELECT * FROM systems_section");
        return $query->result_array();
    }

    public function user_list(){
        $query = $this->dniis->query("SELECT * FROM core_users");
        return $query->result_array();
    }
}

?>