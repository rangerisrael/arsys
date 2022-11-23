<?php
include('../reservation-model/transaction.reservation.php');



            
      function validate($data) { // Input fields validator to avoid XSS and SQL Injection
        $data = trim($data); // remove extra white space(s)
        $data = stripslashes($data); // remove forward and back slashes
        $data = htmlspecialchars($data); // remove special characters
        return $data;
      }

      $customer_data = json_decode(trim(file_get_contents("php://input")));



      $sanitize_id = validate($customer_data->id);
      $sanitize_approval = validate($customer_data->approval);

      $now = date_create()->format('Y-m-d H:i:s');

      

  		  $arrField = array('status_id' => $sanitize_approval, ); 
       // $arrFieldData = ['id','name','email','id_number','department_office','phone_number','gender','date_created'];
    
  
        $customer = new TransactionList();
        $customer->updateTrasactionFacilities($arrField,$sanitize_id);
        

  


				// $keys = array_keys($arrField);

        // $field=array();

				// for($i=0; $i < count($keys); ++$i) {
        //   $field[] = $keys[$i]."="."'".$arrField[$keys[$i]]."'";
				// }
 
        // $valueField =implode(' , ',$field);

        // echo  "UPDATE test SET $valueField WHERE id= 1" ;


        // $arrFieldData = ['name','email','id_number'];
        
				// $keys = array_keys($arrFieldData);

        // $field=array();

				// for($i=0; $i < count($keys); ++$i) {
        //   $field[] = $arrFieldData[$keys[$i]];
				// }

        // $valueField = implode(',',$field);
 
        // // $valueField =implode(' , ',$field);

        // echo  "SELECT $valueField  FROM users" ;
// ;
?>