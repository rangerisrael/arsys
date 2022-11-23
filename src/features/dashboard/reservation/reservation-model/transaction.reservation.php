<?php

include('../../../../database/database.php');


class TransactionList extends DatabaseManager{






  public function getAllTransactionRecord(){
		  session_start();
        	$stmt=$this->connect()->prepare('SELECT DISTINCT q.id as id,s.name as username, q.transaction_id as transaction_number,r.name as type,q.assigned_person as respondent,fc.name as kind_request,q.date_filling as startDate,q.date_return as endDate,st.name as status,st.id as status_id FROM reservation_facilities q ,reservation_type r, users s,reservation_motorpool m,facilities_type fc, reservation_status st WHERE q.reservation_type_id = r.id AND q.user_id = m.user_id AND q.user_id = s.id AND q.facilities_type_id = fc.id AND q.status_id = st.id UNION ALL SELECT DISTINCT m.id as id,s.name as name,m.transaction_id as transaction_number, r.name as type ,m.assigned_person as respondent,tp.name as kind_request,m.date_filling as startDate,m.date_return as endDate,ts.name as status,ts.id as status_id FROM reservation_motorpool m, reservation_type r, users s,reservation_facilities q,motorpool_type tp, reservation_status ts WHERE m.reservation_type_id = r.id AND m.user_id = s.id AND m.motorpool_type_id = tp.id AND ts.id = m.status_id');
		    	$stmt->execute();


             		if($stmt->rowCount()>0){
						    	while($row=$stmt->fetchAll()){
                      
                       echo json_encode($row);
                  

								}
								
                // $data =  $arrayName = array('id' => $requestId,'type' => $requestType, 'start' => $requestStartDate,'end' => $requestEndDate , 'status' => $requestStatus );

         
						  }


  }


    public function getStatusState($field){
		 $this->selectSpecificKeyQuery('reservation_status',$field);
    }


		  public function updateTrasactionFacilities($field,$id){
    		 $this->updateOneQuery('reservation_facilities',$field,$id);
    	}
    
    
			public function updateTrasactionMotorPool($field,$id){
    		 $this->updateOneQuery('reservation_motorpool',$field,$id);
    	}
    


}











?>