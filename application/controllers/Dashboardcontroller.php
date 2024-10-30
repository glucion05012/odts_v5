<?php
    class Dashboardcontroller extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->database();
        }

        public function index(){
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('dashboard');
            $this->load->view('templates/footer');
        }

    }
?>