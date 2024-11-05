<?php 
  $countfiles = count($_FILES['file']['name']);
  for($i=0;$i<$countfiles;$i++){
    
      $target_file = $_SERVER['DOCUMENT_ROOT'] . "/odts_v5/assets/attachments/dms_temp/" . basename($_FILES["file"]["name"][$i]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


          if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $target_file)) {
              // --------------------------------------------- PROCESS THE attachment TRANSACTION ---------------------------------------------
              echo " OK ra.<br>";
          } else {
              echo " Sorry, there was an error uploading your file.<br>";
          }
  }  
?>