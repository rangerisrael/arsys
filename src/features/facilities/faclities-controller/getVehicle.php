<?php

include('../facilities-model/facilities.php');




   $arrFieldData = ['id','name'];
   

   $vehicles = new Reservation();
   $vehicles->getVehicles($arrFieldData);
    

  
?>