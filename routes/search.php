<?php 
    ini_Set('display_errors',true);
    error_reporting(E_COMPILE_ERROR);
    
    header('Content-Type: application/json, charset=UTF-8');
    $jsonData = file_get_contents('php://input');

    $val = json_decode($jsonData);

    $connection = mysqli_connect('localhost','frex','6570','inatnur_schema')
    or die( 'Error Connecting to MySQL server');

    $drugName = $val->drugName;
    $search = $drugName.'%';

    $sql = "SELECT * FROM DRUGS WHERE Drug_Name LIKE '$search'";
    $result = mysqli_query($connection,$sql);
    $drugs = '';
    while($row = mysqli_fetch_array($result)){
        $stockid = $row['Drug_ID'];
        $sql2 = "SELECT * FROM STOCK WHERE Stock_ID = '$stockid'";

            $result2 = mysqli_query($connection,$sql2);
            $stockrow = mysqli_fetch_array($result2);
        

        $drugs .= '<p> [ '.$row['Drug_Name'].' ] [ ID: <b> '.$row['Drug_ID'].'</b> ] [ Unit Price: <b> '.$row['Ind_Price'].'</b> ] [ Quantity In Stock: <b> '.$stockrow['Quantity'].'</b> ]</p><br>';  
    }
    echo $drugs;

?>