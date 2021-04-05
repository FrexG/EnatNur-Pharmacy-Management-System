<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Portal</title>
    <link rel="stylesheet" href="../styles/admin.css"/>
    <script type="text/javascript" src="../scripts/admin.js"></script>
</head>
<body>
<?php include '../includes/header.php'; ?>
    <main>
        <div class="table-option">
            <div class="table-filter">
                <h3> Filter Table </h3>
                <hr>
                <label for="search-by-id">Filter by ID</label> 
                <input type="text" id="search-by-id" name="search-by-id"/>
                <label for="search-by-employee">Filter by Employee</label>   
                <select id="search-by-employee" name="search-by-employee">
                    <option value="none" selected>*Select Employee*</option>
                    <?php
                        $connection = mysqli_connect('localhost','frex','6570','inatnur_schema')
                        or die( 'Error Connecting to MySQL server');
                        $sql3 = "SELECT * FROM ACCOUNTS WHERE ROLE_ID = 1";
                        $accountsResult = mysqli_query($connection,$sql3);
                        while($user = mysqli_fetch_array($accountsResult)){
                            echo '<option value="'.$user['USER_ID'].'">';
                            echo $user['User_Name'];
                            echo '</option>';
                        }
                    ?>
                </select>
                <button id="filter-btn">Filter</button>
            </div>
            <div class="report-by-date">
                <h3> Report by date </h3>
                <hr>
                <label >Start Date</label> 
                <input type="date" id="start-date"/>
                <label >End Date</label> 
                <input type="date" id="end-date"/>
                <button id="gen-report">Get Report</button>
            </div>

            <div class="full-item-list">
                <h4 id="getFullItem">*** Full Item List Report</h4>
                <hr>
            </div>
        </div>   

        <div class="report">
        
            <table class="report-table">
                <thead>
                    <tr>
                    <th width="10"> No </th>
                    
                    <th width="400"> Drug Name </th>
                    <th width="50"> Drug ID </th>
                    <th width="150"> Quantity </th>
                    <th width="200"> Total Price </th>
                    <th width="100"> Sell Date </th>
                    <th width="100"> Pharmacist </th>
                    </tr>
                </thead>

                <tbody class="t-body">

                <?php
                    $connection = mysqli_connect('localhost','frex','6570','inatnur_schema')
                    or die( 'Error Connecting to MySQL server');
                    $sql = "SELECT * FROM SELLS WHERE SELL_DATE = CURDATE()";
                    $result = mysqli_query($connection,$sql);
                    $i = 1;
                    $TotalPrice = 0;
                    $TotalQnty = 0;
                    while($row = mysqli_fetch_array($result)){
                        echo '<tr>';
                        $drugid = $row['DRUG_ID'];
                        $userid = $row['USER_ID'];
                        echo '<td>'.$i.'</td>';
                        $i++;
                            
                            $sql2 = "SELECT * FROM DRUGS WHERE Drug_ID = $drugid";
                            $result2 = mysqli_query($connection,$sql2);
                            $drugrow = mysqli_fetch_array($result2);
                            echo '<td>'.$drugrow['Drug_Name'].'</td>';
                            echo '<td>'.$row['DRUG_ID'].'</td>';
                            echo '<td>'.$row['QUANTITY'].'</td>';
                            $TotalQnty += $row['QUANTITY'];

                            echo '<td>'.$row['TOTAL_PRICE'].'</td>';
                            $TotalPrice += $row['TOTAL_PRICE'];

                            echo '<td>'.$row['SELL_DATE'].'</td>';
                            $sql3 = "SELECT * FROM ACCOUNTS WHERE USER_ID = $userid";
                            $result3 = mysqli_query($connection,$sql3);
                            $userrow = mysqli_fetch_array($result3);
                            echo '<td>'.$userrow['User_Name'].'</td>';
                        echo '</tr>';
                    }
                    echo '<tr class="th-foot">';   
                        echo '<th width="50"> Total</th>'; 
                        echo '<th></th>'; 
                        echo '<th></th>'; 
                        echo '<th>'.$TotalQnty.'</th>'; 
                        echo '<th> $'.$TotalPrice.'</th>'; 
                        echo '<th></th>'; 
                        echo '<th></th>'; 
                    echo '</tr>';  
                ?>
            </tbody> 
        </table>
        
        </div>
    </main>
    
</body>
</html>