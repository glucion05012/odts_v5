<?php
    class Settings_Model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function add_action(){
            $data = array(
                'action' => $this->input->post('action')
            );

            return $this->db->insert('conf_action', $data);
        }

        public function edit_action($id){
            $data = array(
                'action' => $this->input->post('action')
            );
            $this->db->where('id', $id);
            return $this->db->update('conf_action', $data);
        }

        public function get_action(){
            $this->db->select('*')->from('conf_action');
            $query = $this->db->get();
            return $query->result_array();
        }

        public function add_category(){
            $data = array(
                'main_category' => $this->input->post('category')
            );

            return $this->db->insert('conf_category', $data);
        }

        public function edit_category($id){
            $data = array(
                'main_category' => $this->input->post('main_category')
            );
            $this->db->where('id', $id);
            return $this->db->update('conf_category', $data);
        }

        public function get_category(){
            $this->db->select('*')->from('conf_category');
            $query = $this->db->get();
            return $query->result_array();
        }

        public function add_sub_cat(){
            $data = array(
                'cat_id' => $this->input->post('cat_id'),
                'sub_category' => $this->input->post('sub_category')
            );

            return $this->db->insert('conf_sub_category', $data);
        }

        public function edit_sub_category($id){
            $data = array(
                'sub_category' => $this->input->post('sub_category')
            );
            $this->db->where('id', $id);
            return $this->db->update('conf_sub_category', $data);
        }

        public function get_sub_cat(){
            $this->db->select('*')->from('conf_sub_category');
            $query = $this->db->get();
            return $query->result_array();
        }
        public function ann_create(){
            $data = array(
                'subject' => $this->input->post('subject'),
                'location' => $this->input->post('location'),
                'schedule' => $this->input->post('schedule'),
                'created_by_id' => $_SESSION['userid'],
                'status' => 1,
            );

            $this->db->insert('conf_announcements', $data);

            $ann_id = $this->db->insert_id();
            $query = $this->db->query("SELECT * FROM conf_announcements WHERE id = '$ann_id'");
            return $query->result_array();
        }
        public function ann_create_attach($file){
            // ----------- create attachment db -----------
            $data = array(
                'file_name' => $file['file_name'],
                'file_location' => $file['file_location'],
                'conf_announcements_id' => $file['ann_id'],
            );
            return $this->db->insert('conf_announcements_attachment', $data);
            
        }

        public function ann_list(){
            $query = $this->db->query("SELECT * FROM conf_announcements order by id DESC");
            return $query->result_array();
        }

        public function ann_attach_list(){
            $query = $this->db->query("SELECT * FROM conf_announcements_attachment");
            return $query->result_array();
        }

        public function ann_list_dash(){
            $query = $this->db->query("SELECT * FROM conf_announcements where status = 1 order by id DESC");
            return $query->result_array();
        }

        public function ann_attach_list_dash(){
            $query = $this->db->query("SELECT b.* FROM conf_announcements_attachment b left join conf_announcements a on a.id = b.conf_announcements_id where a.status = 1");
            return $query->result_array();
        }
        public function ann_delete($id){
            $data = array(
                'status' => 0,
            );
            $this->db->where('id', $id);
            return $this->db->update('conf_announcements', $data);
        }

        public function notice_list_ajax($length, $start, $search){
            $query = $this->db->query("SELECT 
                                        *
                                    FROM conf_announcements 
                                        where (
                                            subject LIKE CONCAT('%$search%') 
                                        ) ORDER BY status DESC
                                    LIMIT $start, $length;");
    
            return $query->result_array();
        }

        public function notice_list_ajax_count(){
            $query = $this->db->query("SELECT 
                *
            FROM conf_announcements");
            return $query->num_rows();
        }
        
        public function notice_list_ajax_one($id){
            $query = $this->db->query("SELECT 
                                        *
                                    FROM conf_announcements
                                        where id = $id");
    
            return $query->result_array();
        }

        public function notice_list_attach_ajax_one($id){
            $query = $this->db->query("SELECT 
                                        *
                                    FROM conf_announcements_attachment
                                        where conf_announcements_id = $id");
    
            return $query->result_array();
        }
    }