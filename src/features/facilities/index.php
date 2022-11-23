






<?php 



      if(isset($_GET['type'])){

        $type = $_GET['type'];

		switch ($type) {
			case 'reservation':

                   include('./header/index.php');

                  include('./reservation.php');
            
                  


					break;

								
				default:
							// code...
						echo  '404 not found';
		 }


          
      }
      else{

       include('../homepage/index.php');

      }

?>





</body>


</html>

