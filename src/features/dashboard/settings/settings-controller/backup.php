<?php

include('../settings-model/model.php');


         
      function validate($data) { // Input fields validator to avoid XSS and SQL Injection
        $data = trim($data); // remove extra white space(s)
        $data = stripslashes($data); // remove forward and back slashes
        $data = htmlspecialchars($data); // remove special characters
        return $data;
      }

      $array_table = json_decode(trim(file_get_contents("php://input")));

   

    $requestUser = new Settings();
    $requestUser->backupSQl();


?>