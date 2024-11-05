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
        
        $this->db->insert('dms_transaction', $data);

        // add reference no
        $dms_id = $this->db->insert_id();
        $ref_no = 'ODTS-NCR-'.date("Y").'-'.sprintf("%06d", $dms_id);
        
        $datar = array(
            'reference_no' => $ref_no,
        );

        $this->db->where('id', $dms_id);
        $this->db->update('dms_transaction', $datar);
    }
    
    public function create_transaction_attachment($file){

        $dms_id_query = $this->db->query('select * from dms_transaction ORDER BY id DESC LIMIT 1');
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