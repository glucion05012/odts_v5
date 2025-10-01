<?php
    class Inboxcontroller extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->database();
        }

        public function inbox(){
           
            $data['inbox'] =  $this->Dms_model->dms_list_forward_to();

            $this->load->view('templates/header');
            $this->load->view('templates/navbar', $data);
            $this->load->view('dms/inbox');
            $this->load->view('templates/footer');
        }

        public function red_inbox(){
           
            $data['inbox'] =  $this->Dms_model->dms_list_forward_to();

            $this->load->view('templates/header');
            $this->load->view('templates/navbar', $data);
            $this->load->view('dms/red_inbox');
            $this->load->view('templates/footer');
        }

        public function all_transactions(){
            //for count of inbox transactions
            $data['inbox'] =  $this->Dms_model->dms_list_forward_to();

            $this->load->view('templates/header');
            $this->load->view('templates/navbar', $data);
            $this->load->view('dms/all');
            $this->load->view('templates/footer');
        }

        public function dms_list_ajax(){
            $draw = intval($this->input->post("draw"));
            $start = intval($this->input->post("start"));
            $length = intval($this->input->post("length"));
            $json = array();
            $search = $this->input->post('search');
            $search = $search['value'];

            $query =  $this->Dms_model->dms_list_ajax($length, $start, $search);
            $query_all = $this->db->query('select * from dms_dms');

            if($query_all->num_rows() > 0){
                foreach($query as $rows){
                    //for forwarded by column
                    $forwarded_by_query = $this->Config_model->user_list_one($rows['ts_forwarded_by_id']);
                    $forwarded_by_name = $forwarded_by_query[0]['div_name'].'|'.$forwarded_by_query[0]['sec_name'].'|'.$forwarded_by_query[0]['name'];

                    $forwarded_by_name_date = '';
                    $unixTime = strtotime($rows['ts_timestamp_forwarded_date']);
                    $newDate = date("F j, Y h:i a", $unixTime);
                    $forwarded_by_name_date = $newDate;
                    //for forwarded by column end

                    //for forwarded to column
                    $forwarded_to_query = $this->Config_model->user_list_one($rows['ts_forwarded_to_id']);
                    $forwarded_to_name = $forwarded_to_query[0]['div_name'].'|'.$forwarded_to_query[0]['sec_name'].'|'.$forwarded_to_query[0]['name'];

                    $forwarded_to_name_date = '';
                    $unixTime = strtotime($rows['ts_timestamp_forwarded_date']);
                    $newDate = date("F j, Y h:i a", $unixTime);
                    $forwarded_to_name_date = $newDate;
                    //for forwarded to column end


                    //admin access
                    if(isset($_SESSION['dms_settings']) AND $_SESSION['dms_settings'] == 1){
                        $json[] = array(
                            $rows['reference_no'].'<br>'.($rows['document_type'] == 'Confidential' ? '<i style="color:red">[Confidential]</i>' : ''),
                            $rows['main_category'],
                            '<b>['.$rows['sub_category'].']</b><br>'.$rows['subject_name'],
                            '<b>'.$forwarded_by_name.'</b><br>'.$forwarded_by_name_date,
                            '<b>'.$forwarded_to_name.'</b><br>'.$forwarded_to_name_date,
                            '<b>'.($rows['ts_action_id'] == 0 ? 'Filed/Closed' : $rows['ts_action']).'</b><br><i style="color:blue">['.$rows['ts_attachment_type'].']</i><br>'.$rows['ts_remarks'],
                            '<button type="button" class="viewbtn btn btn-info btn-sm waves-effect waves-light" value="'. $rows['id'] .'" id="viewBtn">View</button>'
                        );
                    }else{
                        // regular access
                        if($rows['document_type'] == 'For Compliance'){
                            $json[] = array(
                                $rows['reference_no'],
                                $rows['main_category'],
                                '<b>['.$rows['sub_category'].']</b><br>'.$rows['subject_name'],
                                '<b>'.$forwarded_by_name.'</b><br>'.$forwarded_by_name_date,
                                '<b>'.$forwarded_to_name.'</b><br>'.$forwarded_to_name_date,
                                '<b>'.($rows['ts_action_id'] == 0 ? 'Filed/Closed' : $rows['ts_action']).'</b><br><i style="color:blue">['.$rows['ts_attachment_type'].']</i><br>'.$rows['ts_remarks'],
                                '<button type="button" class="viewbtn btn btn-info btn-sm waves-effect waves-light" value="'. $rows['id'] .'" id="viewBtn">View</button>'
                            );
                        }
                    }
                   
                }
                $total_records = $query_all->num_rows();
                $response = array(
                    'draw'  => $draw,
                    'recordsTotal' => $total_records,
                    'recordsFiltered' => $total_records,
                    'data' => $json ?: []
                );
                
                echo json_encode($response);
            }else{
                $response = array();
                $response['sEcho'] = 0;
                $response['iTotalRecords'] = 0;
                $response['iTotalDisplayRecords'] = 0;
                $response['data'] = [];
                echo json_encode($response);
            }
        }

        public function dms_list_ajax_fetch($id){
            
            $data_ajax = $this->Dms_model->dms_list_one_id($id);

            // get office info
            $office_name = '';
            $office_address = '';
            $office_longitude = '';
            $office_latitude = '';
            foreach($this->Config_model->office_list() as $ol){
                if($ol['office_id'] = $data_ajax[0]['ts_office_id']){
                    $office_name = $ol['abbreviation'];
                    $office_address = $ol['office_address'];
                    $office_longitude = $ol['long'];
                    $office_latitude = $ol['lat'];
                    break;
                }
            }

            // get assigned to info
             $forwarded_to_query = $this->Config_model->user_list_one($data_ajax[0]['ts_forwarded_to_id']);
             $assigned_to = $forwarded_to_query[0]['name'];


            //  action name condition if closed
            if($data_ajax[0]['ts_action_id'] == 0){
                $action_name = 'Filed/Closed';
            }else{
                $action_name = $data_ajax[0]['ts_action'];
            }

            // df url
            $df_url = 'df/'.base64_encode($data_ajax[0]['id']);
            $ar_url = 'ar/'.base64_encode($data_ajax[0]['id']);

            //qr_url
            $enc_id = base64_encode($data_ajax[0]['id']);

            // transaction details data
            $data_ajax[0]["office_name"] = $office_name;
            $data_ajax[0]["office_address"] = $office_address;
            $data_ajax[0]["office_longitude"] = $office_longitude;
            $data_ajax[0]["office_latitude"] = $office_latitude;
            $data_ajax[0]["assigned_to"] = $assigned_to;
            $data_ajax[0]["action_name"] = $action_name;
            $data_ajax[0]["df_url"] = $df_url;
            $data_ajax[0]["ar_url"] = $ar_url;
            $data_ajax[0]["enc_id"] = $enc_id;
            
            // history data
            if($data_ajax[0]['document_type'] == 'Confidential'){
                $history_reference_no = '['.$data_ajax[0]['reference_no'].']<br><i style="color:red">[Confidential]</i>';
            }else{
                $history_reference_no = '['.$data_ajax[0]['reference_no'].']';
            }
            $data_ajax[0]["history_reference_no"] = $history_reference_no;
            
            echo json_encode($data_ajax );
            // echo json_encode($data);
        }

        public function dms_history_list_ajax_all($id){
            $json = array();

            $query =  $this->Dms_model->dms_transaction_list_one_ajax($id);
            foreach($query as $rows){

                //for forwarded by column
                $forwarded_by_query = $this->Config_model->user_list_one($rows['forwarded_by_id']);
                $forwarded_by_name = $forwarded_by_query[0]['div_name'].'|'.$forwarded_by_query[0]['sec_name'].'|'.$forwarded_by_query[0]['name'];

                $forwarded_by_name_date = '';
                $unixTime = strtotime($rows['timestamp_forwarded_date']);
                $newDate = date("F j, Y h:i a", $unixTime);
                $forwarded_by_name_date = $newDate;
                //for forwarded by column end

                //for forwarded to column
                $forwarded_to_query = $this->Config_model->user_list_one($rows['forwarded_to_id']);
                $forwarded_to_name = $forwarded_to_query[0]['div_name'].'|'.$forwarded_to_query[0]['sec_name'].'|'.$forwarded_to_query[0]['name'];

                $forwarded_to_name_date = '';
                $unixTime = strtotime($rows['timestamp_forwarded_date']);
                $newDate = date("F j, Y h:i a", $unixTime);
                $forwarded_to_name_date = $newDate;
                //for forwarded to column end

                //attachment button
                $attachment_btn = '---';
                $attachment_btn1 = '';

                if($rows['sub_category_id'] == 75){
                    // show button if has attachment
                    if(isset($_SESSION['dms_settings']) AND $_SESSION['dms_settings'] == 1){
                        $attachment_link ='';
                        $attach_query =  $this->Dms_model->dms_transaction_attach_one_ajax($rows['id']);
                            foreach($attach_query as $attach_rows){
                                $attachment_link .='<li><a href="'.base_url($attach_rows['file_location']).'" target="_blank">'.$attach_rows['file_name'].'</a></li>';
                            }


                        if($rows['att_cnt'] != ''){
                            $attachment_btn1 = '<button class="btn btn-info btn-sm waves-effect waves-light" type="button" data-toggle="dropdown" aria-expanded="false">View <i class="far fa-caret-square-down"></i></button> 
                                                    <ul class="dropdown-menu" style="max-height: 500px; overflow: auto; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(10px, 23px, 0px);" x-placement="bottom-start">
                                                        '.$attachment_link.'
                                                    </ul>';
                        }
                    }
                    // show button if Notice
                    $attachment_btn = '<a class="viewbtn btn btn-warning btn-sm waves-effect waves-light" target="_blank" href="'.base_url().'notice/so/view/'.$rows['notice_id'].'"><span class="btn-label"> View S.O.</a>';
                }else{
                    // show button if has attachment
                    if(isset($_SESSION['all_txn_admin']) AND $_SESSION['all_txn_admin'] == 1){
                        $attachment_link ='';
                        $attach_query =  $this->Dms_model->dms_transaction_attach_one_ajax($rows['id']);
                            foreach($attach_query as $attach_rows){
                                $attachment_link .='<li><a href="'.base_url($attach_rows['file_location']).'" target="_blank">'.$attach_rows['file_name'].'</a></li>';
                            }


                        if($rows['att_cnt'] != ''){
                            $attachment_btn = '<button class="btn btn-info btn-sm waves-effect waves-light" type="button" data-toggle="dropdown" aria-expanded="false">View <i class="far fa-caret-square-down"></i></button> 
                                                    <ul class="dropdown-menu" style="max-height: 500px; overflow: auto; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(10px, 23px, 0px);" x-placement="bottom-start">
                                                        '.$attachment_link.'
                                                    </ul>';
                        }
                    }
                }
                //attachment button end

                $json[] = array(
                    $rows['id'],
                    $forwarded_to_name_date,
                    $rows['sub_category'],
                    ($rows['action_id'] == 0 ? 'Filed/Closed' : $rows['action']),
                    $rows['remarks'],
                    $forwarded_by_name,
                    $forwarded_to_name,
                    ($rows['action_id'] == 0 ? 'Filed/Closed' : $rows['status']).'<br><i style="color:blue">['.$rows['attachment_type'].']</i>',
                    $attachment_btn.'<br><br>'.$attachment_btn1
                );
            }
            
            $response = array(
                'data' => $json,
            );
            
            echo json_encode($response);
        }

        public function dms_history_list_ajax($id){
            $json = array();

            $query =  $this->Dms_model->dms_transaction_list_one_ajax($id);
            foreach($query as $rows){

                //for forwarded by column
                $forwarded_by_query = $this->Config_model->user_list_one($rows['forwarded_by_id']);
                $forwarded_by_name = $forwarded_by_query[0]['div_name'].'|'.$forwarded_by_query[0]['sec_name'].'|'.$forwarded_by_query[0]['name'];

                $forwarded_by_name_date = '';
                $unixTime = strtotime($rows['timestamp_forwarded_date']);
                $newDate = date("F j, Y h:i a", $unixTime);
                $forwarded_by_name_date = $newDate;
                //for forwarded by column end

                //for forwarded to column
                $forwarded_to_query = $this->Config_model->user_list_one($rows['forwarded_to_id']);
                $forwarded_to_name = $forwarded_to_query[0]['div_name'].'|'.$forwarded_to_query[0]['sec_name'].'|'.$forwarded_to_query[0]['name'];

                $forwarded_to_name_date = '';
                $unixTime = strtotime($rows['timestamp_forwarded_date']);
                $newDate = date("F j, Y h:i a", $unixTime);
                $forwarded_to_name_date = $newDate;
                //for forwarded to column end

                //attachment button
                $attachment_btn = '---';
                $attachment_btn1 = '';

                if($rows['sub_category_id'] == 75){
                    // show button if has attachment
                    $attachment_link ='';
                    $attach_query =  $this->Dms_model->dms_transaction_attach_one_ajax($rows['id']);
                        foreach($attach_query as $attach_rows){
                            $attachment_link .='<li><a href="'.base_url($attach_rows['file_location']).'" target="_blank">'.$attach_rows['file_name'].'</a></li>';
                        }


                    if($rows['att_cnt'] != ''){
                        $attachment_btn1 = '<button class="btn btn-info btn-sm waves-effect waves-light" type="button" data-toggle="dropdown" aria-expanded="false">View <i class="far fa-caret-square-down"></i></button> 
                                                <ul class="dropdown-menu" style="max-height: 500px; overflow: auto; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(10px, 23px, 0px);" x-placement="bottom-start">
                                                    '.$attachment_link.'
                                                </ul>';
                    }
                    // show button if Notice
                    $attachment_btn = '<a class="viewbtn btn btn-warning btn-sm waves-effect waves-light" target="_blank" href="'.base_url().'notice/so/view/'.$rows['notice_id'].'"><span class="btn-label"> View S.O.</a>';
                }else{
                    // show button if has attachment
                    $attachment_link ='';
                    $attach_query =  $this->Dms_model->dms_transaction_attach_one_ajax($rows['id']);
                        foreach($attach_query as $attach_rows){
                            $attachment_link .='<li><a href="'.base_url($attach_rows['file_location']).'" target="_blank">'.$attach_rows['file_name'].'</a></li>';
                        }


                    if($rows['att_cnt'] != ''){
                        $attachment_btn = '<button class="btn btn-info btn-sm waves-effect waves-light" type="button" data-toggle="dropdown" aria-expanded="false">View <i class="far fa-caret-square-down"></i></button> 
                                                <ul class="dropdown-menu" style="max-height: 500px; overflow: auto; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(10px, 23px, 0px);" x-placement="bottom-start">
                                                    '.$attachment_link.'
                                                </ul>';
                    }
                }
                //attachment button end

                $json[] = array(
                    $rows['id'],
                    $forwarded_to_name_date,
                    $rows['sub_category'],
                    ($rows['action_id'] == 0 ? 'Filed/Closed' : $rows['action']),
                    $rows['remarks'],
                    $forwarded_by_name,
                    $forwarded_to_name,
                    ($rows['action_id'] == 0 ? 'Filed/Closed' : $rows['status']).'<br><i style="color:blue">['.$rows['attachment_type'].']</i>',
                    $attachment_btn.'<br><br>'.$attachment_btn1
                );
            }
            
            $response = array(
                'data' => $json,
            );
            
            echo json_encode($response);
        }

        
        public function dms_inbox_list_ajax($userid, $isRedSec){
            $draw = intval($this->input->post("draw"));
            $start = intval($this->input->post("start"));
            $length = intval($this->input->post("length"));
            $json = array();
            $search = $this->input->post('search');
            $search = $search['value'];
            
            if($isRedSec == 'red'){
                //for red secretary
                $query =  $this->Dms_model->dms_list_ajax_inbox_red($userid, $length, $start, $search);
                $query_all = $this->Dms_model->dms_list_ajax_inbox_red_count($userid);
            }else{
                //for regular user
                $query =  $this->Dms_model->dms_list_ajax_inbox($userid, $length, $start, $search);
                $query_all = $this->Dms_model->dms_list_ajax_inbox_count($userid);
            }
         
            if($query_all > 0){
                foreach($query as $rows){
                    //for forwarded by column
                    $forwarded_by_query = $this->Config_model->user_list_one($rows['ts_forwarded_by_id']);
                    $forwarded_by_name = $forwarded_by_query[0]['div_name'].'|'.$forwarded_by_query[0]['sec_name'].'|'.$forwarded_by_query[0]['name'];

                    $forwarded_by_name_date = '';
                    $unixTime = strtotime($rows['ts_timestamp_forwarded_date']);
                    $newDate = date("F j, Y h:i a", $unixTime);
                    $forwarded_by_name_date = $newDate;
                    //for forwarded by column end

                    //for forwarded to column
                    $forwarded_to_query = $this->Config_model->user_list_one($rows['ts_forwarded_to_id']);
                    $forwarded_to_name = $forwarded_to_query[0]['div_name'].'|'.$forwarded_to_query[0]['sec_name'].'|'.$forwarded_to_query[0]['name'];

                    $forwarded_to_name_date = '';
                    $unixTime = strtotime($rows['ts_timestamp_forwarded_date']);
                    $newDate = date("F j, Y h:i a", $unixTime);
                    $forwarded_to_name_date = $newDate;
                    //for forwarded to column end

                    //days pending

                    // $earlier = new DateTime($rows['ts_forwarded_date']);
                    // $later = new DateTime();
                    
                    // $days_pend= $later->diff($earlier)->format("%a");
                    $earlier = new DateTime($rows['ts_forwarded_date']);
                    $later = new DateTime();

                    // Initialize counter for weekdays
                    $days_pend = 0;

                    // Loop through each day between $earlier and $later
                    while ($earlier <= $later) {
                        // Check if the current day is a weekday (Monday to Friday)
                        if ($earlier->format('N') < 6) { // 'N' returns 1 for Monday, 7 for Sunday
                            $days_pend++;
                        }

                        // Move to the next day
                        $earlier->modify('+1 day');
                    }
                    //days pending end

                    //action button
                    if($rows['ts_accepted_date'] == ''){
                        $action_btn = '<button type="button" id ="receiveBtn" data-var1="'.$rows['reference_no'].'" data-var2="'.$rows['ts_transaction_id'].'" data-var3="'.base64_encode($rows['ts_transaction_id']).'" class="receivebtn btn btn-primary btn-sm waves-effect waves-light" >Receive</button>';
                    }else{
                        if($rows['ts_action_id'] != 0){
                            $action_btn = '<a class="viewbtn btn btn-success btn-sm waves-effect waves-light" href="inbox/process/'.base64_encode($rows['ts_transaction_id']).'/'.$isRedSec.'"><span class="btn-label"> Process</a>';
                        }
                    }
                    //action button end

                    // regular access
                    $json[] = array(
                        $days_pend,
                        $rows['reference_no'].'<br>'.($rows['document_type'] == 'Confidential' ? '<i style="color:red">[Confidential]</i>' : ''),
                        $rows['main_category'],
                        '<b>['.$rows['sub_category'].']</b><br>'.$rows['subject_name'],
                        '<b>'.$forwarded_by_name.'</b><br>'.$forwarded_by_name_date,
                        '<b>'.($rows['ts_action_id'] == 0 ? 'Filed/Closed' : $rows['ts_action']).'</b><br><i style="color:blue">['.$rows['ts_attachment_type'].']</i><br>'.$rows['ts_remarks'],
                        '<button type="button" class="viewbtn btn btn-info btn-sm waves-effect waves-light" value="'. $rows['id'] .'" id="viewBtn">View</button>'.
                        $action_btn
                    );
                   
                }
                $total_records = $query_all;
                $response = array(
                    'draw'  => $draw,
                    'recordsTotal' => $total_records,
                    'recordsFiltered' => $total_records,
                    'data' => $json ?: []
                );
                
                echo json_encode($response);
            }else{
                $response = array();
                $response['sEcho'] = 0;
                $response['iTotalRecords'] = 0;
                $response['iTotalDisplayRecords'] = 0;
                $response['data'] = [];
                echo json_encode($response);
            }
        }

        public function dms_closed_list_ajax($userid){
            $draw = intval($this->input->post("draw"));
            $start = intval($this->input->post("start"));
            $length = intval($this->input->post("length"));
            $json = array();
            $search = $this->input->post('search');
            $search = $search['value'];

            $query =  $this->Dms_model->dms_list_ajax_closed($userid, $length, $start, $search);
            $query_all = $this->Dms_model->dms_list_ajax_closed_count($userid);

            if($query_all > 0){
                foreach($query as $rows){
                    //for forwarded by column
                    $forwarded_by_query = $this->Config_model->user_list_one($rows['ts_forwarded_by_id']);
                    $forwarded_by_name = $forwarded_by_query[0]['div_name'].'|'.$forwarded_by_query[0]['sec_name'].'|'.$forwarded_by_query[0]['name'];

                    $forwarded_by_name_date = '';
                    $unixTime = strtotime($rows['ts_timestamp_forwarded_date']);
                    $newDate = date("F j, Y h:i a", $unixTime);
                    $forwarded_by_name_date = $newDate;
                    //for forwarded by column end

                    //for forwarded to column
                    $forwarded_to_query = $this->Config_model->user_list_one($rows['ts_forwarded_to_id']);
                    $forwarded_to_name = $forwarded_to_query[0]['div_name'].'|'.$forwarded_to_query[0]['sec_name'].'|'.$forwarded_to_query[0]['name'];

                    $forwarded_to_name_date = '';
                    $unixTime = strtotime($rows['ts_timestamp_forwarded_date']);
                    $newDate = date("F j, Y h:i a", $unixTime);
                    $forwarded_to_name_date = $newDate;
                    //for forwarded to column end

                    // regular access
                    $json[] = array(
                        $rows['reference_no'].'<br>'.($rows['document_type'] == 'Confidential' ? '<i style="color:red">[Confidential]</i>' : ''),
                        $rows['main_category'],
                        '<b>['.$rows['sub_category'].']</b><br>'.$rows['subject_name'],
                        '<b>'.$forwarded_to_name.'</b><br>'.$forwarded_to_name_date,
                        '<b>'.($rows['ts_action_id'] == 0 ? 'Filed/Closed' : $rows['ts_action']).'</b><br><i style="color:blue">['.$rows['ts_attachment_type'].']</i><br>'.$rows['ts_remarks'],
                        '<button type="button" class="viewbtn btn btn-info btn-sm waves-effect waves-light" value="'. $rows['id'] .'" id="viewBtn">View</button>'.
                        '<button type="button" class="viewbtn btn btn-danger btn-sm waves-effect waves-light" value="'. $rows['id'] .'" id="reopenBtn">Reopen</button>'
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
        
        public function confidential_transactions(){
            $data['category_list'] =  $this->Config_model->category_list();
            $data['sub_category_list'] =  $this->Config_model->sub_category_list();
            $data['action_list'] =  $this->Config_model->action_list();
            
            $data['office_list'] =  $this->Config_model->office_list();
            $data['division_list'] =  $this->Config_model->division_list();
            $data['section_list'] =  $this->Config_model->section_list();
            $data['user_list'] =  $this->Config_model->user_list();

            $data['dms_list_confidential'] =  $this->Dms_model->dms_list_confidential();
            $data['dms_transaction_list'] =  $this->Dms_model->dms_transaction_list();
            $data['dms_attachment_list'] =  $this->Dms_model->dms_attachment_list();

            $data['inbox'] =  $this->Dms_model->dms_list_forward_to();

            $this->load->view('templates/header');
            $this->load->view('templates/navbar', $data);
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

            $data['inbox'] =  $this->Dms_model->dms_list_forward_to();

            $this->load->view('templates/header');
            $this->load->view('templates/navbar', $data);
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
        
        public function process($id, $source = 'regular'){
            $data['category_list'] =  $this->Config_model->category_list();
            $data['sub_category_list'] =  $this->Config_model->sub_category_list();
            $data['action_list'] =  $this->Config_model->action_list();
            
            $data['office_list'] =  $this->Config_model->office_list();
            $data['division_list'] =  $this->Config_model->division_list();
            $data['section_list'] =  $this->Config_model->section_list();
            $data['user_list'] =  $this->Config_model->user_list();
            $data['dms_transaction_list_one'] =  $this->Dms_model->dms_transaction_list_one($id);
            $data['dms_transaction_list'] =  $this->Dms_model->dms_transaction_list();
            $data['dms_attachment_list'] =  $this->Dms_model->dms_attachment_list();
            
            
            $data['notice_list'] =  $this->Notice_model->list();

            $data['inbox'] =  $this->Dms_model->dms_list_forward_to();
            $data['source'] =  $source; // Pass the source to the view

            $this->load->view('templates/header');
            $this->load->view('templates/navbar', $data);
            $this->load->view('dms/process', $data);
            $this->load->view('templates/footer');
        }
        
        public function df($id){
            $decid = base64_decode($id);
            $data['dms_id'] = $decid;
            
            $data['dms_list_one_id'] =  $this->Dms_model->dms_list_one_id($decid);
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
            
            $data['dms_list_one_id'] =  $this->Dms_model->dms_list_one_id($decid);
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
            
            $data['dms_list_one_id'] =  $this->Dms_model->dms_list_one_id($decid);
            $data['dms_transaction_list'] =  $this->Dms_model->dms_transaction_list();
            $data['division_list'] =  $this->Config_model->division_list();
            $data['section_list'] =  $this->Config_model->section_list();
            $data['user_list'] =  $this->Config_model->user_list();
            $data['dms_transaction_list'] =  $this->Dms_model->dms_transaction_list();

            $this->load->view('templates/header');
            $this->load->view('dms/validator', $data);
        }

        public function closed(){
            
            $data['inbox'] =  $this->Dms_model->dms_list_forward_to();

            $this->load->view('templates/header');
            $this->load->view('templates/navbar', $data);
            $this->load->view('dms/closed');
            $this->load->view('templates/footer');
        }
    }

?>