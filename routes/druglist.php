<?php
ini_Set('display_errors',false);
error_reporting(E_COMPILE_ERROR);

header('Content-Type: application/json, charset=UTF-8');
$data = file_get_contents('php://input');

$dataObj = new DrugList($data);
$dataObj->getTable();

class DrugList{
    var $Json;
    var $connection;

    function DrugList($data){
        
        $this->connection = mysqli_connect('localhost','frex','6570','inatnur_schema')
        or die( 'Error Connecting to MySQL server');
        $this->Json = json_decode($data);

        $this->Array = $this->Json->array;
        $this->User = $this->Json->UserID;

        echo $this->User;
       /*  $this->sql = "DELETE * FROM TO_BE_PAID WHERE Sell_Date != CURDATE()";
        mysqli_query($this->connection,$this->sql) or die ("Error Deleting from Table"); */
    }
    function getTable(){
        $this->DataList = [];
        $this->random_id = rand(0,500000);
        $this->total = 0;
        $this->status = "";
    
        for($i = 0 ; $i < count($this->Array);$i = $i + 2){
            if($i % 2 == 0 && $this->Array[$i] != ""){
                $this->drugid = $this->Array[$i];
                
                $this->qnty = $this->Array[$i + 1];
                
                $this->query = "SELECT * FROM DRUGS WHERE Drug_ID = '$this->drugid'";
                $this->query1 = "SELECT Quantity FROM STOCK WHERE Stock_ID = '$this->drugid'";
                $this->result = mysqli_query($this->connection,$this->query) or die("Error Query!!");
                $this->result2 = mysqli_query($this->connection,$this->query1) or die("Error Query1!!");
                $Drugrow = mysqli_fetch_array($this->result);
                $Stockrow = mysqli_fetch_array($this->result2);
                $Quantity = $Stockrow['Quantity'];
                $UnitPrice = $Drugrow['Ind_Price'];
                $this->UnitTotal = $UnitPrice * $this->qnty;
                if($this->qnty > $Quantity){
                    $this->status .= "<p>".$Drugrow['Drug_Name']."</p>";
                    continue;
                }else{
                    $this->status .= "<p>".$Drugrow['Drug_Name']."</p>";
                    $this->query2 = "INSERT INTO TO_BE_PAID (SELL_ID,Drug_ID,Quantity,Total,User_ID,Sell_Date) VALUES ('$this->random_id','$this->drugid','$this->qnty',$this->UnitTotal,'$this->User',CURDATE())";
                    $this->result3 = mysqli_query($this->connection,$this->query2) or die("Error Query2!!");
                    $this->total += $this->UnitTotal;
                }
                
        }
      }
       
         echo $this->status;
    }
}

?>