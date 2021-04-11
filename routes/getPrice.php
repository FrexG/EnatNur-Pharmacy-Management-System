<?php
/* I DEEPLY REGRET WRITING THIS IN CORE PHP */ 
    ini_Set('display_errors',false);
    error_reporting(E_COMPILE_ERROR);
    
    header('Content-Type: application/json, charset=UTF-8');
    $jsonData = file_get_contents('php://input');

    $val = json_decode($jsonData);
    $Array = $val->array;
  
    $connection = mysqli_connect('localhost','frex','6570','inatnur_schema')
    or die( 'Error Connecting to MySQL server');
    
    $total = 0;
    $price = 0;
    $drugs = '';
    for($i = 0 ; $i < count($Array);$i++){
        if($i % 2 == 0 && $Array[$i] != ""){
            $sql = "SELECT * FROM DRUGS WHERE Drug_ID = '$Array[$i]'";
            $result = mysqli_query($connection,$sql);
            $row = mysqli_fetch_array($result);

            $sql2 = "SELECT * FROM STOCK WHERE Stock_ID = '$Array[$i]'";
            $result2 = mysqli_query($connection,$sql2);
            $row2 = mysqli_fetch_array($result2);

            $price = $row['Ind_Price'];
            $qnty = $row2['Quantity'];
            $drugs .= '<p>[ '.$row['Drug_Name'].' ] [ Unit Price:<b> '.$price.'</b> ] [ Quantity:<b> '.$Array[$i + 1].' </b>]  [ Quantity in Stock:<b> '.$qnty.' </b>]</p>';
        }
        else{
            $total += $price * $Array[$i];
        }
        
        
    }
    echo '<p>'.$drugs.'</p>';
    echo '<p>Total Price :<b> '.$total.' </b> Birr</p>';
                       
?>