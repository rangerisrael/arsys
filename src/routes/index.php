<?php 
	
$path = isset($_GET['query']);


	if($path){
			switch ($_GET['query']) {
		case 'home':
					echo 'home';
			break;
		case 'about':
					echo 'about';
			break;
		case 'pages':
					echo 'pages';
			break;
		
		default:
			// code...
			echo  '404 not found';
	}
	}

	

	
?>