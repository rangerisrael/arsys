<?php

include('../../../../database/database.php');


class Motorpool extends DatabaseManager{






  public function getAllMotorpoolRecords(){
		  session_start();
        	$stmt=$this->connect()->prepare('SELECT DISTINCT mt.name as name,mt.photo as photo,mt.plate_number as plateNumber ,mt.fuel as fuel ,mt.gear as gear,mt.capacity as capacity,mr.borrowing_office as borrow_type , mr.assigned_person as respondent,mr.assigned_contact_number as respondentNumber,tr.name as reason,mr.number_participant as participant,mr.target_day_use as time,mr.scan_file as request_photo,mr.date_filling as startDate, mr.date_return as endDate, st.name as status,s.name as inventory_by FROM reservation_motorpool mr, motorpool_type mt,travel_reason tr,reservation_status st,users s WHERE mr.reservation_type_id = 2 AND mr.motorpool_type_id = mt.id AND mr.reason_travel_id =tr.id and mr.user_id =s.id and mr.status_id = st.id');
		    	$stmt->execute();


             		if($stmt->rowCount()>0){
						    	while($row=$stmt->fetchAll()){
                      
                       echo json_encode($row);
                  

								}
								
                // $data =  $arrayName = array('id' => $requestId,'type' => $requestType, 'start' => $requestStartDate,'end' => $requestEndDate , 'status' => $requestStatus );

         
						  }


  }

     public function newVehicle($fields){
      $this->inserOneQuery('motorpool_type',$fields);
    }


    // public function getStatusState($field){
		//  $this->selectSpecificKeyQuery('reservation_status',$field);
    // }


		//   public function updateTrasactionFacilities($field,$id){
    // 		 $this->updateOneQuery('reservation_facilities',$field,$id);
    // 	}
    
    
		// 	public function updateTrasactionMotorPool($field,$id){
    // 		 $this->updateOneQuery('reservation_motorpool',$field,$id);
    // 	}
    


}











?>