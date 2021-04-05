<?php
ini_Set('display_errors',false);
error_reporting(E_COMPILE_ERROR);

header('Content-Type: application/json, charset=UTF-8');
$Jsondata = file_get_contents('php://input');

$dataObj = new PaidItem($Jsondata);
$dataObj->getPaid();

class PaidItem{
    var $Json;
    var $connection;

    function PaidItem($Jsondata){

        $this->connection = mysqli_connect('localhost','frex','6570','inatnur_schema')
        or die( 'Error Connecting to MySQL server');
        $this->data = json_decode($Jsondata);
        
        $this->userid = $this->data->UserID;

     }
    function getPaid(){
        $this->sql = "SELECT * FROM PAID WHERE USER_ID = '$this->userid'";
        $this->result = mysqli_query($this->connection,$this->sql);
    
        echo '<table border = 0 class="paid-table">';
                      echo  '<tr>';
                            echo '<th width="100">Drug List</th>'; 
                            echo '<th width="100">Total</th>'; 
                            echo '<th width="100"></th>';                    
                      echo '</tr>';
        while($this->paidRow = mysqli_fetch_array($this->result)){
            $this->drugName = "";
            $this->sellid = $this->paidRow['SELL_ID'];
            $this->sql2 = "SELECT * FROM SELLS WHERE SELL_ID = '$this->sellid'";
            $this->result2 = mysqli_query($this->connection,$this->sql2);

            while($this->sellRow = mysqli_fetch_array($this->result2)){
                $this->drugid = $this->sellRow['DRUG_ID'];
                $this->sql3 = "SELECT * FROM DRUGS WHERE DRUG_ID = '$this->drugid'";
                $this->result3 = mysqli_query($this->connection,$this->sql3);
                $this->drugRow = mysqli_fetch_array($this->result3);
                $this->drugName .= '[ '. $this->drugRow['Drug_Name'].' ]';

            }
            echo '<tr>';
                echo '<td>'.$this->drugName.'</td>';
                echo '<td id="td-price">'.$this->paidRow['TOTAL_PRICE'].' Birr</td>';
                echo '<td><button class="confirm" id="'.$this->paidRow['SELL_ID'].'">Confirm</button></td>';
            echo '</tr>';

        }
        echo '</table>';
    }
}

?>