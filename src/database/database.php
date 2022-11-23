<?php

include('config.php');
class DatabaseManager{


		//visibility encaptulation
		private $pdo;
	


		

		public function connect(){
			try {


      // $this->pdo = new PDO('mysql:host='.SERVER.';dbname='.DATA, ROOT, '');
// connection path
$dns= 'mysql:host='.SERVER.';dbname='.DATABASE.';charset='.CHARSET.'';

$this->pdo= new PDO($dns,ROOT,'');
 
 //setting error mode
$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

return $this->pdo;





    } catch(PDOException $e) {
      die('Connection Refuse'.$e->getMessage());
    }
		}

		
    public function selectQuery($tableName){
			$fields= 'SELECT * FROM '.$tableName.'';

      $stmt=$this->connect()->prepare($fields);
		  $stmt->execute();
			$request = $this->isRowCount($stmt);
			

			if($request === true){
									while($row=$stmt->fetchAll()){
							
											echo json_encode($row);

							  	}
										
						
						
			}


    }	



		 public function selectSpecificKeyQuery($tableName,$columnKey){

			// get key 
			$keyField = array_keys($columnKey);

			$fieldKey=array();

			for ($i=0; $i < count($keyField) ; $i++) { 
					$fieldKey[] = $columnKey[$keyField[$i]];
			}

				$valueField = implode(',',$fieldKey);

			$fields= "SELECT ".$valueField." FROM ".$tableName."";
      $stmt=$this->connect()->prepare($fields);
		  $stmt->execute();
			$request = $this->isRowCount($stmt);
			

			if($request === true){
								while($row=$stmt->fetchAll()){
							
											echo json_encode($row);

							  }
										
						
						
			}

    }	



			public function selectSpecificQueryById($tableName,$columnKey,$id){

			// get key 
			$keyField = array_keys($columnKey);

			$fieldKey=array();

			for ($i=0; $i < count($keyField) ; $i++) { 
					$fieldKey[] = $columnKey[$keyField[$i]];
			}

				$valueField = implode(',',$fieldKey);

			$fields= "SELECT ".$valueField." FROM ".$tableName." WHERE id=".$id."";
      $stmt=$this->connect()->prepare($fields);
		  $stmt->execute();
			$request = $this->isRowCount($stmt);
			

			if($request === true){
								while($row=$stmt->fetchAll()){
							
											echo json_encode($row);

							  }
										
						
						
			}

    }	


		public function selectSpecificQueryByEmail($tableName,$columnKey,$email){

			// get key 
			$keyField = array_keys($columnKey);

			$fieldKey=array();

			for ($i=0; $i < count($keyField) ; $i++) { 
					$fieldKey[] = $columnKey[$keyField[$i]];
			}

				$valueField = implode(',',$fieldKey);

			$emailValue= "'".$email."'";

			$fields= "SELECT DISTINCT ".$valueField." FROM ".$tableName." WHERE email=".$emailValue."";


      $stmt=$this->connect()->prepare($fields);
		  $stmt->execute();
			
			

		if($stmt->rowCount()>0){

								while($row=$stmt->fetch()){
									
										$data = array('data' => $row,'status' => 202 );
											echo json_encode($data);

							  }
										
						
						
			}
			else{
					$error = array('status' => 400 ,"message" => 'User is not valid' );
					echo json_encode($error);
			}

    }	




		public function selectSpecificQueryByOneUserId($tableName,$columnKey,$id){

			// get key 
			$keyField = array_keys($columnKey);

			$fieldKey=array();

			for ($i=0; $i < count($keyField) ; $i++) { 
					$fieldKey[] = $columnKey[$keyField[$i]];
			}

				$valueField = implode(',',$fieldKey);


			$fields= "SELECT DISTINCT ".$valueField." FROM ".$tableName." WHERE user_id=".$id."";


      $stmt=$this->connect()->prepare($fields);
		  $stmt->execute();
			
			

		if($stmt->rowCount()>0){

								while($row=$stmt->fetch()){
									
									 $valueRes[] = $row;
									

							  }
									$data = array('data' => $valueRes,'status' => 202 );
											echo json_encode($data);
										
						
						
			}
			else{
					$error = array('status' => 400 ,"message" => 'User is not valid' );
					echo json_encode($error);
			}

    }	













		  public function deleteOneQuery($tableName,$id){


			$fields= "DELETE FROM ".$tableName." WHERE id=".$id." ";

      $stmt=$this->connect()->prepare($fields);
		  $stmt->execute();
				$request = $this->isRowCount($stmt);
			

				if($request === true){
						echo json_encode(array('success' => true,'status' => 202 ));
				}
				else{
						echo json_encode(array('success' => false,'status' => 404 ));
				}
				
		

    }	


		public function updateOneQuery($tableName,$columnField,$id){

				$keys = array_keys($columnField);

        $field=array();

				for($i=0; $i < count($keys); ++$i) {
          $field[] = $keys[$i]."="."'".$columnField[$keys[$i]]."'";
				}
 
        $valueField =implode(',',$field);

        // echo  "UPDATE test SET $valueField WHERE id= 1" ;

			  $fields= "UPDATE ".$tableName." SET ".$valueField." WHERE id=".$id."  ";

						$stmt=$this->connect()->prepare($fields);
						$stmt->execute();
							$request = $this->isRowCount($stmt);
						

						if($request === true){
								echo json_encode(array('success' => true,'status' => 202,"message" => "User data updated successfully" ));
						}
						else{
								echo json_encode(array('success' => false,'status' => 404,"message" => "Something went wrong" ));
						}


    }	



	

		
		public function inserOneQuery($tableName,$columnKeyField){

				$keys = array_keys($columnKeyField);

        $field=array();
				$keyField=array();
				for($i=0; $i < count($keys); ++$i) {

          $keyField[] = $keys[$i];
          $field[] = $columnKeyField[$keys[$i]];
				}
 
        $columnValuefield =implode("','", $field);
        $columnKeyField =implode('`,`', $keyField);

        // echo  "UPDATE test SET $valueField WHERE id= 1" ;

			  // $fields= "UPDATE ".$tableName." SET ".$valueField." WHERE id=".$id."  ";
					// $fields ="INSERT INTO  ".$tableName." ".$columnKeyField." VALUES ".$columnValuefield."";

					//  $fields ="INSERT INTO $tableName ($columnKeyField) VALUES ($columnValuefield)";
				 $fields = "INSERT INTO `$tableName` (`" . $columnKeyField . "`) VALUES ('" . $columnValuefield . "')";
      
					//  $fields ="INSERT INTO reservation_facilities (id, facilities_type_id, date_filling, date_return, borrowing, assigned_person, assigned_contact_number, activity_id, activity_name, brief_description, number_participant, target_day_use, scan_file, status_id) VALUES ('NULL', '1', '11/03/21', '11/04/21', 'tes', 'test', '978978', '2', 'test', 'test', 'teste', 'test', 'test', '2')";
						$stmt=$this->connect()->prepare($fields);
						$stmt->execute();
							$request = $this->isRowCount($stmt);
										

						if($request === true){
						
							  echo json_encode(array('success' => true,'status' => 200,"message" => "Transaction created check your email",'email' => $_SESSION['auth_email'],'name' => $_SESSION['auth_name'] ));

						}
						else{
							session_destroy();
								echo json_encode(array('success' => false,'status' => 404,"message" => "Reservation already exist" ));
							
						}


    }	


			public function insertResetQuery($tableName,$columnKeyField){

				$keys = array_keys($columnKeyField);

        $field=array();
				$keyField=array();
				for($i=0; $i < count($keys); ++$i) {

          $keyField[] = $keys[$i];
          $field[] = $columnKeyField[$keys[$i]];
				}
 
        $columnValuefield =implode("','", $field);
        $columnKeyField =implode('`,`', $keyField);

        // echo  "UPDATE test SET $valueField WHERE id= 1" ;

			  // $fields= "UPDATE ".$tableName." SET ".$valueField." WHERE id=".$id."  ";
					// $fields ="INSERT INTO  ".$tableName." ".$columnKeyField." VALUES ".$columnValuefield."";

					//  $fields ="INSERT INTO $tableName ($columnKeyField) VALUES ($columnValuefield)";
				 $fields = "INSERT INTO `$tableName` (`" . $columnKeyField . "`) VALUES ('" . $columnValuefield . "')";
      
					//  $fields ="INSERT INTO reservation_facilities (id, facilities_type_id, date_filling, date_return, borrowing, assigned_person, assigned_contact_number, activity_id, activity_name, brief_description, number_participant, target_day_use, scan_file, status_id) VALUES ('NULL', '1', '11/03/21', '11/04/21', 'tes', 'test', '978978', '2', 'test', 'test', 'teste', 'test', 'test', '2')";
						$stmt=$this->connect()->prepare($fields);
						$stmt->execute();
							$request = $this->isRowCount($stmt);
										

						if($request === true){
						
							  echo json_encode(array('success' => true,'status' => 200,"message" => "User validated"));

						}
						else{
							session_destroy();
								echo json_encode(array('success' => false,'status' => 404,"message" => "User not valid" ));
							
						}


    }	

		// public function insert($table, $data)
    // {
    //    $value_placeholder = array_keys($data);
    //     foreach ($value_placeholder as &$p) {
    //         $p = ':' . $p;
    //     }

    //     // Debug log
    //     $k = array();
    //     $v = array();
    //     foreach ( $data AS $key => $val ) {
    //         $k[] = $key;
    //         $v[] = $val;
    //     }
    //     $query2 = "INSERT INTO `$table` (`" . implode( '`,`', $k ) . "`) VALUES ('" . implode( "','", $v ) . "')";
      

		// 			$stmt=$this->connect()->prepare($query2);
		// 				$stmt->execute();
		// 					$request = $this->isRowCount($stmt);
						

		// 				if($request === true){
		// 					  echo json_encode(array('success' => true,'status' => 202,"message" => "Transaction created check your email" ));

		// 				}
		// 				else{
		// 						echo json_encode(array('success' => false,'status' => 404,"message" => "Reservation already exist" ));
							
		// 				}
      
    // }





		
		public function isRowCount($stmt){
			if($stmt->rowCount()>0){
							return true;
			
			}
			else{
				return false;
			}
	}

}




// $test= new DatabaseManager();
// $test->connect();

// $stmt=$test->connect()->prepare('SELECT * FROM s');

// $stmt->execute();

// while($row=$stmt->fetch()){
// 	echo $row->name . '<br/>';
// }