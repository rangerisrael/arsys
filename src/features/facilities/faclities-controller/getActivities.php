<?php

include('../facilities-model/facilities.php');




   $arrFieldData = ['id','name'];
   

   $reservation_facilities_room = new Reservation();
    $reservation_facilities_room->getSpecificActivity($arrFieldData);


  
?>