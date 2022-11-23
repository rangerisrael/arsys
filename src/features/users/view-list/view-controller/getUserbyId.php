<?php


session_start();

$data = array('auth_name' => $_SESSION['auth_name'] , 'id' => $_SESSION['auth_id'] );


echo json_encode($data);



?>