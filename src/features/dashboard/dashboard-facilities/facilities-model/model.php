<?php

include('../../../../database/database.php');


class Facilities extends DatabaseManager{






  public function getAllFacilitiesRecord(){
		  session_start();
        	$stmt=$this->connect()->prepare('SELECT DISTINCT ft.name as name,ft.photo as photo,ft.capacity as capacity ,ft.location as location,f.borrowing as borrow_type , f.assigned_person as respondent,f.assigned_contact_number as respondentNumber,a.name as activityType,f.activity_name as activityName,f.brief_description as description ,f.number_participant as participant,f.target_day_use as time,f.date_filling as startDate, f.date_return as endDate, st.name as status,s.name as inventory_by FROM reservation_facilities f, facilities_type ft, activities a ,reservation_status st,users s WHERE f.reservation_type_id = 1 AND f.facilities_type_id = ft.id AND f.activity_id =a.id and f.user_id =s.id and f.status_id = st.id');
		    	$stmt->execute();


             		if($stmt->rowCount()>0){
						    	while($row=$stmt->fetchAll()){
                      
                       echo json_encode($row);
                  

								}
								
                // $data =  $arrayName = array('id' => $requestId,'type' => $requestType, 'start' => $requestStartDate,'end' => $requestEndDate , 'status' => $requestStatus );

         
						  }


  }


	  public function newRoom($fields){
      $this->inserOneQuery('facilities_type',$fields);
    }




}











?>