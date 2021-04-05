<?php
ini_Set('display_errors',false);
error_reporting(E_COMPILE_ERROR);

header('Content-Type: application/json, charset=UTF-8');
$data = file_get_contents('php://input');

$jsonData = json_decode($data);

$sellId = $jsonData->sellVal;

$connection = mysqli_connect('localhost','frex','6570','inatnur_schema')
or die( 'Error Connecting to MySQL server');

$sql = "DELETE FROM TO_BE_PAID WHERE SELL_ID = '$sellId'";
$result = mysqli_query($connection,$sql);
echo "Cancelled!!";

?>
