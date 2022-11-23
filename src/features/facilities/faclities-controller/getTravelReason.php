<?php

include('../facilities-model/facilities.php');




   $arrFieldData = ['id','name'];
   

   $reason = new Reservation();
   $reason->getTravelReasons($arrFieldData);
    

  
?>