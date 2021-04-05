<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Portal</title>
    <link rel="stylesheet" href="../styles/admin.css"/>
    <script type="text/javascript" src="../scripts/additem.js"></script>
    <style>
    
        hr{
            width:80vw;
            border-style:dashed;
            color:indigo;
        }
        .add-item{
            width:100vw;
            height:80vh;
            display:flex;
            flex-direction:column;
            justify-content:space-around;
            align-items:center;
        }
        .add-item h1{
            font-family:sawasdee;
            letter-spacing:2px;
            font-size:40px;
            font-weight:600;
            color:white;
        }
        .field-container{
            display:flex;
            flex-direction:row;
            justify-content:space-around;
            align-items:center;
            width:80vw;
            height:80vw;
        }
        .addItem, .addNewItem{
            display:flex;
            flex-direction:column;
            justify-content:space-around;
            align-items:center;
        }
        .search-bar{
            
            height:70vh;
            width:40vw;
           
        }
        .search-results{
            max-height: 60vh;
            overflow-x: hidden;
            overflow-y: scroll;
            font-family: monospace;
            font-style: italic;
            color: rgb(40, 0, 104);
            font-size: medium;
        
        }
        .search-results b{
            font-size: larger;
            color:red;
        }
        
        .input-field{
            width:15vw;
            box-shadow:1px 1px gray;
            color:red;
            margin:5px;
        }
        .Btns{
            margin:2px;
            width:5vw;
            font-family:monospace;
            font-size:10px;
            font-weight:bold;
            box-shadow:1px 1px red;
        }
        .Btns:hover{
            width:6vw;
            color:indigo;
            cursor:pointer;
        }
        label{
            font-family:monospace;
            font-weight:bold; 
            color:indigo;           
        }
        h6{
            color:white;
            font-family:monospace;
            font-size:18px;
        }
    </style>
</head>
<body>
<?php include '../includes/header.php'; ?>
    <main>
        <div class="add-item">
            <h1> ADD ITEM/UPDATE PRICE </h1>
            <hr>
            <div class="field-container">
                    <div class="search-bar">
                        <div>
                            <label for="drugName">Drug ID</label>
                            <input type="text" id="drugName" name="drugName" class="search-field"/>
                            <button type="submit" id="Search-Btn" class="Btns">Search</button>
                        </div>

                        <div class="search-results">


                        </div>

                    </div>

                    <div class="addItem">
                        <label for="drugid">Drug ID</label>
                        <input type="text" id="drugid" name="drugid" class="input-field"/>
                        <label for="drugid">Quantity</label>
                        <input type="text" id="qnty" name="qnty" class="input-field"/>
                        <label for="drugprice">Unit Price</label>
                        <input type="number" id="drugprice" name="drugprice" class="input-field"/>
                        <label for="drugid">Expire Date</label>
                        <input type="date" id="expdate" name="expdate" class="input-field"/>
                        <button type="submit" id="itm-Btn" class="Btns">Add Item</button>
                        <button type="submit" id="upd-Btn" class="Btns">Update Price</button>
                    </div>
                <span id="stat-span"></span>
                    <div class="addNewItem">
                        <label for="drugid">Drug Type</label>
                        <input type="text" id="drugtype" name="drugtype" class="input-field"/>
                        <label for="drugid">Drug Name</label>
                        <input type="text" id="drugname" name="drugname" class="input-field"/>
                        <label for="drugprice">Unit of Measurment</label>
                        <input type="text" id="um" name="um" class="input-field"/>
                        <button type="submit" id="new-itm-Btn" class="Btns">Add New Item</button>
                    </div>
            </div>
        </div>
        
    </main>

</body>
</html>
