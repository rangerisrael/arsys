<?php
$target_dir = "../../../../public/uploads/motorpool/";
$target_file = $target_dir . basename($_FILES["scan_files"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));




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












    $data = array('status' => 200, 'message' => 'Uploaded success','filename' => $pathRoute, 'type' => $request);

      echo json_encode($data);

  } else {

    $error1 = array('status' => 400, 'message'=> 'Sorry, there was an error uploading your file.');

    echo json_encode($error1);

  }
}
?>