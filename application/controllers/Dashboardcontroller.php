<?php
    class Dashboardcontroller extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->dniis = $this->load->database('dniis', TRUE);
            $this->load->database();
        }

        public function index(){
            $data['usersessions'] =  $this->Config_model->usersession();
            $data['ann_list'] =  $this->Settings_model->ann_list_dash();
            $data['ann_attach_list'] =  $this->Settings_model->ann_attach_list_dash();
            $data['user_list'] =  $this->Config_model->user_list();

            if(isset($_GET['session_id'])) {
                $usersession =$this->dniis->query("SELECT * FROM core_session a left join core_users b on a.userid = b.id left join systems_clients c on b.id=c.user_id");
                    
                foreach($usersession->result_array() as $uss){
                    if($uss['session_id'] == $_GET['session_id']){
                        $_SESSION['session_id'] = $uss['session_id'];
                        $_SESSION['userid'] = $uss['userid'];
                        $_SESSION['red_userid'] = 1465;
                        // $_SESSION['red_sec'] = 275; //red secretary
                        $_SESSION['red_sec'] = 1520;
                        $_SESSION['fullname'] = $uss['name'];
                        $_SESSION['employee_type'] = $uss['employee_type'];
                    }
                }

                $userid=$_SESSION['userid'];
                $useraccess =$this->db->query("SELECT * FROM conf_user_access where userid = $userid ");
                foreach($useraccess->result_array() as $uas){
                    $_SESSION['dms_settings'] = $uas['dms_settings'];
                    $_SESSION['confidential'] = $uas['confidential'];
                    $_SESSION['all_txn_admin'] = $uas['all_txn_admin'];
                    $_SESSION['announcements'] = $uas['announcements'];
                    $_SESSION['so_date'] = $uas['so_date'];
                }

                if(isset($_SESSION['session_id'])) {

                    $data['inbox'] =  $this->Dms_model->dms_list_forward_to();

                    $this->load->view('templates/header');
                    $this->load->view('templates/navbar', $data);
                    $this->load->view('dashboard', $data);
                    $this->load->view('templates/footer');

                    // user_logs on login
                    date_default_timezone_set('Asia/Manila');
                    $data = array(
                        'user_id' => $userid,
                        'login_time' => date("Y-m-d h:i:s"),
                        'fullname' => $_SESSION['fullname'],
                        'session_id' => $_SESSION['session_id']
                    );
                    $this->db->insert('user_logs', $data);
                    // user_logs on login end

                }else{
                    $this->load->view('maintenance');
                }
                
            }else{
                if(isset($_SESSION['session_id'])) {
                    
                    $data['inbox'] =  $this->Dms_model->dms_list_forward_to();

                    $this->load->view('templates/header');
                    $this->load->view('templates/navbar', $data);
                    $this->load->view('dashboard', $data);
                    $this->load->view('templates/footer');
                }else{
                    $this->load->view('maintenance');
                }
            }
        }

        public function maintenance(){
            $this->load->view('maintenance');
        }
        
        public function notice_list_ajax(){
            $draw = intval($this->input->post("draw"));
            $start = intval($this->input->post("start"));
            $length = intval($this->input->post("length"));
            $json = array();
            $search = $this->input->post('search');
            $search = $search['value'];

            $query =  $this->Settings_model->notice_list_ajax($length, $start, $search);
            $query_all = $this->Settings_model->notice_list_ajax_count();

            if($query_all > 0){
                foreach($query as $rows){

                    // schedule
                    $schedule_date = '';
                    $unixTime = strtotime($rows['schedule']);
                    $newDate = date("F j, Y", $unixTime);
                    $schedule_date = $newDate;
                    
                    // regular access
                    $json[] = array(
                        $schedule_date,
                        $rows['subject'],
                        ($rows['status'] == 1 ? 'Active' : 'Inactive'),
                        '<button type="button" class="viewbtn btn btn-info btn-sm waves-effect waves-light" value="'. $rows['id'] .'" id="viewBtn">View</button>'
                    );
                   
                }
                $total_records = $query_all;
                $response = array(
                    'draw'  => $draw,
                    'recordsTotal' => $total_records,
                    'recordsFiltered' => $total_records,
                    'data' => $json,
                );
                
                echo json_encode($response);
            }else{
                $response = array();
                $response['sEcho'] = 0;
                $response['iTotalRecords'] = 0;
                $response['iTotalDisplayRecords'] = 0;
                $response['aaData'] = [];
                echo json_encode($response);
            }
        }

        public function notice_list_ajax_one($id){
            $data = $this->Settings_model->notice_list_ajax_one($id);

            // get created by info
            $created_by_query = $this->Config_model->user_list_one($data[0]['created_by_id']);
            $created_by_query_to = $created_by_query[0]['name'];

            // get attachment by info
            $notice_attach_one_location='';
            $notice_attach_one_file_name='';

            if($data[0]['type'] == ''){
                $notice_attach_one = $this->Settings_model->notice_list_attach_ajax_one($data[0]['id']);
                $notice_attach_one_location=$notice_attach_one[0]['file_location'];
                $notice_attach_one_file_name=$notice_attach_one[0]['file_name'];
            }

            $data_ajax[0]["created_by_id"] = $created_by_query_to;
            $data_ajax[0]["date_posted"] = $data[0]['date_created'];
            $data_ajax[0]["subject"] = $data[0]['subject'];
            $data_ajax[0]["location"] = $data[0]['location'];
            $data_ajax[0]["schedule"] = $data[0]['schedule'];
            $data_ajax[0]["notice_attach_one_location"] = $notice_attach_one_location;
            $data_ajax[0]["notice_attach_one_file_name"] = $notice_attach_one_file_name;
            $data_ajax[0]["type"] = $data[0]['type'];
            echo json_encode($data_ajax);
        }
        
        public function get_announcement_by_index($index) {
            $announcement = $this->Notice_model->get_announcement_by_index($index);
        
            echo json_encode($announcement);
        }
       
    }
?>