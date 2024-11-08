<?php
    class Inboxcontroller extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->database();
        }

        public function inbox(){
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
            $this->load->view('dms/inbox', $data);
            $this->load->view('templates/footer');
        }

        public function all_transactions(){
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
            $this->load->view('dms/all', $data);
            $this->load->view('templates/footer');
        }

        public function confidential_transactions(){
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
            $this->load->view('dms/confidential', $data);
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
            $data = $this->Dms_model->create_transaction();
            echo json_encode($data);
        }
        public function accept_transaction(){
            return $this->Dms_model->accept_transaction();
        }
        public function process_transaction(){
            $data = $this->Dms_model->process_transaction();
            echo json_encode($data);
        }
        
        public function process($id){
            $data['category_list'] =  $this->Config_model->category_list();
            $data['sub_category_list'] =  $this->Config_model->sub_category_list();
            $data['action_list'] =  $this->Config_model->action_list();
            
            $data['office_list'] =  $this->Config_model->office_list();
            $data['division_list'] =  $this->Config_model->division_list();
            $data['section_list'] =  $this->Config_model->section_list();
            $data['user_list'] =  $this->Config_model->user_list();
            $data['dms_transaction_list_one'] =  $this->Dms_model->dms_transaction_list_one($id);
            
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('dms/process', $data);
            $this->load->view('templates/footer');
        }
        
        public function df($id){
            $decid = base64_decode($id);
            $data['dms_id'] = $decid;
            
            $data['dms_list'] =  $this->Dms_model->dms_list();
            $data['dms_transaction_list'] =  $this->Dms_model->dms_transaction_list();
            $data['division_list'] =  $this->Config_model->division_list();
            $data['section_list'] =  $this->Config_model->section_list();
            $data['user_list'] =  $this->Config_model->user_list();
            $data['dms_transaction_list'] =  $this->Dms_model->dms_transaction_list();

            $this->load->view('templates/header');
            $this->load->view('dms/df', $data);
        }

        public function ar($id){
            $decid = base64_decode($id);
            $data['dms_id'] = $decid;
            
            $data['dms_list'] =  $this->Dms_model->dms_list();
            $data['dms_transaction_list'] =  $this->Dms_model->dms_transaction_list();
            $data['division_list'] =  $this->Config_model->division_list();
            $data['section_list'] =  $this->Config_model->section_list();
            $data['user_list'] =  $this->Config_model->user_list();
            $data['dms_transaction_list'] =  $this->Dms_model->dms_transaction_list();

            $this->load->view('templates/header');
            $this->load->view('dms/ar', $data);
        }

        public function validator($id){
            $decid = base64_decode($id);
            $data['dms_id'] = $decid;
            
            $data['dms_list'] =  $this->Dms_model->dms_list();
            $data['dms_transaction_list'] =  $this->Dms_model->dms_transaction_list();
            $data['division_list'] =  $this->Config_model->division_list();
            $data['section_list'] =  $this->Config_model->section_list();
            $data['user_list'] =  $this->Config_model->user_list();
            $data['dms_transaction_list'] =  $this->Dms_model->dms_transaction_list();

            $this->load->view('templates/header');
            $this->load->view('dms/validator', $data);
        }
    }

?>