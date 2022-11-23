<?php

include('../reservation-model/transaction.reservation.php');

    $arrFieldData = ['id','name'];

    $requestUser = new TransactionList();
    $requestUser->getStatusState($arrFieldData);


?>