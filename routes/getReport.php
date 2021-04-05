<?php
    
    header('Content-Type: application/json, charset=UTF-8');
    $Jsondata = file_get_contents('php://input');
    
    // Decode the json data
    $data = json_decode($Jsondata);

    // Create a Mysql connection , OOP mode

    $mysqli = new mysqli('localhost','frex','6570','inatnur_schema');
    $DrugID = $data->DrugID;
    $UserID = $data->UserID;
    // Check if one or both of the filter options
    // are selected
if(!($data->byDate)){
    if($DrugID != "none" && $UserID != "none"){
    
        // If both are not empty
        $sql = "SELECT * FROM SELLS WHERE DRUG_ID = '$DrugID' AND USER_ID = '$UserID' AND SELL_DATE = CURDATE()";
        $result = $mysqli->query($sql);
        if($result){
            $rowData = array();
            $i = 1;
            $TotalPrice = 0;
            $TotalQnty = 0;
            while($row = $result->fetch_assoc()){
                echo '<tr>';
                        $drugid = $row['DRUG_ID'];
                        $userid = $row['USER_ID'];
                            echo '<td>'.$i.'</td>';
                            $i++;
                            
                            $sql2 = "SELECT * FROM DRUGS WHERE Drug_ID = $drugid";
                            $result2 = $mysqli->query($sql2);
                            $drugrow = $result2->fetch_array();
                            echo '<td>'.$drugrow['Drug_Name'].'</td>';
                            echo '<td>'.$row['DRUG_ID'].'</td>';
                            echo '<td>'.$row['QUANTITY'].'</td>';
                            $TotalQnty += $row['QUANTITY'];
                            echo '<td>'.$row['TOTAL_PRICE'].'</td>';
                            $TotalPrice += $row['TOTAL_PRICE'];
                            echo '<td>'.$row['SELL_DATE'].'</td>';
                            $sql3 = "SELECT * FROM ACCOUNTS WHERE USER_ID = $userid";
                            $result3 = $mysqli->query($sql3);
                            $userrow = $result3->fetch_array();
                            echo '<td>'.$userrow['User_Name'].'</td>';
                        echo '</tr>';
            }
            echo '<tr class="th-foot">';   
                        echo '<th> Total</th>'; 
                        echo '<th></th>'; 
                        echo '<th></th>'; 
                        echo '<th>'.number_format($TotalQnty).'</th>'; 
                        echo '<th> $'.number_format($TotalPrice).'</th>'; 
                        echo '<th></th>'; 
                        echo '<th></th>'; 
                    echo '</tr>'; 
            

        }else{
            printf("Error: %s\n", $mysqli->error);
        }
    }
    elseif($DrugID != "none" && $UserID == "none"){
        $sql = "SELECT * FROM SELLS WHERE DRUG_ID = '$DrugID'";
        $result = $mysqli->query($sql);
        if($result){
            $rowData = array();
            $i = 1;
            $TotalPrice = 0;
            $TotalQnty = 0;
            while($row = $result->fetch_assoc()){
                echo '<tr>';
                        $drugid = $row['DRUG_ID'];
                        $userid = $row['USER_ID'];
                            echo '<td>'.$i.'</td>';
                            $i++;
                           
                            $sql2 = "SELECT * FROM DRUGS WHERE Drug_ID = $drugid";
                            $result2 = $mysqli->query($sql2);
                            $drugrow = $result2->fetch_array();
                            echo '<td>'.$drugrow['Drug_Name'].'</td>';
                            echo '<td>'.$row['DRUG_ID'].'</td>';
                            echo '<td>'.$row['QUANTITY'].'</td>';
                            $TotalQnty += $row['QUANTITY'];
                            echo '<td>'.$row['TOTAL_PRICE'].'</td>';
                            $TotalPrice += $row['TOTAL_PRICE'];
                            echo '<td>'.$row['SELL_DATE'].'</td>';
                            $sql3 = "SELECT * FROM ACCOUNTS WHERE USER_ID = $userid";
                            $result3 = $mysqli->query($sql3);
                            $userrow = $result3->fetch_array();
                            echo '<td>'.$userrow['User_Name'].'</td>';
                        echo '</tr>';
            }
            echo '<tr class="th-foot">';   
                        echo '<th> Total</th>'; 
                        echo '<th></th>'; 
                        echo '<th></th>'; 
                        echo '<th>'.number_format($TotalQnty).'</th>'; 
                        echo '<th> $'.number_format($TotalPrice).'</th>'; 
                        echo '<th></th>'; 
                        echo '<th></th>'; 
                    echo '</tr>'; 
           

        }else{
            printf("Error: %s\n", $mysqli->error);
        }

    }
    elseif($DrugID == "none" && $UserID != "none"){
      
        $sql = "SELECT * FROM SELLS WHERE USER_ID = '$UserID'";
        $result = $mysqli->query($sql);
        if($result){
            $rowData = array();
            $i = 1;
            $TotalPrice = 0;
            $TotalQnty = 0;
            while($row = $result->fetch_array()){
                echo '<tr>';
                        $drugid = $row['DRUG_ID'];
                        $userid = $row['USER_ID'];
                            echo '<td>'.$i.'</td>';
                            $i++;
                            
                            $sql2 = "SELECT * FROM DRUGS WHERE Drug_ID = $drugid";
                            $result2 = $mysqli->query($sql2);
                            $drugrow = $result2->fetch_array();
                            echo '<td>'.$drugrow['Drug_Name'].'</td>';
                            echo '<td>'.$row['DRUG_ID'].'</td>';
                            echo '<td>'.$row['QUANTITY'].'</td>';
                            $TotalQnty += $row['QUANTITY'];
                            echo '<td>'.$row['TOTAL_PRICE'].'</td>';
                            $TotalPrice += $row['TOTAL_PRICE'];
                            echo '<td>'.$row['SELL_DATE'].'</td>';
                            $sql3 = "SELECT * FROM ACCOUNTS WHERE USER_ID = $userid";
                            $result3 = $mysqli->query($sql3);
                            $userrow = $result3->fetch_array();
                            echo '<td>'.$userrow['User_Name'].'</td>';
                        echo '</tr>';
            }
            echo '<tr class="th-foot">';   
                        echo '<th> Total</th>'; 
                        echo '<th></th>'; 
                        echo '<th></th>'; 
                        echo '<th>'.number_format($TotalQnty).'</th>'; 
                        echo '<th> $'.number_format($TotalPrice).'</th>'; 
                        echo '<th></th>'; 
                        echo '<th></th>'; 
                    echo '</tr>'; 

        }else{
            printf("Error: %s\n", $mysqli->error);
        }
    }
}
else{
    
    $startDate = $data->sDate;
    $endDate = $data->eDate;
    $drugID = $data->DrugID;
    $userID = $data->UserID;
    if($drugID != "none"){
        $sql = "SELECT * FROM SELLS WHERE SELL_DATE BETWEEN '$startDate' AND '$endDate' 
        AND DRUG_ID = '$drugID'";
     }
     elseif($userID != "none"){
        $sql = "SELECT * FROM SELLS WHERE SELL_DATE BETWEEN '$startDate' AND '$endDate' 
        AND USER_ID = '$userID'";

     }
     else{
        $sql = "SELECT * FROM SELLS WHERE SELL_DATE BETWEEN '$startDate' AND '$endDate'";
     }
   
    //$sql = "SELECT * FROM SELLS WHERE SELL_DATE ='$startDate'";
        $result = $mysqli->query($sql);
        if($result){
            $rowData = array();
            $i = 1;
            $TotalPrice = 0;
            $TotalQnty = 0;
            while($row = $result->fetch_array()){
                echo '<tr>';
                        $drugid = $row['DRUG_ID'];
                        $userid = $row['USER_ID'];
                            echo '<td>'.$i.'</td>';
                            $i++;
                            
                            $sql2 = "SELECT * FROM DRUGS WHERE Drug_ID = $drugid";
                            $result2 = $mysqli->query($sql2);
                            $drugrow = $result2->fetch_array();
                            echo '<td>'.$drugrow['Drug_Name'].'</td>';
                            echo '<td>'.$row['DRUG_ID'].'</td>';
                            echo '<td>'.$row['QUANTITY'].'</td>';
                            $TotalQnty += $row['QUANTITY'];
                            echo '<td>'.$row['TOTAL_PRICE'].'</td>';
                            $TotalPrice += $row['TOTAL_PRICE'];
                            echo '<td>'.$row['SELL_DATE'].'</td>';
                            $sql3 = "SELECT * FROM ACCOUNTS WHERE USER_ID = $userid";
                            $result3 = $mysqli->query($sql3);
                            $userrow = $result3->fetch_array();
                            echo '<td>'.$userrow['User_Name'].'</td>';
                        echo '</tr>';
            }
            echo '<tr class="th-foot">';   
                        echo '<th> Total</th>'; 
                        echo '<th></th>'; 
                        echo '<th></th>'; 
                        echo '<th>'.number_format($TotalQnty).'</th>'; 
                        echo '<th> $'.number_format($TotalPrice).'</th>'; 
                        echo '<th></th>'; 
                        echo '<th></th>'; 
                    echo '</tr>'; 
        }
}

?>