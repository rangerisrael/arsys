<?php

include('../../../../database/database.php');


class ReservationList extends DatabaseManager{






  public function getTransactionRecord(){
		  session_start();
        	$stmt=$this->connect()->prepare('SELECT DISTINCT s.name as username, q.transaction_id as transaction_number,r.name as type,q.assigned_person as respondent,fc.name as kind_request,q.date_filling as startDate,q.date_return as endDate,st.name as status FROM reservation_facilities q ,reservation_type r, users s,reservation_motorpool m,facilities_type fc, reservation_status st WHERE q.reservation_type_id = r.id AND q.user_id = m.user_id AND q.user_id = s.id AND q.facilities_type_id = fc.id AND q.status_id = st.id AND s.id = '.$_SESSION['auth_id'].' UNION ALL SELECT DISTINCT s.name as username,m.transaction_id as transaction_number, r.name as type,m.assigned_person as respondent,tp.name as kind_request,m.date_filling as startDate,m.date_return as endDate,ts.name as status FROM reservation_motorpool m, reservation_type r, users s,reservation_facilities q,motorpool_type tp, reservation_status ts WHERE m.reservation_type_id = r.id AND m.user_id = s.id AND m.motorpool_type_id = tp.id AND ts.id = m.status_id AND s.id ='.$_SESSION['auth_id'].'');
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