<?php
include('../../../database/database.php');

  class Resources extends DatabaseManager{

  
    public function getFaciltiesType($field){
      $this->selectSpecificKeyQuery('facilities_type',$field);
    }


  public function getMotorpoolType($field){
      $this->selectSpecificKeyQuery('motorpool_type',$field);
  }

  }

?>