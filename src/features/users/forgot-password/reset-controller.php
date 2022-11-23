
	<?php

    include('./reset.php');


    session_start();

function validate($data) { // Input fields validator to avoid XSS and SQL Injection
   $data = trim($data); // remove extra white space(s)
   $data = stripslashes($data); // remove forward and back slashes
   $data = htmlspecialchars($data); // remove special characters
   return $data;
}

function generateRandomString($length = 12) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


$form = json_decode(trim(file_get_contents("php://input")));


$date = validate($form->date);


$randomToken = generateRandomString();
$token =   password_hash(validate($randomToken),PASSWORD_DEFAULT);
$id =   validate($form->id);




		  //$fields ="INSERT INTO `reservation_facilities` (`id`, `facilities_type_id`, `date_filling`, `date_return`, `borrowing`, `assigned_person`, `assigned_contact_number`, `activity_id`, `activity_name`, `brief_description`, `number_participant`, `target_day_use`, `scan_file`, `status_id`) VALUES (NULL, '1', '11/03/21', '11/04/21', 'tes', 'test', '978978', '2', 'test', 'test', 'teste', 'test', 'test', '2')";
				// $fields ="INSERT INTO reservation_facilities (id, facilities_type_id, date_filling, date_return, borrowing, assigned_person, assigned_contact_number, activity_id, activity_name, brief_description, number_participant, target_day_use, scan_file, status_id) VALUES ('NULL', '1', '11/03/21', '11/04/21', 'tes', 'test', '978978', '2', 'test', 'test', 'teste', 'test', 'test', '2')";

    $columnKeyField = array('id' => 'NULL', 'token' =>$token , 'date' => $date,'user_id' => $id); 
    

       $reservation_request = new ResetPassword();
       $reservation_request->resetPassword($columnKeyField);
    
      





?>