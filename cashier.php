<?php

    session_start();
    if(!isset($_SESSION["id"])){
        $connection = mysqli_connect('localhost','frex','6570','inatnur_schema')
        or die( 'Error Connecting to MySQL server');
        $UserName = $_SESSION["id"];
        $query = "SELECT ROLE_ID FROM ACCOUNTS WHERE USER_ID = '$UserName'";
        $result = mysqli_query($connection,$query);
        $row = mysqli_fetch_array($result);
        if($row['ROLE_ID'] != 0){
            header("Location:index.php");
            exit();
        }
        
    }
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">

    <head>
        <title>
            Enat Nur
        </title>
        <link rel="stylesheet" href="./styles/style.css"/>
        <script type="text/javascript" src="./scripts/cashier.js"></script>
   
    </head>

    <body>
        <header class="header-def header-scroll">
            <div>
                <h1>Enat Nur  Pharmacy</h1>
                <h1>እናት ኑር መድሃኒት ቤት</h1>
            </div>

            <div>
                <span id = "user" class="<?php echo $_SESSION['id']; ?>">Hi,
                        <?php
                        $connection = mysqli_connect('localhost', 'frex', '6570', 'inatnur_schema')
                        or die('Error connecting to MySQL server.');
                            $UserName = $_SESSION["id"];
                            $query = "SELECT User_Name FROM ACCOUNTS WHERE USER_ID = '$UserName'";
                            $result = mysqli_query($connection,$query);
                            $row = mysqli_fetch_array($result);
                            echo $row['User_Name'];
                        ?>
                </span>

                <form action="./routes/logout.php">
                    <input type="submit" value="Log Out" class="log-out log-out-hidden">                
                </form>
            </div>
        </header>

        <main>
            
            <div class="form-bar">
            <h3> Cashier Portal </h3>
                <div>
                    <label for="sellID">Sell ID</label>
                        <input type="text" title="Sell ID" class="formField" id="sellID" value=" "/>
                        <button type="submit" class="btn-submit">Submit</button>
                </div>     
                                             
            </div>
            
            <span id="response-span"></span>
            <div class="search-result">
                              

            </div>
        </main>
        
    </body>
</html>