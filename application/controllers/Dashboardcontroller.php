<?php
    class Dashboardcontroller extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->dniis = $this->load->database('dniis', TRUE);
            $this->load->database();
        }

        public function index(){

            if(isset($_GET['session_id'])) {
                $usersession =$this->dniis->query("SELECT * FROM core_session a left join core_users b on a.userid = b.id left join systems_clients c on b.id=c.user_id");
                    

                foreach($usersession->result_array() as $uss){
                    if($uss['session_id'] == $_GET['session_id']){
                        $_SESSION['session_id'] = $uss['session_id'];
                        $_SESSION['userid'] = $uss['userid'];
                        $_SESSION['fullname'] = $uss['name'];
                        $_SESSION['employee_type'] = $uss['employee_type'];
                    }
                }

                if(isset($_SESSION['session_id'])) {
                    $this->load->view('templates/header');
                    $this->load->view('templates/navbar');
                    $this->load->view('dashboard');
                    $this->load->view('templates/footer');
                }else{
                    $this->load->view('maintenance');
                }
                
            }else{
                if(isset($_SESSION['session_id'])) {
                    $this->load->view('templates/header');
                    $this->load->view('templates/navbar');
                    $this->load->view('dashboard');
                    $this->load->view('templates/footer');
                }else{
                    $this->load->view('maintenance');
                }
            }
        }

    }
?>