<?php

include('./department.model.php');





   $arrFieldData = ['id','name'];
   

   $getDepartment = new Department();
   $getDepartment->getDepartmentList($arrFieldData);
    

  
?>