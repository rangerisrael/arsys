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
					exit();
				}
}

	spl_autoload_register('autoload');


			
	

	if(isset($_GET['query'])){
		$path = $_GET['query'];
		switch ($path) {
			case 'home':

					header('Location:src/index.php?page=home');

					break;
					
			case 'about':

					header('Location:src/index.php?page=about');


						break;

			case 'contact-us':

					header('Location:src/index.php?page=contact-us');


					 break;

			case 'reservation':
     	header('Location:src/index.php?page=reservation');
				

					break;

			
			case 'facilities':
     	header('Location:src/index.php?page=facilities');
				

					break;
				
				
				
			case 'process':
						header('Location:src/index.php?page=process');

							break;
			case 'resources':

						header('Location:src/index.php?page=resources');


						break;
								
				default:
							// code...
							header('Location:src/features/not-found/index.php');
								break;
		 }
	}
	else{
			if(empty($_GET['query'])){
					header('Location:src/index.php');
			}

	}
			
			



