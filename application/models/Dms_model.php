<?php
class Dms_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function dms_list(){
        $query = $this->db->query("SELECT 
a.*,
b.main_category,
c.sub_category,
d.action
FROM dms_dms a
LEFT JOIN conf_category b on a.category_id=b.id
LEFT JOIN conf_sub_category c on a.sub_category_id=c.id
LEFT JOIN conf_action d on a.action_id=d.id;");

        return $query->result_array();
    }
    
    public function create_transaction(){

        $data = array(
            'date_created' => date("Y-m-d"),
            'created_by_id' => $_SESSION['userid'],
            'category_id' => $this->input->post('category_id'),
            'sub_category_id' => trim($this->input->post('sub_category_id')),
            'subject_name' => $this->input->post('subject_name'),
            'document_type' => trim($this->input->post('document_type')),
            'action_id' => $this->input->post('action_id'),
            'remarks' => $this->input->post('remarks'),
            'status' => 'Active'
        );
        
        $this->db->insert('dms_dms', $data);

        // add reference no
        $dms_id = $this->db->insert_id();
        $ref_no = 'ODTS-NCR-'.date("Y").'-'.sprintf("%06d", $dms_id);
        
        $datar = array(
            'reference_no' => $ref_no,
        );

        $this->db->where('id', $dms_id);
        $this->db->update('dms_dms', $datar);

        $query = $this->db->query("SELECT * FROM dms_dms WHERE id = '$dms_id'");
        return $query->result_array();
    }
    
    public function create_transaction_attachment($file){

        $dms_id_query = $this->db->query('select * from dms_dms ORDER BY id DESC LIMIT 1');
        foreach($dms_id_query->result() as $diq){
            $dms_id = $diq->id;
        }

        $data = array(
            'dms_transaction_id' => $dms_id,
            'file_name' => $file['file_name'],
            'file_location' => $file['file_location'],
            'date_uploaded' => date("Y-m-d"),
            'type' => $file['type'],
        );
        
        $this->db->insert('dms_attachments', $data);
    }
}
?>