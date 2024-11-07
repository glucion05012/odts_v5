<?php
    class Outboxcontroller extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->database();
        }

        public function outbox(){
            $data['category_list'] =  $this->Config_model->category_list();
            $data['sub_category_list'] =  $this->Config_model->sub_category_list();
            $data['action_list'] =  $this->Config_model->action_list();
            
            $data['office_list'] =  $this->Config_model->office_list();
            $data['division_list'] =  $this->Config_model->division_list();
            $data['section_list'] =  $this->Config_model->section_list();
            $data['user_list'] =  $this->Config_model->user_list();

            $data['dms_list'] =  $this->Dms_model->dms_list();
            $data['dms_transaction_list'] =  $this->Dms_model->dms_transaction_list();
            $data['dms_attachment_list'] =  $this->Dms_model->dms_attachment_list();

            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('dms/outbox', $data);
            $this->load->view('templates/footer');
        }

    }
?>