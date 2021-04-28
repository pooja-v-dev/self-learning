<?php

include_once 'dbConnection.php';

if ($_POST['dropdownValue']) {
    $selectedVal  = explode('|', $_POST['dropdownValue']);
    // echo "Selected value in php ".$selectedVal[0] + $selectedVal[1];
    // print_r($selectedVal);
    $id = $selectedVal[0];
    $status = $selectedVal[1];

    $sql = "UPDATE `test`.`request` SET requeststatus = $status WHERE idrequest = '$id'";
    $result = $conn->query($sql);

} else {
    die("No selected value");
}
