<?php

include('../database-model/customer.php');



   
function validate($data) { // Input fields validator to avoid XSS and SQL Injection
   $data = trim($data); // remove extra white space(s)
   $data = stripslashes($data); // remove forward and back slashes
   $data = htmlspecialchars($data); // remove special characters
   return $data;
}

$customer_data = json_decode(trim(file_get_contents("php://input")));






   // $arrFieldData = ['name','email','id_number','department_id','phone_number','gender','date_created','role_id'];
   

   $customer = new Customer();
   $customer->getInnerJoinDataOfCustomer();
      


    
  
    
   

?>