<?php

include('../model/index.php');





   $arrFieldData = ['id','name','fuel','gear','photo','capacity'];
   

   $type = new Resources();
   $type->getMotorpoolType($arrFieldData);

    


  
?>