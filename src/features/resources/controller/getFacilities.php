<?php

include('../model/index.php');





   $arrFieldData = ['id','name','photo','capacity','location'];
   

   $type = new Resources();
   $type->getFaciltiesType($arrFieldData);

    


  
?>