<?php

ini_Set('display_errors',false);
error_reporting(E_COMPILE_ERROR);
        $connection = mysqli_connect('localhost','frex','6570','inatnur_schema')
        or die( 'Error Connecting to MySQL server');

        $sql = "SELECT * FROM TO_BE_PAID";
        $query = mysqli_query($connection,$sql);
        $res = mysqli_fetch_array($query);
        $sellID = $res['SELL_ID'];
        $userid =$res['User_ID'];

        mysqli_free_result($query);
        $drugNames = "";
        $total = 0;
        $result = mysqli_query($connection,$sql);
                                     
                   echo '<table border = 0 class="table-data">';
                      echo  '<tr>';
                            echo '<th width="100">Sell ID</th>';
                            echo '<th width="500">Drug Name</th>'; 
                            echo '<th width="100">Total</th>';                    
                            echo '<th width="150">Pharmacist</th>';
                            echo '<th width="150"></th>';
                            echo '<th width="150"></th>';
                        echo '</tr>';
                        while($row = mysqli_fetch_array($result)){
                            $tempSellID = $row['SELL_ID'];
                            $tempuserid = $row['User_ID'];

                            $drugid = $row['Drug_ID'];
                            $Quantity = $row['Quantity'];

                            $sql1 = "SELECT * FROM ACCOUNTS WHERE USER_ID = '$userid'";
                            $result1 = mysqli_query($connection,$sql1);
                            $UserRow = mysqli_fetch_array($result1);
                
                            $sql2 = "SELECT * FROM DRUGS WHERE DRUG_ID = '$drugid'";
                            $result2 = mysqli_query($connection,$sql2);
                            $DrugRow = mysqli_fetch_array($result2);

                            $sql3 = "SELECT * FROM STOCK WHERE Stock_ID = '$drugid'";
                            $result3 = mysqli_query($connection,$sql3) or die("Error Selecting from Stock");
                            $StockRow = mysqli_fetch_array($result3);
                            
                            if($sellID == $tempSellID){
                                $drugNames .= "<p>". $DrugRow['Drug_Name']."/".$DrugRow['Drug_Type'].
                                "/".$DrugRow['Drug_ID']."/ Quantity = ".$Quantity."</p>";
                                $total += $row['Total'];
                                
                                continue;
                            }
                            else{
                                echo '<tr>';
                                    echo '<td>'.$sellID.'</td>';   
                                    echo '<td>'.$drugNames.'</td>';                                
                                    echo '<td>'.$total.' birr</td>';
                                    echo '<td>'.$UserRow ['User_Name'].'</td>';
                                    echo '<td><button class="confirm" id="'.$sellID.'">Confirm</button></td>';
                                    echo '<td><button class="cancel" id="'.$sellID.'">Cancel</button></td>';
          
                            echo '</tr>';
                            $sellID = $tempSellID;
                            $userid = $tempuserid;

                            $sql1 = "SELECT * FROM ACCOUNTS WHERE USER_ID = '$tempuserid'";
                            $result1 = mysqli_query($connection,$sql1);
                            $TempUserRow = mysqli_fetch_array($result1);

                            $total = 0;
                            $total += $row['Total'];
                            $drugNames = "";
                            $drugNames .=  "<p>". $DrugRow['Drug_Name']."/".$DrugRow['Drug_Type']."/".$DrugRow['Drug_ID']."/ Quantity = ".$Quantity."</p>";
                               

                            }
                               
                        }
                            echo '<tr>';
                                echo '<td>'.$tempSellID.'</td>';   
                                echo '<td>'.$drugNames.'</td>';                                
                                echo '<td>'.$total.' birr</td>';
                                $sql1 = "SELECT * FROM ACCOUNTS WHERE USER_ID = '$tempuserid'";
                                $result1 = mysqli_query($connection,$sql1);
                                $TempUserRow = mysqli_fetch_array($result1);
                                echo '<td>'.$TempUserRow ['User_Name'].'</td>';
                                echo '<td><button class="confirm" id="'.$sellID.'">Confirm</button></td>';
                                echo '<td><button class="cancel" id="'.$sellID.'">Cancel</button></td>';
                            echo '</tr>';

                        
                        
                   echo '</table>';
?>        
      