<?php
include('./register.model.php');




function validate($data) { // Input fields validator to avoid XSS and SQL Injection
   $data = trim($data); // remove extra white space(s)
   $data = stripslashes($data); // remove forward and back slashes
   $data = htmlspecialchars($data); // remove special characters
   return $data;
}

$record_data = json_decode(trim(file_get_contents("php://input")));



// apply sanitizing form

$sanitize_name = validate($record_data->name);
$sanitize_email = validate($record_data->email);
$sanitize_idNumber = validate($record_data->idNumber);
$sanitize_office = validate($record_data->office);
$sanitize_phoneNumber = validate($record_data->phoneNumber);
$sanitize_password = password_hash(validate($record_data->password),PASSWORD_DEFAULT);


$newUser = new UserRegisterModel($sanitize_name,$sanitize_email,$sanitize_idNumber ,$sanitize_office ,$sanitize_phoneNumber,'MALE',$sanitize_password,2);
$newUser->registerUser();

    


?>