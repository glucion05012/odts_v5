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

    }