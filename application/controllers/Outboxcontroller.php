<?php
    class Outboxcontroller extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->database();
        }

        public function outbox(){
            
            $data['inbox'] =  $this->Dms_model->dms_list_forward_to();

            $this->load->view('templates/header');
            $this->load->view('templates/navbar', $data);
            $this->load->view('dms/outbox');
            $this->load->view('templates/footer');
        }

        public function dms_outbox_list_ajax($userid){
            $draw = intval($this->input->post("draw"));
            $start = intval($this->input->post("start"));
            $length = intval($this->input->post("length"));
            $json = array();
            $search = $this->input->post('search');
            $search = $search['value'];

            $query =  $this->Dms_model->dms_list_ajax_outbox($userid, $length, $start, $search);
            $query_all = $this->Dms_model->dms_list_ajax_outbox_count($userid);

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
                        '<button type="button" class="viewbtn btn btn-info btn-sm waves-effect waves-light" value="'. $rows['id'] .'" id="viewBtn">View</button>'
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
        
        

    }
?>