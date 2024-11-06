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
                                d.ts_action,
                                d.ts_remarks,
                                d.ts_forwarded_by_id,
                                d.ts_forwarded_date,
                                d.ts_forwarded_to_id,
                                d.ts_accepted_date,
                                d.ts_transaction_id,
                                d.ts_status,
                                d.ts_office_id
                                FROM dms_dms a
                                LEFT JOIN conf_category b on a.category_id=b.id
                                LEFT JOIN conf_sub_category c on a.sub_category_id=c.id
                                LEFT JOIN (
                                            select
                                                dt.id as ts_transaction_id,
                                                dt.forwarded_by_id as ts_forwarded_by_id,
                                                dt.forwarded_to_id as ts_forwarded_to_id,
                                                dt.dms_id,
                                                dt.accepted_date as ts_accepted_date,
                                                dt.office_id as ts_office_id,
                                                dt.status as ts_status,
                                                ac.action as ts_action,
                                                dt.remarks as ts_remarks,
                                               	dt.forwarded_date as ts_forwarded_date
                                            from dms_transaction as dt
                                            left join conf_action as ac on dt.action_id=ac.id
                                    WHERE dt.id IN (SELECT max(dt2.id) from dms_transaction dt2														group by dt2.dms_id
                                        ))as d on a.id=d.dms_id;");

        return $query->result_array();
    }

    public function dms_transaction_list(){
        $query = $this->db->query("SELECT
                            b.reference_no,
                            b.category_id,
                            c.main_category as category,
                            b.sub_category_id,
                            d.sub_category,
                            b.subject_name,
                            b.document_type,
                            a.*,
                            e.action as action_name
                            FROM dms_transaction a
                            LEFT JOIN dms_dms b on a.dms_id=b.id
                            LEFT JOIN conf_category c on b.category_id=c.id
                            LEFT JOIN conf_sub_category d on b.sub_category_id=d.id
                            LEFT JOIN conf_action e on a.action_id=e.id;");

        return $query->result_array();
    }

    public function dms_transaction_list_one($id){
        $decid = base64_decode($id);
        $query = $this->db->query("SELECT
                            b.reference_no,
                            b.category_id,
                            b.sub_category_id,
                            b.subject_name,
                            b.document_type,
                            a.* 
                            FROM dms_transaction a
                            LEFT JOIN dms_dms b on a.dms_id=b.id where a.id=$decid;");

        return $query->row_array();
    }
    
    public function create_transaction(){

        // insert dms_dms
        $data = array(
            'date_created' => date("Y-m-d"),
            'created_by_id' => $_SESSION['userid'],
            'category_id' => $this->input->post('category_id'),
            'sub_category_id' => $this->input->post('sub_category_id'),
            'subject_name' => $this->input->post('subject_name'),
            'document_type' => $this->input->post('document_type'),
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

        // insert dms_transaction
        $datatr = array(
            'office_id' => $this->input->post('office_id'),
            'dms_id' => $dms_id,
            'forwarded_by_id' => $_SESSION['userid'],
            'forwarded_date' => date("Y-m-d"),
            'forwarded_to_id' => $this->input->post('personnel_id'),
            'action_id' => $this->input->post('action_id'),
            'remarks' => $this->input->post('remarks'),
            'status' => 'Pending'
        );
        
        $this->db->insert('dms_transaction', $datatr);

        $query = $this->db->query("SELECT * FROM dms_dms WHERE id = '$dms_id'");
        return $query->result_array();
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

    
    public function accept_transaction(){
        $data = array(
            'accepted_date' => date("Y-m-d"),
        );

        $this->db->where('id', $this->input->post('transaction_id'));
        $this->db->update('dms_transaction', $data);
    }

    public function process_transaction(){
        // insert dms_transaction
        $datatr = array(
            'office_id' => $this->input->post('office_id'),
            'dms_id' => $this->input->post('dms_id'),
            'forwarded_by_id' => $_SESSION['userid'],
            'forwarded_date' => date("Y-m-d"),
            'forwarded_to_id' => $this->input->post('personnel_id'),
            'action_id' => $this->input->post('action_id'),
            'remarks' => $this->input->post('remarks'),
            'status' => $this->input->post('status'),
        );
        
        $this->db->insert('dms_transaction', $datatr);

        $dms_transaction_id = $this->db->insert_id();
        $query = $this->db->query("SELECT * FROM dms_transaction WHERE id = '$dms_transaction_id'");
        return $query->result_array();
    }

}
?>