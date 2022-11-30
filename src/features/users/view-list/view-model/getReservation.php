<?php

include('../../../../database/database.php');


class ReservationList extends DatabaseManager{






  public function getTransactionRecord(){
		  session_start();
        	$stmt=$this->connect()->prepare('SELECT NULLIF(s.name, "") as username, NULLIF(f.transaction_id, "") as transaction_number, NULLIF(f.reservation_type_id, "") as type, NULLIF(rv.name, "") as type, NULLIF(f.assigned_person, "") as respondent, NULLIF(ft.name, "") as kind_request, NULLIF(f.date_filling, "") as startDate, NULLIF(f.date_return, "") as endDate, NULLIF(st.name, "") as status FROM reservation_facilities f,users s,reservation_type rv,facilities_type ft,reservation_status st WHERE f.reservation_type_id = rv.id AND f.facilities_type_id = ft.id AND f.status_id =st.id AND s.id = '.$_SESSION['auth_id'].' UNION SELECT NULLIF(s.name, "") as username, NULLIF(f.transaction_id, "") as transaction_number, NULLIF(f.reservation_type_id, "") as type, NULLIF(rv.name, "") as type, NULLIF(f.assigned_person, "") as respondent, NULLIF(ft.name, "") as kind_request, NULLIF(f.date_filling, "") as startDate, NULLIF(f.date_return, "") as endDate, NULLIF(st.name, "") as status  FROM reservation_motorpool f,users s,reservation_type rv,motorpool_type ft,reservation_status st WHERE f.reservation_type_id = rv.id AND f.motorpool_type_id	 = ft.id AND f.status_id =st.id AND s.id ='.$_SESSION['auth_id'].'');
		    	$stmt->execute();


             		if($stmt->rowCount()>0){
						    	while($row=$stmt->fetchAll()){
                      
                       echo json_encode($row);
                  

								}
								
                // $data =  $arrayName = array('id' => $requestId,'type' => $requestType, 'start' => $requestStartDate,'end' => $requestEndDate , 'status' => $requestStatus );

         
						  }


  }


	  public function getUserInfo(){
		  session_start();
        	$stmt=$this->connect()->prepare('SELECT s.id as id, s.name as name,s.email as email,s.photo as photo,s.gender as gender, depart.name as  department,depart.id as department_id,s.phone_number as mobile,s.id_number as idNumber,r.name as role,r.id as role_id FROM users s,department_office depart ,roles r WHERE depart.id = s.department_id AND r.id = s.role_id AND s.id ='.$_SESSION['auth_id'].'');
		    	$stmt->execute();


             		if($stmt->rowCount()>0){
						    	while($row=$stmt->fetchAll()){
                      
                       echo json_encode($row);
                  

								}
								
                // $data =  $arrayName = array('id' => $requestId,'type' => $requestType, 'start' => $requestStartDate,'end' => $requestEndDate , 'status' => $requestStatus );

         
						  }


  }




    public function updateUserInfo($field,$id){
     $this->updateOneQuery('users',$field,$id);
    }
    














  // public function getRservationUser(){
	// 	  session_start();
  //       	$stmt=$this->connect()->prepare('SELECT request.id as reservation_id, ftype.name as facilities ,request.date_filling as startDate,request.date_return as endDate,approval.name as status FROM reservation_facilities request  INNER JOIN facilities_type ftype INNER JOIN reservation_status approval ON request.facilities_type_id = ftype.id AND request.status_id = approval.id  WHERE request.user_id = '.$_SESSION['auth_id'].'');
	// 	    	$stmt->execute();


  //            		if($stmt->rowCount()>0){
	// 					    	while($row=$stmt->fetchAll()){
                      
  //                      echo json_encode($row);
                  

	// 							}
								
  //               // $data =  $arrayName = array('id' => $requestId,'type' => $requestType, 'start' => $requestStartDate,'end' => $requestEndDate , 'status' => $requestStatus );

         
	// 					  }


  // }


}


// public function getRservationUser(){
//          session_start();
//         	$stmt=$this->connect()->prepare("SELECT DISTINCT request.id as reservation_id, ftype.name as facilities ,request.date_filling as startDate,request.date_return as endDate,approval.name as status FROM reservation_facilities request,users s,facilities_type ftype,reservation_status approval WHERE request.user_id = ".$_SESSION['auth_id']." AND request.facilities_type_id = ftype.id AND request.status_id = approval.id");
// 		    	$stmt->execute();


//              		if($stmt->rowCount()>0){
// 						    	while($row=$stmt->fetchAll()){
                      
//                        echo json_encode($row);
                  

// 								}
								
//                 // $data =  $arrayName = array('id' => $requestId,'type' => $requestType, 'start' => $requestStartDate,'end' => $requestEndDate , 'status' => $requestStatus );

         
// 						  }


//   }


// }










?>