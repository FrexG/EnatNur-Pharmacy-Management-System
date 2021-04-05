<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Portal</title>
    <link rel="stylesheet" href="../styles/admin.css"/>
</head>
<body>
<?php include '../includes/header.php'; ?>
    <main>
        <div class="accounts">
            <div class="see-accounts">
                    <h1>Accounts</h1>
                    <?php
                        $connection = mysqli_connect('localhost','root','6570','inatnur_schema')
                        or die( 'Error Connecting to MySQL server');
                        $sql = "SELECT * FROM ACCOUNTS WHERE ROLE_ID != 99";
                        $result = mysqli_query($connection,$sql) or die("Error");
                        $i = 1;
                        $role = "";
                            echo '<table class="report-table">';
                                echo '<tr>';
                                    echo '<th width = "20">No</th>';
                                    echo '<th width = "200">Name</th>';
                                    echo '<th width = "200">Role</th>';
                                    echo '<th width = "100">Password</th>';
                    
                                echo '</tr>';
                            while($row = mysqli_fetch_array($result)){
                                echo '<tr>';
                                    echo '<td>'.$i.'</td>';
                                    echo '<td>'.$row['User_Name'].'</td>';
                                    if($row['ROLE_ID'] == 0){
                                        $role = "Cashier";
                                    }else{
                                        $role = "Sells";
                                    }
                                    echo '<td>'.$role.'</td>';
                                    echo '<td>'.$row['PSWD'].'</td>';
                                    
                                echo '</tr>';
                                $i++;
                            }
                            echo '</table>';
                    ?>
            </div>

           
        </div>
        
    </main>
</body>
</html>