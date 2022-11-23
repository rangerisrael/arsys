<?php

include('../../../../database/database.php');


class CalendarTransaction extends DatabaseManager{






  public function getAllTransactionRecord(){
		  session_start();
        	$stmt=$this->connect()->prepare('SELECT DISTINCT q.transaction_id as id,fc.name as title,q.date_filling as startDate,q.date_return as endDate FROM reservation_facilities q ,reservation_type r, users s,reservation_motorpool m,facilities_type fc, reservation_status st WHERE q.reservation_type_id = r.id AND q.user_id = m.user_id AND q.user_id = s.id AND q.facilities_type_id = fc.id AND q.status_id = st.id AND st.id =1 UNION ALL SELECT DISTINCT m.transaction_id as id,tp.name as title,m.date_filling as startDate,m.date_return as endDate FROM reservation_motorpool m, reservation_type r, users s,reservation_facilities q,motorpool_type tp, reservation_status ts WHERE m.reservation_type_id = r.id AND m.user_id = s.id AND m.motorpool_type_id = tp.id AND m.status_id = ts.id AND ts.id = 1');
		    	$stmt->execute();


             		if($stmt->rowCount()>0){
						    	while($row=$stmt->fetchAll()){
                      
                       echo json_encode($row);
                  

								}
								
                // $data =  $arrayName = array('id' => $requestId,'type' => $requestType, 'start' => $requestStartDate,'end' => $requestEndDate , 'status' => $requestStatus );

         
						  }


  }



  public function getTotalCountTransaction(){
		  session_start();
        	$stmt=$this->connect()->prepare('select sum(case when f.date_filling = CURRENT_DATE then 1 else 0 end) new , sum(case when f.status_id = 1 then 1 else 0 end) approve, sum(case when f.status_id= 2 then 1 else 0 end) pending, sum(case when f.status_id= 3 then 1 else 0 end) decline, count(*) total from reservation_facilities f ,reservation_status s WHERE f.status_id =s.id UNION ALL select sum(case when rm.date_filling = CURRENT_DATE then 1 else 0 end) new, sum(case when rm.status_id = 1 then 1 else 0 end) approve, sum(case when rm.status_id= 2 then 1 else 0 end) pending, sum(case when rm.status_id= 3 then 1 else 0 end) decline, count(*) total from reservation_motorpool rm ,reservation_status st WHERE rm.status_id =st.id');
		    	$stmt->execute();


             		if($stmt->rowCount()>0){
						    	while($row=$stmt->fetchAll()){
                      
                       echo json_encode($row);
                  

								}
								
                // $data =  $arrayName = array('id' => $requestId,'type' => $requestType, 'start' => $requestStartDate,'end' => $requestEndDate , 'status' => $requestStatus );

         
						  }


  }










  // public function getTotalCountTransaction(){
	// 	  session_start();
  //       	$stmt=$this->connect()->prepare('select sum(case when f.status_id = 1 then 1 else 0 end) approve, sum(case when f.status_id= 2 then 1 else 0 end) pending, sum(case when f.status_id= 3 then 1 else 0 end) decline, count(*) total from reservation_facilities f ,reservation_status s WHERE f.status_id =s.id UNION ALL select sum(case when rm.status_id = 1 then 1 else 0 end) approve, sum(case when rm.status_id= 2 then 1 else 0 end) pending, sum(case when rm.status_id= 3 then 1 else 0 end) decline, count(*) total from reservation_motorpool rm ,reservation_status st WHERE rm.status_id =st.id');
	// 	    	$stmt->execute();


  //            		if($stmt->rowCount()>0){
	// 					    	while($row=$stmt->fetchAll()){
                      
  //                      echo json_encode($row);
                  

	// 							}
								
  //               // $data =  $arrayName = array('id' => $requestId,'type' => $requestType, 'start' => $requestStartDate,'end' => $requestEndDate , 'status' => $requestStatus );

         
	// 					  }


  // }




}











?>