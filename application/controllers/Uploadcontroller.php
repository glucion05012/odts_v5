<?php
    class Uploadcontroller extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->database();
        }

        public function index(){
            $countfiles = count($_FILES['file']['name']);
            for($i=0;$i<$countfiles;$i++){
                
                
                $dms_id_query = $this->db->query('select a.id as txn_id, b.reference_no from dms_transaction a left join dms_dms b on a.dms_id=b.id ORDER BY a.id DESC LIMIT 1');
                foreach($dms_id_query->result() as $diq){
                    $dms_reference_no = $diq->reference_no;
                    $dms_transaction_id = $diq->txn_id;
                }
                
                //$ref_dir = mkdir($_SERVER['DOCUMENT_ROOT'] . "/odts_v5/assets/attachments/dms/".$dms_reference_no.'/'.$dms_transaction_id, 0777, true);
                
                //$target_file = $_SERVER['DOCUMENT_ROOT'] . "/odts_v5/assets/attachments/dms/" . $dms_reference_no .'/'.$dms_transaction_id.'/'.basename($_FILES["file"]["name"][$i]);
                //$file_location = "/assets/attachments/dms/" . $dms_reference_no.'/'.$dms_transaction_id .'/'.basename($_FILES["file"]["name"][$i]);

                 $ref_dir = mkdir($_SERVER['DOCUMENT_ROOT'] . "/assets/attachments/dms/".$dms_reference_no.'/'.$dms_transaction_id, 0777, true);

                 $target_file = $_SERVER['DOCUMENT_ROOT'] . "/assets/attachments/dms/" . $dms_reference_no .'/'.$dms_transaction_id.'/'.basename($_FILES["file"]["name"][$i]);
                 $file_location = "/assets/attachments/dms/" . $dms_reference_no .'/'.$dms_transaction_id.'/'.basename($_FILES["file"]["name"][$i]);
                
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


                    if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $target_file)) {
                        //   --------------------------------------------- PROCESS THE attachment TRANSACTION ---------------------------------------------
                            $file = array(
                                'file_name' => $_FILES['file']['name'][$i],
                                'file_location' => $file_location,
                                'type' => 'dms',
                            );

                            $this->Dms_model->create_transaction_attachment($file);
                    } else {
                        echo " Sorry, there was an error uploading your file.<br>";
                    }
            }
        }  
           
    }
?>