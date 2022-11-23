<?php
include('../../../database/database.php');

  class ResetPassword extends DatabaseManager{

  
   public function resetPassword($fields){
      $this->insertResetQuery('reset_password',$fields);
    }

    public function getUserByEmail($field,$email){
      $this->selectSpecificQueryByEmail('users',$field,$email);
    }


   public function getToken($field,$id){
      $this->selectSpecificQueryByOneUserId('reset_password',$field,$id);
    }


  }



?>