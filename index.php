


<?php

//directory separator is \
	define('DS',DIRECTORY_SEPARATOR);
// root is path file 
	define('FILE',dirname(__FILE__));


require_once(FILE. DS . 'src/database/'. DS . 'config.php');


function autoload($className){
				if(file_exists(ROOT . DS . 'public' . DS . $className . '.php')){
					require_once(ROOT . DS . 'public' . DS . $className . '.php');
				}
				elseif(file_exists(ROOT . DS . 'src' . DS . $className . '.php')){
					require_once(ROOT . DS . 'src' . DS . $className . '.php');
				}
				else{
					die('src file is missing');
			
				}
}

	spl_autoload_register('autoload');


			
	

	if(isset($_GET['query'])){
		$path = $_GET['query'];
		switch ($path) {
			case 'home':
				
						header('Location:./src/index.php?page=home');

					//	header('Location:src/index.php?page=home');
					break;
					
			case 'about':

					header('Location:./src/index.php?page=about');


						break;

			case 'contact-us':

					header('Location:./src/index.php?page=contact-us');


					 break;

			case 'reservation':

				session_start();

					 if(isset($_SESSION['token']) || isset($_COOKIE['token'])){
							    	header('Location:src/index.php?page=reservation');
				

						 }
						 else{
							 	if(empty($_SESSION['token']) || isset($_COOKIE['token'])){
							
											header('Location:./src/features/users/index.php?page=auth');

								}

						 }
				
 

					break;

			
			case 'facilities':

						

			 session_start();
						
				
						 if(isset($_SESSION['token']) || isset($_COOKIE['token'])){
							  	header('Location:./src/index.php?page=facilities');
				
						 }
						 else{
							 	if(empty($_SESSION['token']) || isset($_COOKIE['token'])){
							
											header('Location:./src/features/users/index.php?page=auth');

								}

						 }
				
			
					break;


   
		
			case 'auth':

			 session_start();
						
				
						 if(isset($_SESSION['token']) || isset($_COOKIE['token'])){
								header('Location:./src/index.php?page=home');

						 }
						 else{
							 	if(empty($_SESSION['token']) || isset($_COOKIE['token'])){
							
											header('Location:./src/features/users/index.php?page=auth');

								}

						 }
				
			
					break;
				
				
				
			case 'process':
						header('Location:./src/index.php?page=process');

							break;
			case 'resources':


					
			 session_start();
						
				
						 if(isset($_SESSION['token']) || isset($_COOKIE['token'])){
										header('Location:./src/index.php?page=resources');

						 }
						 else{
							 	if(empty($_SESSION['token']) || isset($_COOKIE['token'])){
							
											header('Location:./src/features/users/index.php?page=auth');

								}

						 }
				
	
						break;


			case 'dashboard':

							 session_start();
					
						 if(isset($_SESSION['token']) || isset($_COOKIE['token'])){
															
								header('Location:./src/features/dashboard/index.php');

						 }
						 else{
							 	if(empty($_SESSION['token']) || isset($_COOKIE['token'])){
							
											header('Location:./src/features/users/index.php?page=auth');

								}

						 }

						break;


			case 'dashboard-calendar':

							 session_start();
					
						 if(isset($_SESSION['token']) || isset($_COOKIE['token'])){
															
								header('Location:./src/features/dashboard/calendar/index.php');

						 }
						 else{
							 	if(empty($_SESSION['token']) || isset($_COOKIE['token'])){
							
											header('Location:./src/features/users/index.php?page=auth');

								}

						 }

						break;

	case 'dashboard-vehicles':

							 session_start();
					
						 if(isset($_SESSION['token']) || isset($_COOKIE['token'])){
															
								header('Location:./src/features/dashboard/motorpool/index.php');

						 }
						 else{
							 	if(empty($_SESSION['token']) || isset($_COOKIE['token'])){
							
											header('Location:./src/features/users/index.php?page=auth');

								}

						 }

						break;


				case 'dashboard-facilities':

							 session_start();
					
						 if(isset($_SESSION['token']) || isset($_COOKIE['token'])){
															
								header('Location:./src/features/dashboard/dashboard-facilities/index.php');

						 }
						 else{
							 	if(empty($_SESSION['token']) || isset($_COOKIE['token'])){
							
											header('Location:./src/features/users/index.php?page=auth');

								}

						 }

						break;


			
			case 'dashboard-reservation':

							 session_start();
					
						 if(isset($_SESSION['token']) || isset($_COOKIE['token'])){
															
								header('Location:./src/features/dashboard/reservation/index.php');

						 }
						 else{
							 	if(empty($_SESSION['token']) || isset($_COOKIE['token'])){
							
											header('Location:./src/features/users/index.php?page=auth');

								}

						 }

						break;


			case 'sendForm':

						header('Location:./src/sendForm.php');

			case 'testForm':

						header('Location:./src/features/facilities/sendForm.php');

			case 'view-user':

						header('Location:./src/features/users/view-list/index.php');


						break;
			case 'test':

						header('Location:./src/features/dashboard/database-controller/update-customer.php');


						break;
								
				default:
							// code...
					
								header('Location:./not-found.php');
						
							break;
		 }
	}
	else{
			if(empty($_GET['query'])){
					header('Location:./src/index.php');
			}

	}
			
			
	