<?php
class Dms_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    
    public function create_transaction(){

        $data = array(
            'category_id' => $this->input->post('category_id'),
            'sub_category_id' => trim($this->input->post('sub_category_id')),
            'subject_name' => $this->input->post('subject_name'),
            'document_type' => trim($this->input->post('document_type')),
            'personnel_id' => $this->input->post('personnel_id'),
            'action_id' => $this->input->post('action_id'),
            'remarks' => $this->input->post('remarks'),
            'status' => 'Active'
        );
        
        return $this->db->insert('dms_transaction', $data);
    }
}

?>