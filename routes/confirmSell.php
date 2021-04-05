<?php
    header('Content-Type: application/json, charset=UTF-8');
    $Jsondata = file_get_contents('php://input');

    $data = json_decode($Jsondata);
    $sellid = $data->id;
    $connection = mysqli_connect('localhost','frex','6570','inatnur_schema')
        or die( 'Error Connecting to MySQL server');

    $sql = "DELETE FROM PAID WHERE SELL_ID = '$sellid'";
    mysqli_query($connection,$sql);

?>