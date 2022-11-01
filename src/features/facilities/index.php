



<?php include('./header/index.php')?>





<?php 



      if(isset($_GET['type'])){

        $type = $_GET['type'];

		switch ($type) {
			case 'motor':

       include('./motor.php');
					

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

