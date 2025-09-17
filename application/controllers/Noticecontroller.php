<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticecontroller extends CI_Controller {

    public function list(){
        
        $data['inbox'] =  $this->Dms_model->dms_list_forward_to();
        $data['notice_list'] =  $this->Notice_model->list();
        $data['user_list'] =  $this->Config_model->user_list();
        $data['division_list'] =  $this->Config_model->division_list();
        $data['section_list'] =  $this->Config_model->section_list();

        $this->load->view('templates/header');
        $this->load->view('templates/navbar', $data);
        $this->load->view('notice/list', $data);
        $this->load->view('templates/footer');
    }

    public function so(){
        if(isset($_SESSION['userid'])){
            $data['category_list'] =  $this->Config_model->category_list();
            $data['sub_category_list'] =  $this->Config_model->sub_category_list();
            $data['action_list'] =  $this->Config_model->action_list();
            
            $data['office_list'] =  $this->Config_model->office_list();
            $data['division_list'] =  $this->Config_model->division_list();
            $data['section_list'] =  $this->Config_model->section_list();
            $data['user_list'] =  $this->Config_model->user_list();
            
            $data['inbox'] =  $this->Dms_model->dms_list_forward_to();


            $this->load->view('templates/header');
            $this->load->view('templates/navbar', $data);
            $this->load->view('notice/so');
        }else{
            $this->load->view('maintenance');
        }
    }

    public function updateSO(){
        $this->Notice_model->updateSO();
        $this->session->set_flashdata('successmsg', 'SO successfully updated!');
        redirect('notice');
    }

    public function create_so(){
        $this->Notice_model->create_so();
        $this->session->set_flashdata('successmsg', 'SO successfully created! Please check your outbox for the transaction.');
        redirect('notice');
    }

    public function updateSODate(){
        $this->Notice_model->updateSODate();
        $this->session->set_flashdata('successmsg', 'SO successfully updated!');
        redirect('notice');
    }
    
    public function view_so($id){
        $data['inbox'] =  $this->Dms_model->dms_list_forward_to();
        $data['view_so'] =  $this->Notice_model->view_so($id);

        $this->load->view('templates/header');
        $this->load->view('notice/view/so', $data);
    }
    
}