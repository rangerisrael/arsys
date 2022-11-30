<?php

include('../../../../database/database.php');


class TransactionList extends DatabaseManager{






  public function getAllTransactionRecord(){
		  session_start();
        	$stmt=$this->connect()->prepare('SELECT  NULLIF(f.id, "") as id ,NULLIF(s.name, "") as username,NULLIF(s.email, "") as email, NULLIF(f.transaction_id, "") as transaction_number, NULLIF(rv.name, "") as type, NULLIF(f.assigned_person, "") as respondent, NULLIF(ft.name, "") as kind_request, NULLIF(f.date_filling, "") as startDate, NULLIF(f.date_return, "") as endDate, NULLIF(st.name, "") as status,NULLIF(st.id, "") as status_id  FROM reservation_facilities f,users s,reservation_type rv,facilities_type ft,reservation_status st WHERE f.reservation_type_id = rv.id AND f.facilities_type_id = ft.id AND f.status_id =st.id  UNION SELECT NULLIF(f.id, "") as id, NULLIF(s.name, "") as username,NULLIF(s.email, "") as email, NULLIF(f.transaction_id, "") as transaction_number, NULLIF(rv.name, "") as type, NULLIF(f.assigned_person, "") as respondent, NULLIF(ft.name, "") as kind_request, NULLIF(f.date_filling, "") as startDate, NULLIF(f.date_return, "") as endDate, NULLIF(st.name, "") as status,NULLIF(st.id, "") as status_id  FROM reservation_motorpool f,users s,reservation_type rv,motorpool_type ft,reservation_status st WHERE f.reservation_type_id = rv.id AND f.motorpool_type_id	 = ft.id AND f.status_id =st.id');
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