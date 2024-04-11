<?php 
$conn = mysqli_connect("localhost","root","","coffee_project");
        if(isset($_POST["add"]))
        {
           $itname=$_POST["itemname"];
           $itprice=$_POST["itemprice"];
           
       
           $str = "insert into item(Itemname,Price) values('$itname','$itprice')";
          $res = mysqli_query($conn, $str);
        if($res == true)
           {
             ?>
             <script>          alert('Record has been saved');
        
              </script>
             <?php
           }
           else
        
           {
             ?>
             <script>
                      alert('Error in Query');
                </script>
                <?php
           }
        } ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add item page</title>
	
	
    <style>
        .container{
            display:block;
        }
        .containersecond{
            position: absolute;
    display: inline-block;
    top: 80px;
    right: 50px;
    height: fit-content;
    width: fit-content;
        }
        form{
            display: inline-block;
    border: 1px solid black;
    margin: 12px 457px;
        }
         label{
            font-size: 20px;
    margin: 12px 23px;
    display: block;
    padding: 12px 23px  
         }
         input{
            font-size: 20px;
    margin: 12px 23px;
    display: block;
    padding: 12px 23px 
         }
        
         table{
            position: absolute;
    margin: 12px 23px;
    display: inline-block;
    top: 95px;
    right: 200px;
         }
         a{
            text-align:center;
            display:block;
            color:white;
            background-color:blue;
            padding:5px 8px;
            text-decoration: none;
            font-size:20px;

         }

    </style>
</head>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Archivo+Black&family=Bebas+Neue&family=Bree+Serif&family=IBM+Plex+Sans:wght@700&family=Oswald:wght@700&family=Poppins:wght@600&display=swap" rel="stylesheet">
<body>
    <h1 style="text-align:center;text-align:center; font-family: 'Bebas Neue', sans-serif; letter-spacing: 5px;word-spacing:7px; font-size:55px;">Product Page</h1>
    <div class="container">
        <h1 style="text-align:center; font-family: 'Bebas Neue', sans-serif; letter-spacing: 5px;word-spacing:7px; font-size:30px; margin-top:-26px;">Add Items</h1>
           <form action="" method="post">
         <label for="itemname">
             <b>Item Name:</b><input type="text" name="itemname" id="itemname" Required>
            </label>
         <label for="itemprice">
             <b>Item price:</b><input type="text" name="itemprice"  id="itemprice"Required>
            </label>

            <input type="submit" name="add" value="Add Item" id="btn">

            <a href="Product.php" style="margin:12px 23px;background-color:#2f89fc;" >See Product</a>   
    </form>
