<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settingscontroller extends CI_Controller {

    public function settings(){
        
        $data['action']= $this->Settings_model->get_action();
        $data['category']= $this->Settings_model->get_category();
        $data['sub_category']= $this->Settings_model->get_sub_cat();

        $data['inbox'] =  $this->Dms_model->dms_list_forward_to();

        $this->load->view('templates/header');
        $this->load->view('templates/navbar', $data);
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

    public function announcements(){
        $data['inbox'] =  $this->Dms_model->dms_list_forward_to();

        $data['ann_list'] =  $this->Settings_model->ann_list();
        $data['ann_attach_list'] =  $this->Settings_model->ann_attach_list();

        $data['notice_list'] =  $this->Notice_model->list();
        
        $this->load->view('templates/header');
        $this->load->view('templates/navbar', $data);
        $this->load->view('conf/announcements', $data);
        $this->load->view('templates/footer');
    }

    public function ann_create(){
        $data['ann'] =  $this->Settings_model->ann_create();
        $ann_id = ($data['ann'][0]['id']);
        
        // $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/odts_v5/assets/attachments/announcements/";
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/assets/attachments/announcements/";
        $file_location = "/assets/attachments/announcements/";
                
        $countfiles = count($_FILES['fileToUpload']['name']);
        for($i=0;$i<$countfiles;$i++){
        
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check file size
            if ($_FILES["fileToUpload"]["size"][$i] > 70000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.<br>";
            // if everything is ok, try to upload file
            } else {

                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
                    // --------------------------------------------- PROCESS THE attachment TRANSACTION ---------------------------------------------
                    $file = array(
                        'ann_id' => $ann_id,
                        'file_name' => $_FILES['fileToUpload']['name'][$i],
                        'file_location' => $file_location,
                    );

                    $this->Settings_model->ann_create_attach($file);
                    
                    // --------------------------------------------- PROCESS THE attachment TRANSACTION END ---------------------------------------------
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"][$i])). " has been uploaded.<br>";
                } else {
                    echo " Sorry, there was an error uploading your file.<br>";
                }
            }
        }
        $this->session->set_tempdata('successmsg', 'Announcement successfully created!');
        $url = $_SERVER['HTTP_REFERER'];
        redirect($url);
    }

    public function ann_delete($id){
        $this->Settings_model->ann_delete($id);
        $this->session->set_flashdata('successmsg', 'Announcement successfully archived!');
        $url = $_SERVER['HTTP_REFERER'];
        redirect($url);
    }
}