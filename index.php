<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
     <link rel="stylesheet" href="./styles/index.css"/>   
</head>
<body>
    <header>
        <h1>Enat Nur Pharmacy</h1>
        <img src="./img/enatnur_logo.png" alt="logo"/>

    </header>

    <main>
        <div>
            <h1>Welcome!!</h1>
            <h2>Log In</h2>
        </div>
        <form action="index.php" method="POST" class="form">
                <input type="text" class="form-feild" id="uname" name="uname" placeholder="Username"  required/>
                <input type="password" class="form-feild" id="pswd" name="pswd" placeholder="Password" required/>         
                <button type="submit" class="btn-sbmt">Log In</button>
        </form>

    </main>
    <?php
        session_start();
        ini_Set('display_errors',false);
        error_reporting(E_COMPILE_ERROR);

        $uname = $_POST['uname'];
        $pswd = $_POST['pswd'];

        $connection = mysqli_connect('localhost','frex','6570','inatnur_schema')
        or die( 'Error Connecting to MySQL server');

        $query = "SELECT * FROM ACCOUNTS WHERE PSWD ='$pswd' and User_Name = '$uname'";
        $result = mysqli_query($connection,$query)
        or die("Error Executing Query!!"); 
            while($row = mysqli_fetch_array($result)){
                if($row['ROLE_ID'] == 0){
                    $_SESSION['id'] = $row['USER_ID'];
                    header("Location:cashier.php");
                    exit();
                    break;
                }
                elseif($row['ROLE_ID'] == 1){
                    $_SESSION['id'] = $row['USER_ID'];
                    header("Location:drugSells.php");
                    exit();
                    break;
                }
                else{
                    $_SESSION['id'] = $row['USER_ID'];
                    header("Location:adminportal/report.php");
                    exit();
                    break;
                }
            }
            echo $row['User_Name'];

    ?>

    <footer>
        <h3>Copyright 2020, JMP Technologies </h3>
        <div>
            <h5>Tel:</h5>
            <h6>+251 918919066</h6>
            <h6>+251 913243936</h6>
        </div>
    </footer>
    
</body>
</html>