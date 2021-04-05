<?php
ini_Set('display_errors',false);
error_reporting(E_COMPILE_ERROR);

    header('Content-Type: application/json, charset=UTF-8');
    $data = file_get_contents('php://input');

    $jsonData = json_decode($data);

    $connection = mysqli_connect('localhost','frex','6570','inatnur_schema')
    or die( 'Error Connecting to MySQL server');

    if($jsonData->Opt == 0){
        addItem($jsonData);
    }
    elseif($jsonData->Opt == 1){
        addNewItem($jsonData);
    }
    else{
        UpdatePrice($jsonData);
    }
/* ######################################## */
    function addItem($jsonData){
        global $connection;
        $drugID = $jsonData->drugidVal;
        $qnty = $jsonData->qntVal;
        $expdate = $jsonData->expireDate;
        $price = $jsonData->untPriceVal;
            $sql = "UPDATE DRUGS SET Ind_Price = '$price', ExpireDate = '$expdate' WHERE Drug_ID = '$drugID'";
            $sql2 = "UPDATE STOCK SET Quantity = Quantity + '$qnty' WHERE Stock_ID = '$drugID'";
            //Execute query
           if(mysqli_query($connection,$sql)){
               echo '<h6>Update Successful</h6>';
           }else{
            echo '<h6>Error Updating Table</h6>';
           } 

           if(mysqli_query($connection,$sql2)){
                echo '<h6>Update Successful</h6>';
            }else{
                echo '<h6>Error Updating Table</h6>';
            } 
            
    }

    function addNewItem($jsonData){
        global $connection;
        $drugID = $jsonData->drugidVal;
        $qnty = $jsonData->qntVal;
        $expdate = $jsonData->expireDate;
        $price = $jsonData->untPriceVal;

        $drugtype = $jsonData->DrugType;
        $drugname = $jsonData->DrugName;
        $um = $jsonData->um;
            
            $sql = "INSERT INTO DRUGS (Drug_ID,Drug_Type,Drug_Name,Unit,Ind_Price,ExpireDate)
            VALUES ('$drugID','$drugtype','$drugname','$um','$price','$expdate')";

            $sql2 = "INSERT INTO STOCK (Stock_ID,Quantity) VALUES ('$drugID','$qnty')";
            //Execute query
            if(mysqli_query($connection,$sql)){
                echo '<h6>Update Successful</h6>';
            }else{
             echo '<h6>Error Updating Table</h6>';
            } 
 
            if(mysqli_query($connection,$sql2)){
                 echo '<h6>Update Successful</h6>';
             }else{
                 echo '<h6>Error Updating Table</h6>';
             } 
    }

    function UpdatePrice($jsonData){
        global $connection;
        $drugID = $jsonData->drugidVal;
        $price = $jsonData->untPriceVal;
            $sql = "UPDATE DRUGS SET Ind_Price = '$price' WHERE Drug_ID = '$drugID' ";
            if(mysqli_query($connection,$sql)){
                echo '<h6>Update Successful</h6>';
            }else{
             echo '<h6>Error Updating Table</h6>';
            } 

    }

?>