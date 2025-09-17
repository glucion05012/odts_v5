<?php
    class Notice_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        // public function list(){
        //     $query = $this->db->query("SELECT a.*,
        //     b.forwarded_to_id,
        //     b.reference_no
        //     FROM notice a
        //     left join (
        //                 select 
        //         		cc.reference_no,
        //                 bb.dms_id,
        //                 bb.forwarded_to_id
        //     from dms_transaction bb 
        //         left join dms_dms cc on bb.dms_id=cc.id
        //         where bb.id in
        //             (select max(id) from dms_transaction group by dms_id)) as b on b.dms_id=a.dms_id;
        //     ");
        //     return $query->result_array();
        // }

        public function list(){
            $query = $this->db->query("SELECT 
                a.*,
                cc.reference_no,
                t.forwarded_to_id
            FROM notice a
            LEFT JOIN (
                SELECT dt1.*
                FROM dms_transaction dt1
                JOIN (
                    SELECT dms_id, MAX(id) AS max_id
                    FROM dms_transaction
                    GROUP BY dms_id
                ) dt2 ON dt1.dms_id = dt2.dms_id AND dt1.id = dt2.max_id
            ) t ON t.dms_id = a.dms_id
            LEFT JOIN dms_dms cc ON t.dms_id = cc.id;
            ");
            return $query->result_array();
        }

        public function create_so(){
            date_default_timezone_set('Asia/Manila');

            // insert dms_dms
            $data = array(
                'date_created' => date("Y-m-d"),
                'created_by_id' => $_SESSION['userid'],
                'category_id' => 4,
                'sub_category_id' => 75,
                'subject_name' => $this->input->post('subject'),
                'document_type' => "For Compliance",
                'status' => 'Active'
            );
            
            $this->db->insert('dms_dms', $data);

            // add reference no
            $dms_id = $this->db->insert_id();
            $ref_no = 'ODTS-NCR-SO-'.date("Y").'-'.sprintf("%06d", $dms_id);
            
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
                'status' => 'Pending',
                'attachment_type' => "Attachment",
            );
            
            $this->db->insert('dms_transaction', $datatr);

                  
                  

            $datan = array(
                'venue_nom' => $this->input->post('location'),
                'date_nom' => $this->input->post('schedule'),
                'subject' => $this->input->post('subject'),
                'content' => $this->input->post('content'),
                'created_by' => $_SESSION['userid'],
                'date_created' => date("Y-m-d"),
                'status' => 'Pending',
                'type' => 'SO',
                'dms_id' => $dms_id,
            );

            $this->db->insert('notice', $datan);
            
            $query = $this->db->query("SELECT * FROM dms_dms WHERE id = '$dms_id'");
            return $query->result_array();
        }
        public function view_so($id){
            $query = $this->db->query("SELECT * FROM notice where id = $id");
            return $query->row_array();
        }

        public function updateSODate(){
            $dataso = array(
                'so_date' => $this->input->post('updatedDate'),
            );

            $this->db->where('id', $this->input->post('soDateid'));
            $this->db->update('notice', $dataso);
        }

        public function updateSO(){
            $dataso = array(
                'subject' => $this->input->post('subject'),
                'content' => $this->input->post('content'),
            );

            $this->db->where('id', $this->input->post('so_id'));
            $this->db->update('notice', $dataso);
        }
        public function get_announcement_by_index($index) {
            $query = $this->db->query("SELECT ca.*, caa.file_name 
                                       FROM conf_announcements ca
                                       LEFT JOIN conf_announcements_attachment caa 
                                       ON ca.id = caa.conf_announcements_id
                                       WHERE ca.status = '1'
                                       ORDER BY STR_TO_DATE(date_created, '%Y-%m-%d') DESC
                                       LIMIT 1 OFFSET " . (int) $index); 
            
            $announcement = $query->row_array(); 
            
            if (!$announcement) {
                return null; 
            }
        
            $this->dniis->select('name, email');
            $this->dniis->from('core_users');
            $this->dniis->where('id', $announcement['created_by_id']);
            $user_query = $this->dniis->get();
            $user = $user_query->row_array();
        
            $announcement['name'] = $user['name'];
            $announcement['file_name'] = isset($announcement['file_name']) ? $announcement['file_name'] : null;
        
            return $announcement;
        }
    }