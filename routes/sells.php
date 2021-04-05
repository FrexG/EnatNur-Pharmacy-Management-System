<?php
ini_Set('display_errors',false);
error_reporting(E_COMPILE_ERROR);

header('Content-Type: application/json, charset=UTF-8');
$data = file_get_contents('php://input');

$dataObj = new Sells($data);
$dataObj->setSells();

class Sells{
    var $Json;
    var $connection;

    function Sells($data){

        $this->connection = mysqli_connect('localhost','frex','6570','inatnur_schema')
        or die( 'Error Connecting to MySQL server');
        $this->Json = json_decode($data);
        $this->sellVal = $this->Json->sellVal;
        
    }
    function setSells(){
        $this->sql = "SELECT * FROM TO_BE_PAID";
        $this->TBPResult = mysqli_query($this->connection,$this->sql);
        $this->total = 0;
        $this->User = "";
            while($this->TBProw = mysqli_fetch_array($this->TBPResult)){

                if($this->TBProw['SELL_ID'] == $this->sellVal){
                    $this->sellID = $this->TBProw['SELL_ID'];
                    $this->drugID = $this->TBProw['Drug_ID'];
                    $this->qnty = $this->TBProw['Quantity'];
                // Select Quantity from Stock Table
                    $this->query1 = "SELECT Quantity FROM STOCK WHERE Stock_ID = '$this->drugID'";
                    $this->result1 = mysqli_query($this->connection,$this->query1) or die("This ID doesn't exist in the database");
                    $this->Stockrow = mysqli_fetch_array($this->result1); 
                
                    mysqli_free_result($this->result1);
                    $this->updateStock = "UPDATE STOCK SET Quantity = Quantity - '$this->qnty' WHERE Stock_ID = '$this->drugID'";
                    mysqli_query($this->connection,$this->updateStock) or die("Error!!");

                    $this->removeFromTBP = "DELETE FROM TO_BE_PAID WHERE SELL_ID = '$this->sellVal'";
                    $this->removeFromTBPResult = mysqli_query($this->connection,$this->removeFromTBP) or 
                    die("This Sell doesn't Exist on Database");

                    // Insert into Sells table after transaction is complete
                    $this->getPrice = "SELECT * FROM DRUGS WHERE Drug_ID = '$this->drugID'";
                    $this->priceResult = mysqli_query($this->connection,$this->getPrice) or 
                    die("Error Selecting");
                    $this->Ind_Price_Row = mysqli_fetch_array($this->priceResult);
                    $this->Ind_Price = $this->Ind_Price_Row['Ind_Price'];

                    $this->Total = $this->Ind_Price * $this->qnty;
                    $this->total += $this->Total;
                    $this->UID = $this->TBProw['User_ID'];
                    $this->User = $this->UID;
                    $this->insertSells = "INSERT INTO SELLS (SELL_ID,DRUG_ID,QUANTITY,TOTAL_PRICE,USER_ID,SELL_DATE)
                    VALUES ('$this->sellID ','$this->drugID','$this->qnty','$this->Total','$this->UID',CURDATE())";

                    mysqli_query($this->connection,$this->insertSells)
                    or die("Error :");
                }
                else{
                    continue;
                }
                
            }
                if($this->total > 0){
                    $this->insertPaid = "INSERT INTO PAID (SELL_ID,USER_ID,TOTAL_PRICE)
                     VALUES ('$this->sellVal','$this->User','$this->total')";

                    mysqli_query($this->connection,$this->insertPaid)
                     or die("Error : Please Insert a Valid Sell ID");  

                     echo "Done";
                }
                else{
                    echo 'Wrong Sell ID';
                }
                
    }
}

?>