<?php
include('../../../database/database.php');

  class Department extends DatabaseManager{



    public function getDepartmentList($field){
      $this->selectSpecificKeyQuery('department_office',$field);
    }


  }



?>