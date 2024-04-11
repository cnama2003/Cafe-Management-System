
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
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
        <h1 style="text-align:center; font-family: 'Bebas Neue', sans-serif; letter-spacing: 5px;word-spacing:7px; font-size:55px; margin-bottom:2px">Invoice Info</h1>
        <hr>
         <div class="innercontainer">
         <section class="ftco-section">
		
			<div class="row">
				<div class="col-md-12">
					<!-- <h4 class="text-center mb-4">Create Your Domain Name</h4> -->
					<div class="table-wrap">
						<table class="table" style="font-size: 15px;">
					    <thead class="thead-primary">
					      <tr>
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
            <form action="" method="post">
            <button name="print" class="btn btn-primary">Print</button>
            </form>
            <?php

            if(isset($_POST["print"])){
                    ?>
                    <script>
                      window.print();
                      </script>
                      <?php
            }?>
					</div>
				</div>
			</div>
    </div>
</body>
</html>