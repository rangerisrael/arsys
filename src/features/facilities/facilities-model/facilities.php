<?php
include('../../../database/database.php');

  class Reservation extends DatabaseManager{


    public function getSpecificRoom($field){
      $this->selectSpecificKeyQuery('facilities_type',$field);
    }

    public function getSpecificActivity($field){
      $this->selectSpecificKeyQuery('activities',$field);
    }
    public function getVehicles($field){
      $this->selectSpecificKeyQuery('motorpool_type',$field);
    }

    public function getTravelReasons($field){
      $this->selectSpecificKeyQuery('travel_reason',$field);
    }

    public function newFacility($fields){
      $this->inserOneQuery('reservation_facilities',$fields);
    }

   public function newVehicle($fields){
      $this->inserOneQuery('reservation_motorpool',$fields);
    }

  }



?>