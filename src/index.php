


<?php include('./common/header/index.php')?>





<body>
<?php
 include('./common/navbar/index.php');
?>


<?php 



      if(isset($_GET['page'])){

        $page = $_GET['page'];

		switch ($page) {
			case 'home':

       include('./features/homepage/index.php');
					

					break;
					
			case 'about':

				include('./features/about/index.php');

						break;

			    			
			case 'facilities':

			header('Location:./features/facilities/index.php?type=motor');
			

						break;
      			
			case 'contact-us':

				include('./features/contact-us/index.php');

						break;

		
			case 'reservation':
       include('./features/reservation/index.php');
				

					break;
				
			case 'process':
       include('./features/process/index.php');
				

					break;
			case 'resources':

       include('./features/resources/index.php');

			 break;
					
			case 'notfound':

       include('./features/not-found/index.php');


						break;
								
				default:
							// code...
       include('./features/not-found/index.php');

		 }


          
      }
      else{

       include('./features/homepage/index.php');

      }

?>







<?php
  include('./common/footer/index.php');
?>

</body>


</html>

