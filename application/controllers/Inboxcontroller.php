<?php
    class Inboxcontroller extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->database();
        }

        public function inbox(){
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('dms/inbox');
            $this->load->view('templates/footer');
        }

        public function new(){
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('dms/new');
            $this->load->view('templates/footer');
        }

    }
?>