
<?php 
     
      if(isset($_GET['page'])){
            
            if($_GET['page'] === 'auth'){
            
                  include('./users.view.php');
            }
         
      }
      else{
             include('../homepage/index.php');
      }

?>

