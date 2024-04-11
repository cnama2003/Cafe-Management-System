
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Archivo+Black&family=Bebas+Neue&family=Bree+Serif&family=IBM+Plex+Sans:wght@700&family=Oswald:wght@700&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body{
            font-family:'Bebas Neue', sans-serif; 
        }
        .innercontainer{
            position: absolute;
            top: 40px;
    left: 214px;
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="text-align:center; font-family: 'Bebas Neue', sans-serif; letter-spacing: 5px;word-spacing:7px; font-size:55px; margin-bottom:2px">Cart Info</h1>
        <hr>
         <div class="innercontainer">
         <section class="ftco-section">
		
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table" style="font-size: 15px;">
					    <thead class="thead-primary">
					      <tr>
					        <th>Customer Id</th>
					        <th>Product Id</th>
					        <th>Product Name</th>
					        <th>Quantity</th>
					        <th>Customer Name</th>
					        <th>Customer Address</th>
					        <th>Date of Sale</th>
					        <th>Amount</th>
					        <th>Total Amount</th>
					      </tr>
					    </thead>
					    <tbody>
						
					      <tr>
						  <?php
           $conn=mysqli_connect("localhost","root","","coffee_project");

             $str2 = "select * from cart";
             $res2 = mysqli_query($conn,$str2);
            
            while($rs = mysqli_fetch_array($res2))
                  {
                    ?>
                  <td><?php echo $rs["Customerid"]; ?></td>
                  <td><?php echo $rs["Itemid"]; ?></td>
                 <td><?php  echo $rs["Itemname"]; ?></td>
                  <td><?php echo $rs["quantity"]; ?></td>
                  <td><?php echo $rs["Customername"]; ?></td>
                  <td><?php echo $rs["Customeraddress"]; ?></td>
                  <td><?php echo $rs["Dateofsale"]; ?></td>
                  <td><?php echo $rs["Amount"]; ?></td>
                  <td><?php echo $rs["TotalAmount"]; ?></td>
                  <tr>
                  <?php

                } 

            ?>
					    </tbody>
					  </table>
					</div>
				</div>
			</div>
        <form action="" method="post">
        
        <button class="btn btn-primary" ><a href="Bill.php" class="btn btn-primary" >Generate Bill</a></button>
        <!-- <input type="submit" name="bill" value="Generate Bill" class="btn btn-primary"><a href="?idbill=<?php echo $itemid;?>" ></a> -->
            </form>
    </div>
</body>
</html>


<!-- bill Section -->
<?php
  if(isset($_POST["bill"]))
  {
    ?>
    <form action="" method="post" style="width:auto; border: 1px solid gray;
    display: inline-block;
    padding: 27px;
    margin: 12px 500px;
    position:absolute; top:500px; color:black; font-size:18px;font-family:Poppins;background-color:gray;">
    <label for="mobileno">
         <b>Mobile Number:</b> <input type="mobile"name="mobno" id="mobileno">

    </label>
<label for="paymentmode">
         <b>Payment Mode:</b>
         <br> <input type="radio"  name="paymode" id="paymentmode">Online
         <br>
          <input type="radio" name="paymode" id="paymentmode">Cash
  </label>
  <input type="submit" name="Submit" value="Submit" style="display:block; margin:15px 23px; border-radius:5px; color:white;	background-color:red;">
    </form>
    <?php
    
  ?>
    <?php
    if(isset($_GET["idbill"])){
      $idbill=$_GET["idbill"];
    }

      if(isset($_POST["Submit"])){
       $mobno=$_POST["mobno"];
       $paymode=$_POST["paymode"];
        
        $conn = mysqli_connect("localhost","root","","coffee_project");
           $str = "select * from cart where Itemid='$idbill'";
          $res = mysqli_query($conn, $str);
          while($rs = mysqli_fetch_array($res2))
          {
            
            ?>
          <?php echo $rs["Itemid"]; ?>
          <?php  echo $rs["Itemname"]; ?>
          <?php echo $rs["quantity"]; ?>
          <?php echo $rs["Customername"]; ?>
          <?php echo $rs["Customeraddress"]; ?>
          <?php echo $rs["Dateofsale"]; ?>
          <?php echo $rs["Amount"]; ?>
          <?php echo $rs["TotalAmount"]; ?>
        
        <?php
          $conn=mysqli_connect("localhost","root","","coffee_project");
          $query="select*from cart where itemid='$idbill'";
          $result=mysqli_query($conn,$query);
          while($rsl=mysqli_fetch_array($result))
          {
            $itemname=$rsl["Itemname"];
            $itqty=$rsl["quantity"];
            $cname=$rsl["Customername"];
            $caddress=$rsl["Customeraddress"];
            $dos=$rsl["Dateofsale"];
            $itprice=$rsl["Amount"];
            $tot=$rsl["TotalAmount"];
          }

          $query1 = "insert into Bill(Itemid,Itemname,Itemprice,Customername,Address,Mobileno,TotalAmount,Dateofsale,Modeofpayment) values('$itemname','$itprice','$cname','$caddress','$mobno','$tot','$dos','$paymode')";
          $reu = mysqli_query($conn, $query1);
        if($reu == true)
           {
             ?>
             <script>          alert('Bill has been generated.');
        
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


        } 
        ?>
        <script>
          window.location.href="Bill.php";
        </script>
        <?php

     }
    }
     
    ?>
  
  