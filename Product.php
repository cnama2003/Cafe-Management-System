<!doctype html>
<html lang="en">
  <head>
  	<title>Products List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
		
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					
		        <h2 class="heading-section" style="    margin-top: -84px;
    font-size: 40px;">Product list</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
					    <thead class="thead-primary">
					      <tr>
					        <th>Product Id</th>
					        <th>Product Name</th>
					        <th>Price</th>
					        <th>Action</th>
					      </tr>
					    </thead>
					    <tbody>
						
					      <tr>
						  <?php
           $conn=mysqli_connect("localhost","root","","coffee_project");

             $str2 = "select * from item";
             $res2 = mysqli_query($conn,$str2);
            
            while($rs = mysqli_fetch_array($res2))
                  {
                    
                    ?>
                  <td><?php echo $rs["Itemid"]; ?></td>
                 <td><?php  echo $rs["Itemname"]; ?></td>
                  <td><?php echo $rs["Price"]; ?></td>
				  <td><button style="border:none;"><a href="?id=<?php echo $rs["Itemid"];?>"  class="btn btn-primary">Update</a></button></td>
				  <td><button style="border:none;"><a href="?iddel=<?php echo $rs["Itemid"];?>" class="btn btn-primary">Remove</a></button></td>
				  <td><button style="border:none;"><a href="?idadd=<?php echo $rs["Itemid"];?>" class="btn btn-primary">Add to cart</a></button></td>

          <td><input type="checkbox"><a href="idcart=<?php echo $rs["Itemid"];?>"></a></td>
          <td> 
             <form action="" method="post">
                <input type="number" name="itqty">  
                
             </form>
          </td>
	
                  <tr>
                <?php

                 } 

            ?>
					    </tbody>
					  </table>
					</div>
				</div>
			</div>
			<span>
				  <!-- <td><button style="border:none;"><a href="?idadd=<?php echo $rs["Itemid"];?>" class="btn btn-primary">Add to cart</a></button></td> -->
          
					<a href="Addproduct.php" class="btn btn-primary">Add Product</a>
					<a href="Cart.php" class="btn btn-primary" style="margin-left:10px;">View Cart</a>
				   </span>
				   
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>
<?php

if(isset($_GET["id"]))
{
 $id=$_GET["id"];
 $conn=mysqli_connect("localhost","root","","coffee_project");
 $str2="Select*from item where Itemid='$id'";
 $res2=mysqli_query($conn,$str2);
 
 while($rs2=mysqli_fetch_array($res2))
 {
   $itemid=$rs2["Itemid"];
   $itemname=$rs2["Itemname"];
   $Itemprice=$rs2["Price"];
 }
 ?>
 <form action="" method="post" onsubmit="return confirm('Update Now?');" style="   width:auto; border: 1px solid gray;
    display: inline-block;
    padding: 27px;
    margin: 12px 500px;">
<b>Item Id</b> <input type="text" name="Itemid" style="display:block;" readonly value="<?php echo $itemid;?>">
<br>
<b>Item Name</b><input type="text" name="Itemname" style="display:block;" value="<?php echo $itemname;?>">
<br>

<b>Price</b> <input type="text" name="Price"style="display:block;" value="<?php echo $Itemprice;?>">

<input type="submit" name="edit" value="Update Now" style="display:block; margin:15px 23px; border-radius:5px; color:white;	background-color:red;">

</form>
<?php

}
?>
<?php
if(isset($_POST["edit"]))
{
  $conn=mysqli_connect("localhost","root","");
  mysqli_select_db($conn,"coffee_project");
  $itid=$_POST["Itemid"];
  $itname=$_POST["Itemname"];
  $price=$_POST["Price"];
  $str3="update item set Itemname='$itname',Price='$price' where Itemid='$itid'";
  $res3=mysqli_query($conn,$str3);
  if($res3==true)
 {
   ?>
	<script>
	 alert('Record has been updated successfully!');
	 window.location.href='product.php';
	</script>
	<?php
	}
	else
	{
	 ?>
	 <script>
		alert('Error in query');

	 </script>
	 <?php
	}
} 
	 ?>


<!-- Delete the product -->


<?php
      if(isset($_GET["iddel"]))
      {
         $iddel=$_GET["iddel"];
         $conn=mysqli_connect("localhost","root","");
        mysqli_select_db($conn,"coffee_project");

        $str4="delete from item where Itemid='$iddel'";
        $res4=mysqli_query($conn,$str4);
        if($res4==true)
        {
          ?>
          <script>
             alert('Record has been Deleted Successfully');
             window.location.href='product.php';
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
    <?php
	if(isset($_GET["idadd"]))
{
	?>
	<!-- Add to cart details collection -->

	<form action="" method="post" style="width:auto; border: 1px solid gray;
    display: inline-block;
    padding: 27px;
    margin: 12px 500px;">
<label for="cname">
<b>Customer Name:</b> <input type="text" name="cname"  id="cname" style="display:block;">
</label>
<br>
<label for="caddress">
<b>Customer Address:</b><input type="text" name="caddress" id="caddress" style="display:block;">
</label>
<br>
<label for="quantity">
   <b>Item Quantity:</b> 
   <br><input type="number" name="itqty" id="quantity">
</label>
<br>
<label for="dateofsale">
	<br>
<b>Date of Purchase:</b> <input type="date" id="dateofsale" name="dateofsale" style="display:block;">
</label>
<br>
<input type="submit" name="submit" value="Submit" style="display:block; margin:15px 23px; border-radius:5px; color:white;	background-color:red;">


</form>

<?php
 $idadd=$_GET["idadd"];
 $conn=mysqli_connect("localhost","root","","coffee_project");
 $query="Select*from item where Itemid='$idadd'";
 $result=mysqli_query($conn,$query);
 
 while($rs2=mysqli_fetch_array($result))
 {
   $itemid=$rs2["Itemid"];
   $itemname=$rs2["Itemname"];
   $Itemprice=$rs2["Price"];
 }

 ?>


<?php
    if(isset($_POST["submit"]))
	{
	 $cname=$_POST["cname"];
	$caddress=$_POST["caddress"];
	$itqty=$_POST["itqty"];
	$dos=$_POST["dateofsale"];
	$tot = $itqty*$Itemprice;

	$query2="insert into cart(Itemid, Itemname,quantity,Customername,Customeraddress,Dateofsale,Amount,Totalamount) values('$itemid','$itemname','$itqty','$cname','$caddress','$dos','$Itemprice','$tot')";
	$res5 =mysqli_query($conn,$query2);
	if($res5==true)
	    {
		 ?>
          <script>
             alert('Record has been added in cart successfully');
             window.location.href='product.php';
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
	
} 
?>
