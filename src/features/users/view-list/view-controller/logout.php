<?php

 session_start(); 
 session_unset(); 
 session_destroy();

 $msg = array('message' => 'User is logout','status' => 200 , 'route' => '/login' );

  echo json_encode($msg);

?>