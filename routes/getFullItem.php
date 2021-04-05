<?php

ini_Set('display_errors',false);
error_reporting(E_COMPILE_ERROR);

header('Content-Type: application/json, charset=UTF-8');
$Jsondata = file_get_contents('php://input'); 
    // Decode the json data
    $data = json_decode($Jsondata);
    $DrugID = $data->DrugID;
$mysqli = new mysqli('localhost','frex','6570','inatnur_schema');

if($DrugID == ""){
    $sql = "SELECT * FROM DRUGS";
}else{
    $sql = "SELECT * FROM DRUGS WHERE Drug_ID = '$DrugID'";
}
$result = $mysqli->query($sql);

$date = new DateTime('now');
//echo $date->format('Y-m-d');
$today = $date->format('Y-m-d');



$table = ' <table class="report-table">
<thead>
    <tr>
    <th width="10"> No </th>
    
    <th width="400"> Drug Name </th>
    <th width="50"> Drug ID </th>
    <th width="20"> UOM </th>
    <th width="20"> Unit Price </th>
    <th width="150"> Quantity(Number) </th>
    <th width="150"> Quantity(Price) </th>
    <th width="100"> Expire Date </th>
    <th width="100"> Status </th>
    </tr>
</thead>

<tbody class="t-body">';
$i = 1;
$TotalPrice = 0;
$TotalQnty = 0;
$class = "";
$stat = "AVAILABLE";
while($row = $result->fetch_array()){
    $expire = $row['ExpireDate'];
    $interval = $date->diff(new DateTime($expire));
    if (intval($interval->format('%a')) >= 365){
        $class = "";
    }elseif(intval($interval->format('%a')) >= 100 && intval($interval->format('%a')) < 365){
        $class = "critical";
    }else{
        $class = "expire";
    }
    
    $drugID = $row['Drug_ID'];
    $table = $table. '<tr class="'.$class.'">
                <td>'.$i.'</td>
                <td>'.$row['Drug_Name'].'</td>
                <td>'.$row['Drug_ID'].'</td>
                <td>'.$row['Unit'].'</td>
                <td>'.$row['Ind_Price'].'</td>';
             $i ++;

             $sql1 = "SELECT * FROM STOCK WHERE Stock_ID = '$drugID'";
             $result2 = $mysqli->query($sql1);
             $stockRow = $result2->fetch_array();
             $TotalQnty += $stockRow['Quantity'];
             


             if($stockRow['Quantity'] < 100){$stat = "LOW";}
             else{$stat="AVAILABLE";}
    $table = $table.'<td>'.$stockRow['Quantity'].'</td>';
    $quantityPrice = $stockRow['Quantity'] * $row['Ind_Price'];
    $TotalPrice += $quantityPrice;
    $table = $table.'<td>'.$quantityPrice.'</td>
                    <td>'.$row['ExpireDate'].'</td>
                    <td>'.$stat.'</td></tr>';
}
$table.='<tr class="th-foot">
        <th width="50"> Total</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>'.number_format($TotalQnty).'</th>
        <th>$ '.number_format($TotalPrice).'</th> 
        <th></th>
        <th></th></tr>
        </tbody>
        </table>';
        echo $table;
    
?>