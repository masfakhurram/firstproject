<?php
include('connection.php');
if(isset($_POST['add_to_cart'])){
$name= $_POST['name'];
$price= $_POST['price'];
$qty = 1;
$select_cart =mysqli_query($con, "SELECT * FROM`cart` WHERE name = '$name'");
if(mysqli_num_rows($select_cart) >0){
    echo 'Already Added To Your Cart';
}
else{
    $insert = mysqli_query($con, "INSERT INTO `cart`(name,price,qty)
    VALUES('$name', '$price', '$qty')");
    $message[] = 'Added To Your Cart';
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        header{width:100%;
        height: 60px;
    background:blue;}
    ul{
			list-style: none;
		}
		ul li{float: left; width:10%; line-height: 60px;}
		ul li a{color:white; text-decoration:none;}
		#clr{background-color: blue;
			color: white;
			text-align: center;}
			.checkout.btn{
				text-align:center;
				width: 30%;
				height: auto;
				background-color: blue;
				border-radius: 10px;
				margin-top: 20px;
				color: white;
				cursor: pointer;
            }
    </style>

<header>
<ul>
<li><a href="">HOME</a></li>
<li><a href="">PRODUCT</a></li>
<li><a href="">CONTACT</a></li>
<?php
include('connection.php');
$select_rows = mysqli_query($con, "SELECT * FROM `cart` ") or die ('query failed');
$row_count =mysqli_num_rows($select_rows);
?>
<li><a href="cart.php">cart</a> &nbsp;<span><?php echo $row_count; ?> </span></li>
</ul>
</header>
<div class="container">
<div class="row">
<div class="col-md-4">
<?php
include('connection.php');
$select="select * from product";
$query=mysqli_query($con,$select);
while($row=mysqli_fetch_assoc($query)){
    ?>
<form action="" method="post">
<h5 style="background-color:#29C5F6; color:white; text-align:center;"><?php echo $rows['name']; ?></h5>
<img src="img/<?php echo $row['pic']; ?>" width="100%" height="120" />
<p syle="font-weight:bold; font-size:30px;"> $ -<?php echo number_format($row['price']) ; ?> </p>
<input type="hidden" name="name" value="<?php echo $row['name'];?>">
<input type="hidden" name="price" value="<?php echo $row['price'];?>">
<br>
<button type="submit" name="add_to_cart"> Add To cart ?</button>
</div>
</form>
</div>
<?php
}
?>
</div>
</div>