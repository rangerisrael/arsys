
<?php

 include('../facilities-model/facilities.php');



    session_start();

$target_dir = "../../../../public/uploads/motorpool/";
$target_file = $target_dir . basename($_FILES["scan_files"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));





function validate($data) { // Input fields validator to avoid XSS and SQL Injection
   $data = trim($data); // remove extra white space(s)
   $data = stripslashes($data); // remove forward and back slashes
   $data = htmlspecialchars($data); // remove special characters
   return $data;
}






// Check if image file is a actual image or fake image
if(isset($_FILES['scan_files'])) {


  if(!is_dir($target_dir)){
    mkdir($target_dir);
  }

  $check = getimagesize($_FILES["scan_files"]["tmp_name"]);
  if($check !== false) {
        $uploadOk = 1;
  } else {
    $uploadOk = 0;
    $new = array('status' => 400, 'message' => 'File type is not supported..');
      echo json_encode($new);
    
  }
}

// Check if file already exists
if (file_exists($target_file)) {
 $uploadOk = 0;
    $wer = array('status' => 400, 'message' => 'Sorry, file already exists.');

      echo json_encode($wer);


 
}

// Check file size
if ($_FILES["scan_files"]["size"] > 500000) {
  $uploadOk = 0;

    $ter = array('status' => 400, 'message' => 'Sorry, your file is too large.');

       echo json_encode($ter);
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 
    $uploadOk = 0;

    $ert = array('status' => 400, 'message' => 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.');

       echo json_encode($ert);

}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {


     $err = array('status' => 400, 'message'=> 'Sorry, your file was not uploaded.');

       echo json_encode($err);
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["scan_files"]["tmp_name"], $target_file)) {

    $pathRoute =  htmlspecialchars(basename($_FILES["scan_files"]["name"]));
    $request = "File is an image - " . $check["mime"] . ".";

$type = validate($_POST['type_vehicle']);
$filling = validate($_POST['date_filling_vehicle']);
$return = validate($_POST['date_return_vehicle']);
$borrow = validate($_POST['borrowing_vehicle']);
$assign = validate($_POST['assign_person_vehicle']);
$contact = validate($_POST['contact_person_vehicle']);
$travel = validate($_POST['travel_reason']);
$participant = validate($_POST['participant_vehicle']);
$time = validate($_POST['time_lapse']);
$file = validate($_FILES["scan_files"]["name"]);


     $columnKeyField = array('id' => 'NULL',  'transaction_id' =>uniqid('arsys',true), 'reservation_type_id' =>2,'motorpool_type_id' =>$type, 'date_filling' => $filling,'borrowing_office' => $borrow , 'date_return' => $return  , 'assigned_person' =>  $assign ,'assigned_contact_number' => $contact  ,'reason_travel_id' =>$travel ,'number_participant' => $participant , 'target_day_use' =>  $time  ,'scan_file' => $file  ,'status_id' => '2','user_id' =>  $_SESSION['auth_id']); 
    

        $reservation_request = new Reservation();

       $reservation_request->newVehicle($columnKeyField);



    // $data = array('status' => 200, 'message' => 'Uploaded success','filename' => $pathRoute, 'type' => $request);

    //   echo json_encode($data);

  } else {

    $error1 = array('status' => 400, 'message'=> 'Sorry, there was an error uploading your file.');

    echo json_encode($error1);

  }
}
?>