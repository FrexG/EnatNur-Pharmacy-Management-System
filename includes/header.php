<?php

session_start();
if(!isset($_SESSION["id"])){
    $connection = mysqli_connect('localhost','root','6570','inatnur_schema')
    or die( 'Error Connecting to MySQL server');
    $UID = $_SESSION["id"];
    $query = "SELECT ROLE_ID FROM ACCOUNTS WHERE USER_ID = '$UID'";
    $result = mysqli_query($connection,$query);
    $row = mysqli_fetch_array($result);
    if($row['ROLE_ID'] != 99){
        header("Location:../index.php");
        exit();
    }
    
}
?>

    <nav>
        <div class="brand">
            <h1>Enat Nur</h1>
        </div>
        <ul class="nav-links">
            <li> <a href="../adminportal/report.php">Report</a> </li>
            <li> <a href="../adminportal/addItem.php">Add/Update Item</a> </li>
            <li> <a href="../adminportal/manageAccounts.php">Manage Accounts</a> </li>
            <li>
                <form action="../routes/logout.php">
                    <input type="submit" value="Log Out" class="log-out">                
                </form>
             </li>
        <ul>
    </nav>
    