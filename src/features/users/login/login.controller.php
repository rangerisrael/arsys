<?php
include('./login.model.php');




function validate($data) { // Input fields validator to avoid XSS and SQL Injection
   $data = trim($data); // remove extra white space(s)
   $data = stripslashes($data); // remove forward and back slashes
   $data = htmlspecialchars($data); // remove special characters
   return $data;
}

$record_data = json_decode(trim(file_get_contents("php://input")));

// // do something with $data;

// apply sanitizing form


$sanitize_email = validate($record_data->authUser);
$sanitize_password = validate($record_data->authPassword);
$sanitize_users_session = validate($record_data->rememberMe);




$authenticateUser = new UserLoginModel($sanitize_email,$sanitize_password,$sanitize_users_session);
$authenticateUser->loginUser();

    
    


?>