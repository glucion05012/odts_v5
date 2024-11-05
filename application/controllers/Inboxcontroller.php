<?php
    class Inboxcontroller extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->database();
        }

        public function inbox(){
            $data['dms_list'] =  $this->Dms_model->dms_list();
            $data['user_list'] =  $this->Config_model->user_list();

            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('dms/inbox', $data);
            $this->load->view('templates/footer');
        }

        public function new(){
            $data['category_list'] =  $this->Config_model->category_list();
            $data['sub_category_list'] =  $this->Config_model->sub_category_list();
            $data['action_list'] =  $this->Config_model->action_list();
            
            $data['office_list'] =  $this->Config_model->office_list();
            $data['division_list'] =  $this->Config_model->division_list();
            $data['section_list'] =  $this->Config_model->section_list();
            $data['user_list'] =  $this->Config_model->user_list();

            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('dms/new', $data);
            $this->load->view('templates/footer');
        }
        
        public function create_transaction(){
            return $this->Dms_model->create_transaction();
        }
    }
?>