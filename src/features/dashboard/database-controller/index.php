<?php

include('../database-model/customer.php');




   // $arrFieldData = ['id','name','email','id_number','department_id','phone_number','gender','date_created','role_id'];
   

   $customer = new Customer();
   $customer->getInnerJoinDataOfCustomer();
      


    
  
    
   

?>