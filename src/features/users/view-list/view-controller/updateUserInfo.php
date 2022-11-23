<?php
include('../view-model/getReservation.php');



            
      function validate($data) { // Input fields validator to avoid XSS and SQL Injection
        $data = trim($data); // remove extra white space(s)
        $data = stripslashes($data); // remove forward and back slashes
        $data = htmlspecialchars($data); // remove special characters
        return $data;
      }

      $customer_data = json_decode(trim(file_get_contents("php://input")));



      $sanitize_id = validate($customer_data->id);
      $sanitize_name = validate($customer_data->name);
      $sanitize_email = validate($customer_data->email);
      $sanitize_idNumber = validate($customer_data->idNumber);
      $sanitize_office = validate($customer_data->office);
      $sanitize_phoneNumber = validate($customer_data->phoneNumber);
      $sanitize_role = validate($customer_data->roles);
      $sanitize_gender = validate($customer_data->gender);

    


      $now = date_create()->format('Y-m-d H:i:s');

      

  		  $arrField = array('name' => $sanitize_name, 'email' => $sanitize_email,'id_number' => $sanitize_idNumber,'department_id' => $sanitize_office,'phone_number' => $sanitize_phoneNumber,'gender' => $sanitize_gender,'role_id' =>  $sanitize_role,'date_updated' => $now); 
       // $arrFieldData = ['id','name','email','id_number','department_office','phone_number','gender','date_created'];
    
  
        $customer = new ReservationList();
        $customer->updateUserInfo($arrField,$sanitize_id);
        

  


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