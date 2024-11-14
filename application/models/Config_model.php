<?php
class Config_model extends CI_Model{
    public function __construct(){
        $this->dniis = $this->load->database('dniis', TRUE);
        $this->load->database();
    }

    public function user_list(){
        $query = $this->dniis->query("SELECT 
                                    a.*,
                                    b.*,
                                    l.name as 'lgu',
                                    sl.name as 'sub_lgu',
                                    br.name as 'barangay'
                                    from core_users a
                                    left join systems_clients b on a.id=b.user_id
                                    left join systems_lgu l on b.lgu = l.psgc 
                                    left join systems_sub_lgu sl on b.sub_lgu = sl.psgc 
                                    left join systems_barangays br on b.barangay = br.psgc ");
        return $query->result_array();
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

    public function action_list(){
        $query = $this->db->query("SELECT * FROM conf_action");
        return $query->result_array();
    }

    public function usersession(){
        $query = $this->dniis->query("SELECT * FROM core_session a left join core_users b on a.userid = b.id left join systems_clients c on b.id=c.user_id");
        return $query->result_array();
    }
}

?>