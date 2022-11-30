<?php
include('../../../database/database.php');


class UserRegisterModel extends DatabaseManager{


      public $fullname;
      public $email;
      public $password;
      public $idNumber;
      public $departmenOffice;
      public $phoneNumber;
      public $gender;
      public $roles;

			public $specify_office;

			


		public function __construct($fullname,$email,$idNumber,$departmenOffice,$specify_office,$phoneNumber,$gender,$password,$roles,){
			$this->fullname=$fullname;
			$this->email=$email;
			$this->idNumber=$idNumber;
			$this->departmenOffice=$departmenOffice;
			$this->specify_office=$specify_office;
			$this->phoneNumber=$phoneNumber;
			$this->gender=$gender;
			$this->password=$password;
			$this->roles=$roles;

		}





      public function registerUser(){
        	$stmts=$this->connect()->prepare('SELECT * FROM users WHERE name=:fname OR  email=:email ');
				$stmts->execute([':fname' => $this->fullname,':email' => $this->email] );

				 		if($stmts->rowCount() > 0){
							
					$success200 = array("status" => 409 ,"success" => false,"message" => "User already signup.","route" => "login" );

							
					$this->response($success200);
						}
						else{
							$stmts=$this->connect()->prepare('INSERT INTO users(name,email,photo,id_number,department_id,department_specify,phone_number,gender,password,role_id,date_created) VALUES(:fullname,:email,NULL,:id_number,:office,:specify,:phone,:sex,:pass,:roles,NOW())');
			 			$stmts->execute([
			 				':fullname'=>$this->fullname,
			 				':email'=>$this->email,
							':id_number'=>$this->idNumber,
			 				':office'=>$this->departmenOffice,
							':specify'=>$this->specify_office,
			      	':phone'=>$this->phoneNumber,
			 				':sex'=>$this->gender,
              ':pass'=>$this->password,
			 				':roles'=>$this->roles
			 				]);


					$success200 = array("status" => 200 ,"success" => true,"message" => "User created successfully.","route" => "login" );

							
					$this->response($success200);

        }
    }


		public function response($responseData){
				header('Content-Type: application/json'); 
				echo json_encode($responseData);
  	}

     
}


?>