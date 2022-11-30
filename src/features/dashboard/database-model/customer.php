<?php
include('../../../database/database.php');

  class Customer extends DatabaseManager{

      // public $id;
      // public $fullname;
      // public $email;
      // public $password;
      // public $idNumber;
      // public $departmenOffice;
      // public $phoneNumber;
      // public $gender;
      // public $roles;


		// public function __construct($fullname,$email,$idNumber,$departmenOffice,$phoneNumber,$gender,$password,$roles,){
		// 	$this->fullname=$fullname;
		// 	$this->email=$email;
		// 	$this->idNumber=$idNumber;
		// 	$this->departmenOffice=$departmenOffice;
		// 	$this->phoneNumber=$phoneNumber;
		// 	$this->gender=$gender;
		// 	$this->password=$password;
		// 	$this->roles=$roles;

		// }


    public function getCustomer(){
       $this->selectQuery('users');
        
    }

    public function deleteCustomer($id){
     $this->deleteOneQuery('users',$id);
    }
    
      public function updateCustomer($field,$id){
     $this->updateOneQuery('users',$field,$id);
    }
    
    
    
    public function getSpecificCustomerList($field){
      $this->selectSpecificKeyQuery('users',$field);
    }


    public function getSpecificCustomerById($field,$id){
      $this->selectSpecificQueryById('users',$field,$id);
    }

 public function getInnerJoinDataOfCustomer(){
        	$stmt=$this->connect()->prepare('SELECT DISTINCT s.id as id,s.name as name,s.photo as profile,s.email as email, d.name as department,s.phone_number as phone_number,s.gender as gender,r.name as roles,r.id as role_id,s.date_created FROM department_office d,users s,roles r WHERE s.department_id = d.id AND s.role_id = r.id AND s.department_id != 0 AND (s.department_specify is null or s.department_specify = "NULL") UNION ALL SELECT DISTINCT s.id as id,s.name as name,s.photo as profile,s.email as email, s.department_specify as department,s.phone_number as phone_number,s.gender as gender,r.name as roles,r.id as role_id,s.date_created FROM users s,roles r,department_office d WHERE s.department_id = d.id AND s.role_id =r.id AND s.department_id = 0 AND s.department_specify IS NOT NULL');
		    	$stmt->execute();


             		if($stmt->rowCount()>0){
						    	while($row=$stmt->fetchAll()){
                      
                       echo json_encode($row);
                  

								}
								
                // $data =  $arrayName = array('id' => $requestId,'type' => $requestType, 'start' => $requestStartDate,'end' => $requestEndDate , 'status' => $requestStatus );

         
						  }


  }




















  // public function getInnerJoinDataOfCustomer(){
  //       	$stmt=$this->connect()->prepare('SELECT request.id as id,request.name as name,request.photo as profile, request.email as email ,d.name as department,d.id as department_id,request.phone_number as phone_number ,request.gender as gender, r.name as roles, r.id as role_id,request.date_created FROM users request INNER JOIN department_office d INNER JOIN roles r ON request.role_id = r.id AND request.department_id = d.id');
	// 	    	$stmt->execute();


  //            		if($stmt->rowCount()>0){
	// 					    	while($row=$stmt->fetchAll()){
                      
  //                      echo json_encode($row);
                  

	// 							}
								
  //               // $data =  $arrayName = array('id' => $requestId,'type' => $requestType, 'start' => $requestStartDate,'end' => $requestEndDate , 'status' => $requestStatus );

         
	// 					  }


  // }


    public function getInnerCustomerBySelf($id){
        	$stmt=$this->connect()->prepare('SELECT DISTINCT s.id as id,s.name as name,s.photo as profile,s.email as email, d.name as department,s.phone_number as phone_number,s.gender as gender,r.name as roles,r.id as role_id,s.date_created FROM department_office d,users s,roles r WHERE s.department_id = d.id AND s.role_id = r.id AND s.department_id != 0 AND (s.department_specify is null or s.department_specify = "NULL")   UNION ALL SELECT DISTINCT s.id as id,s.name as name,s.photo as profile,s.email as email, s.department_specify as department,s.phone_number as phone_number,s.gender as gender,r.name as roles,r.id as role_id,s.date_created FROM users s,roles r,department_office d WHERE s.department_id = d.id AND s.role_id =r.id AND s.department_id = 0 AND s.department_specify IS NOT NULL AND s.id = '.$id.'');
		    	$stmt->execute();


             		if($stmt->rowCount()>0){
						    	while($row=$stmt->fetchAll()){
                      
                       echo json_encode($row);
                  

								}
								
                // $data =  $arrayName = array('id' => $requestId,'type' => $requestType, 'start' => $requestStartDate,'end' => $requestEndDate , 'status' => $requestStatus );

         
						  }


  }




  //   public function getInnerCustomerBySelf($id){
  //       	$stmt=$this->connect()->prepare('SELECT request.id as id,request.name as name, request.photo as profile, request.email as email ,d.name as department,d.id as department_id,request.phone_number as phone_number ,request.gender as gender, r.name as roles, r.id as role_id,request.date_created FROM users request INNER JOIN department_office d INNER JOIN roles r ON request.role_id = r.id AND request.department_id = d.id AND request.id = '.$id.' ');
	// 	    	$stmt->execute();


  //            		if($stmt->rowCount()>0){
	// 					    	while($row=$stmt->fetchAll()){
                      
  //                      echo json_encode($row);
                  

	// 							}
								
  //               // $data =  $arrayName = array('id' => $requestId,'type' => $requestType, 'start' => $requestStartDate,'end' => $requestEndDate , 'status' => $requestStatus );

         
	// 					  }


  // }




  


public function getDepartmentList($field){
      $this->selectSpecificKeyQuery('department_office',$field);
}


 public function getDepartmentListWithSpecify(){
        	$stmt=$this->connect()->prepare('SELECT d.name as name FROM department_office d UNION ALL SELECT s.department_specify as name FROM users s WHERE s.department_specify IS NOT NULL');
		    	$stmt->execute();


             		if($stmt->rowCount()>0){
						    	while($row=$stmt->fetchAll()){
                      
                       echo json_encode($row);
                  

								}
								
                // $data =  $arrayName = array('id' => $requestId,'type' => $requestType, 'start' => $requestStartDate,'end' => $requestEndDate , 'status' => $requestStatus );

         
						  }


  }




 public function getUserDepartment($id){
        	$stmt=$this->connect()->prepare('SELECT DISTINCT s.department_id,s.department_specify FROM users s,department_office WHERE s.id ='.$id.'');
		    	$stmt->execute();


             		if($stmt->rowCount()>0){
						    	while($row=$stmt->fetchAll()){
                      
                       echo json_encode($row);
                  

								}
								
                // $data =  $arrayName = array('id' => $requestId,'type' => $requestType, 'start' => $requestStartDate,'end' => $requestEndDate , 'status' => $requestStatus );

         
						  }


  }






public function getRoles($field){
      $this->selectSpecificKeyQuery('roles',$field);
}





  }



?>