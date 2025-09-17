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
                                    left join systems_barangays br on b.barangay = br.psgc
                                    where a.block=0 and a.name not like '%test%' ORDER BY a.name");
        return $query->result_array();
    }
    
    public function user_list_one($id){
        $query = $this->dniis->query("SELECT 
                                        sd.abbr as div_name,
                                        ss.abbr as sec_name,
                                        a.*,
                                        b.*,
                                        l.name as 'lgu',
                                        sl.name as 'sub_lgu',
                                        br.name as 'barangay'
                                        from core_users a
                                        left join systems_clients b on a.id=b.user_id
                                        left join systems_lgu l on b.lgu = l.psgc 
                                        left join systems_sub_lgu sl on b.sub_lgu = sl.psgc 
                                        left join systems_barangays br on b.barangay = br.psgc
                                        left join systems_division sd on a.division = sd.division_id 
                                        left join systems_section ss on a.`section` = ss.section_id 
                                        where a.name not like '%test%' and a.id=$id");
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
        $query = $this->dniis->query("SELECT * 
FROM core_users a 
left join core_session b on b.userid = a.id ");
        return $query->result_array();
    }
}

?>