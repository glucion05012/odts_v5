<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settingscontroller extends CI_Controller {

    public function settings(){
        
        $data['action']= $this->Settings_model->get_action();
        $data['category']= $this->Settings_model->get_category();
        $data['sub_category']= $this->Settings_model->get_sub_cat();

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('conf/settings', $data);
        $this->load->view('templates/footer');
    }

    public function add_action(){
        $query = $this->Settings_model->add_action();

        if ($query) {
            $this->session->set_flashdata('message', 'Successfully added!');
            $this->session->set_flashdata('message_type', 'success');
        } else {
            $this->session->set_flashdata('message', 'Please Try Again!');
            $this->session->set_flashdata('message_type', 'error');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function edit_action($id){
        $query = $this->Settings_model->edit_action($id);

        if ($query) {
            $this->session->set_flashdata('message', 'Successfully Updated!');
            $this->session->set_flashdata('message_type', 'success');
        } else {
            $this->session->set_flashdata('message', 'Please Try Again!');
            $this->session->set_flashdata('message_type', 'error');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function add_category(){
        $query = $this->Settings_model->add_category();

        if ($query) {
            $this->session->set_flashdata('message', 'Successfully added!');
            $this->session->set_flashdata('message_type', 'success');
        } else {
            $this->session->set_flashdata('message', 'Please Try Again!');
            $this->session->set_flashdata('message_type', 'error');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function edit_category($id){
        $query = $this->Settings_model->edit_category($id);

        if ($query) {
            $this->session->set_flashdata('message', 'Successfully added!');
            $this->session->set_flashdata('message_type', 'success');
        } else {
            $this->session->set_flashdata('message', 'Please Try Again!');
            $this->session->set_flashdata('message_type', 'error');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function add_sub_cat(){
        $query = $this->Settings_model->add_sub_cat();

        if ($query) {
            $this->session->set_flashdata('message', 'Successfully added!');
            $this->session->set_flashdata('message_type', 'success');
        } else {
            $this->session->set_flashdata('message', 'Please Try Again!');
            $this->session->set_flashdata('message_type', 'error');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function edit_sub_category($id){
        $query = $this->Settings_model->edit_sub_category($id);

        if ($query) {
            $this->session->set_flashdata('message', 'Successfully added!');
            $this->session->set_flashdata('message_type', 'success');
        } else {
            $this->session->set_flashdata('message', 'Please Try Again!');
            $this->session->set_flashdata('message_type', 'error');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
}