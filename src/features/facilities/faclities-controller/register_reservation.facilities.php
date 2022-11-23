
	<?php

    include('../facilities-model/facilities.php');


    session_start();

function validate($data) { // Input fields validator to avoid XSS and SQL Injection
   $data = trim($data); // remove extra white space(s)
   $data = stripslashes($data); // remove forward and back slashes
   $data = htmlspecialchars($data); // remove special characters
   return $data;
}


$form = json_decode(trim(file_get_contents("php://input")));


   $facilities_id = validate($form->type_facilities);
   $date_filling_facilities= validate($form->date_filling);
   $date_return_facilities = validate($form->date_return);
   $borrowing_facilities = validate($form->borrowing);
   $assign_person = validate($form->assign_person);
   $contact_person = validate($form->contact_person);
   $activity = validate($form->activity);
   $name_activity = validate($form->name_activity);
   $description = validate($form->description);
   $participant = validate($form->participant);
   $day_use = validate($form->day_use);


		  //$fields ="INSERT INTO `reservation_facilities` (`id`, `facilities_type_id`, `date_filling`, `date_return`, `borrowing`, `assigned_person`, `assigned_contact_number`, `activity_id`, `activity_name`, `brief_description`, `number_participant`, `target_day_use`, `scan_file`, `status_id`) VALUES (NULL, '1', '11/03/21', '11/04/21', 'tes', 'test', '978978', '2', 'test', 'test', 'teste', 'test', 'test', '2')";
				// $fields ="INSERT INTO reservation_facilities (id, facilities_type_id, date_filling, date_return, borrowing, assigned_person, assigned_contact_number, activity_id, activity_name, brief_description, number_participant, target_day_use, scan_file, status_id) VALUES ('NULL', '1', '11/03/21', '11/04/21', 'tes', 'test', '978978', '2', 'test', 'test', 'teste', 'test', 'test', '2')";

    $columnKeyField = array('id' => 'NULL','transaction_id' =>uniqid('arsys', true),'reservation_type_id' =>1, 'facilities_type_id' =>$facilities_id, 'date_filling' => $date_filling_facilities,'date_return' => $date_return_facilities, 'borrowing' => $borrowing_facilities , 'assigned_person' =>  $assign_person,'assigned_contact_number' => $contact_person ,'activity_id' =>$activity,'activity_name' => $name_activity, 'brief_description' =>  $description ,'number_participant' => $participant ,'target_day_use' => $day_use,'scan_file' => 'null','status_id' => '2','user_id' => $_SESSION['auth_id']); 
    

       $reservation_request = new Reservation();
       $reservation_request->newFacility($columnKeyField);
    
      


?>