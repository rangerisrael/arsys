<?php

include('../database-model/customer.php');





   $arrFieldData = ['id','name'];
   

   $getDepartment = new Customer();
   $getDepartment->getRoles($arrFieldData);

    


  
?>