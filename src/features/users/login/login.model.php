<?php

include('../../../database/database.php');

class UserLoginModel extends DatabaseManager{

  public $emailId;
  public $password;
	public $userSession;



  public function __construct($emailId,$password,$userSession){
    $this->emailId=$emailId;
    $this->password=$password;
		$this->userSession=$userSession;
  }


  public function loginUser(){
    
      		$stmt=$this->connect()->prepare('SELECT s.id as id,s.name as name,s.email as email, s.password as password,r.name as role FROM users s,roles r WHERE s.role_id = r.id AND email=:emailId');
		    	$stmt->execute([':emailId' => $this->emailId] );

 
        

				 		if($stmt->rowCount()>0){
							while($row=$stmt->fetch()){
										$passcode=$row->password;
										$email=$row->email;
										$id=$row->id;
										$fullname=$row->name;
										$role=$row->role;

								}
								$hashing=password_verify($this->password,$passcode);

								if($hashing==$passcode){

									 session_start();  
									
									$_SESSION['auth_id']=$id;
									$_SESSION['auth_email']=$email;
									$_SESSION['auth_name']=$fullname;
									$_SESSION['auth_role']=$role;
							

								
      				  $token = substr(str_shuffle("ASCOT_0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ*.-_"), 0, 50);

					

							
									$success200 = array("id" =>$id, "email" => $email,"status" => 200 ,"success" => true,"message" => "Login successfully.","route" => "home","role" => $role );

							

									if($this->userSession === '1'){
											$cookie_name = "token";
											setcookie($cookie_name, $token, time() + (86400 * 30), "/");

										$this->response($success200);
								
									}
									else{
										$_SESSION['token']=$token;
										
										$this->response($success200);

									
									}


									


								}
								else{
							

									$error400 = array("status" => 400 ,"success" => "false","message"=>'Invalid credentials.');

									header('Content-Type: application/json'); 
									echo json_encode($error400);
		 					
										
								}
						}
						else{


              $stmtByid=$this->connect()->prepare('SELECT s.id as id,s.name as name,s.email as email, s.password as password ,r.name as role FROM users s,roles r WHERE s.role_id = r.id AND id_number=:emailId');
		        	$stmtByid->execute([':emailId' => $this->emailId] );

 
        

				 	 	if($stmtByid->rowCount()>0){
							while($row=$stmtByid->fetch()){
										$passcode=$row->password;
										$email=$row->email;
										$id=$row->id;
										$fullname=$row->name;
										$role=$row->role;
								}
								$hashing=password_verify($this->password,$passcode);

								if($hashing==$passcode){
									// Print 'Welcome';
				  $token = substr(str_shuffle("ASCOT_0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ*.-_"), 0, 50);

							session_destroy();
							 session_start();  
										
								$_SESSION['auth_id']=$id;
									$_SESSION['auth_email']=$email;
									$_SESSION['auth_name']=$fullname;
									$_SESSION['auth_role']=$role;
							
				
				
									$success200 = array("id" =>$id, "email" => $email,"status" => 200 ,"success" => true,"message" => "Login successfully.","route" => "home","role" => $role );


									if($this->userSession === '1'){
											$cookie_name = "token";
											setcookie($cookie_name, $token, time() + (86400 * 30), "/");
										 $this->response($success200);
									}
									else{
										$_SESSION['token']=$token;

										$this->response($success200);


									}

            			
								}
								else{
								
									$error400 = array("status" => 400 ,"success" => false,"message"=>'Invalid credentials.');
									$this->response($error400);
								

								}
						}

            else{
              		$error404 = array("status" => 404 ,"success" => false,"message"=>'Invalid credentials.');

									$this->response($error404);


							
            }




							}

			   return $stmt;

  }


	public function response($responseData){
				header('Content-Type: application/json'); 
				echo json_encode($responseData);
	}



}




?>