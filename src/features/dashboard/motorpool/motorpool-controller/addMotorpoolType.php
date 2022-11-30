
<?php

 include('../motorpool-model/model.php');


$target_dir = "../../../../../public/uploads/motorpooltype/";
$target_file = $target_dir . basename($_FILES["vehicle_photo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));





function validate($data) { // Input fields validator to avoid XSS and SQL Injection
   $data = trim($data); // remove extra white space(s)
   $data = stripslashes($data); // remove forward and back slashes
   $data = htmlspecialchars($data); // remove special characters
   return $data;
}






// Check if image file is a actual image or fake image
if(isset($_FILES['vehicle_photo'])) {


  if(!is_dir($target_dir)){
    mkdir($target_dir);
  }

  $check = getimagesize($_FILES["vehicle_photo"]["tmp_name"]);
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
if ($_FILES["vehicle_photo"]["size"] > 500000) {
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


    //  $err = array('status' => 400, 'message'=> 'Sorry, your file was not uploaded.');

    //    echo json_encode($err);
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["vehicle_photo"]["tmp_name"], $target_file)) {

    //  unlink($target_dir.validate($_POST['oldphoto']));


    $pathRoute =  htmlspecialchars(basename($_FILES["vehicle_photo"]["name"]));
    $request = "File is an image - " . $check["mime"] . ".";


   $vehicle_photoPicture = validate($_FILES["vehicle_photo"]["name"]);
    $name = validate($_POST['name']);
    $fuel = validate($_POST['fuel']);
    $plate_number = validate($_POST['plate_number']);
    $gear = validate($_POST['gear']);
    $capacity = validate($_POST['capacity']);


     	  $arrField = array('name' => $name, 'plate_number' => $plate_number, 'fuel' => $fuel,'gear' => $gear,'capacity' => $capacity,'photo' => $vehicle_photoPicture); 
   
        $reservation_request = new Motorpool();

       $reservation_request->newVehicle($arrField);


    

  } else {

    $error1 = array('status' => 400, 'message'=> 'Sorry, there was an error uploading your file.');

    echo json_encode($error1);

  }
}
?>