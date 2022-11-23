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
        	$stmt=$this->connect()->prepare('SELECT request.id as id,request.name as name, request.email as email ,d.name as department,request.phone_number as phone_number ,request.gender as gender, r.name as roles,request.date_created FROM users request INNER JOIN department_office d INNER JOIN roles r ON request.role_id = r.id AND request.department_id = d.id');
		    	$stmt->execute();


             		if($stmt->rowCount()>0){
						    	while($row=$stmt->fetchAll()){
                      
                       echo json_encode($row);
                  

								}
								
                // $data =  $arrayName = array('id' => $requestId,'type' => $requestType, 'start' => $requestStartDate,'end' => $requestEndDate , 'status' => $requestStatus );

         
						  }


  }







  }



?>