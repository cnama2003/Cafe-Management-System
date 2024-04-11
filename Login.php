<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <style>
        body{
           
            text-align: center; 
            margin-top: 100px;
            background-color: rgb(240, 242, 245);
        }
        div{
            display: inline-block   ;  
        }

        .logo{
            width: 396px;
            position: relative;
            top: -100px;
            margin-right: 65px;
            
        
           
                    
        }
        .form{
            width: 396px;
            margin: 12px 23px;
        
        }
          

        .form{
            text-align: center;
            padding: 12px 23px;
            margin: 12px 23px;
            height: 330     px;
            background-color: rgb(255, 255, 255);
           
        }
     input{
        width: 330px;
        height: 22px;
        border:1px solid gray;
        border-radius: 5px;
     }
     input{
        margin: 12px 23px;
        width: 330px;
        height: 22px;
        padding: 16px 14px;
        font-size: 17px;
     }
     a{
          width: auto;
     }
     .login{
        background-color:#1877f2;
        color: white;
        font-size: 20px;
        font-weight: 700;
        width: 332px;
        height:48px;
        border-radius:8px;
        margin: 12px 23px;
        padding: 0px 16px;

     }
     .new-ac{
        width: 180px;
        height: 48px;
        color: white;
        background-color: rgb(66, 183, 42);
        font-size: 17px;
        margin: 12px 23px;
        font-weight: bold;  
     }
     .new-ac:hover{
        background-color: #36a420;
     }
     h2{
        text-align:left
     }
     img{
        margin-bottom: -60px;
        margin-left: -193px;
        width: 300px;
     }
     .image-section{
        width: 380px;
        margin:12px 23px;

     }
     .link{
        display: block;
        margin-top: 10px;
        margin-bottom: 20px;
     }
     a{
        text-decoration: none;
        color: white;
     }
     
    </style>
</head>
<body>
    <h1 style="font-size:50px">Sign in</h1>
    <div class="form">
        <form action="" method="post">
            <input type="text" placeholder="User Name" name="uname">
            <input type="password" placeholder="Password" name="pass">
            <div>
                <button type="submit" class="login" name="login">Login</button>
            </div>
            <div class="link">
            <a href="#" >Forgot Password</a>
        </div>
        </form>
    </div>
</body>
</html>


<?php

  $conn = mysqli_connect("localhost","root","");
  mysqli_select_db($conn,"coffee_project");

  if(isset($_POST["login"]))
  {
    $uname=$_POST["uname"];
    $pass=$_POST["pass"];

    $str= "select * from user where Username='$uname' && Password='$pass'";
    $res = mysqli_query($conn,$str);
    $tc =mysqli_num_rows($res);
    if($tc>0)
    {
        ?>
        <script>
            window.location.href="dashbord.php";

        </script>
        <?php
    }
    else
    ?>
     <script>
        alert('Error in login');
     </script>
    <?php

    }
