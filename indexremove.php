<?php
session_start();
require_once 'config.php';
if(!isset($_SESSION['username'])){

  header("location: login.php");
  exit;
}
if(!empty($_GET["action"])) {


switch($_GET["action"]) {
	case "add":


$pid=$_POST["id"];
$username=$_SESSION['username'];
//echo $pid;


$sql= "select  * from prod_cust_cart where cust_name='".$username."' and prod_id=".$pid;
//echo $sql;
$result=mysqli_query($link,$sql);

if(mysqli_num_rows($result) == 0)
{
	$res= "Insert into prod_cust_cart values('".$username."',". $pid .",1)";
	//echo $res;
	if(mysqli_query($link,$res))
	{
		echo "<script> alert(\" Item Added\")</script>";
	}
	else{
		echo "<script> alert(\" Error in inserting \")</script>";
	}
	

}

else {
	$res=" update prod_cust_cart set quantity=quantity+1 where cust_name='".$username."' and prod_id=".$pid;
	//echo $res;
	if(mysqli_query($link,$res))
	{
		echo "<script> alert(\" Update done\")</script>";
	}
	else{
		echo "<script> alert(\" Error in Updating \")</script>";
	}
	

}

header("location: home.php");
break;



case "remove":
echo "Removed";

break;
	case "empty":
	$username=$_SESSION['username'];
	//echo $username;
		$sql= "delete from prod_cust_cart where cust_name='".$username."'";
//echo $sql;
if(mysqli_query($link,$sql)) {
	echo "<script> alert(\" Hello ".$username." is empty  \")</script>";
}
else{
	echo "not done";
}
//header("location: indexnew.php");
	break;	
}
}
?>
<!DOCTYPE html>
<html lang ="en">
<head>
<meta charset="utf-8">
	<title> Dhakad Electrical & Electronics</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="">
	<meta name="description" content="">
	
	<link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>


    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
</head>
<body>


<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>

<div id="header">
<div class="container">
	<div id="welcomeLine" class="row">
	<div class="span6" style="align:center"> </div>
	<div class="span6">
	<div class="pull-right">
	     <a href="adminlogin.php"><span class="btn  btn-success">Admin</span></a></li>
		<a href="indexnew.php"><span class="btn btn-primary"><i class="icon-shopping-cart icon-white"></i> [ 0 ] Items in cart </span> </a> 
	</div>
	</div>
	</div>

<!-- Navbar -->


<div id="logoArea" class="navbar">

  <div class="navbar-inner">
    <a class="brand" href="home.html"><img src="themes/images/imag.jpeg" alt="Dhakadenterprise"/></a>
		<form class="form-inline navbar-search" method="post" action="#" >
		<input id="srchFld" class="srchTxt" type="text" />
		  <select class="srchTxt">
			<option>Categories</option>
			<option>Multimedia </option>
			<option>Coolers and fans</option>
			<option>Extension Cords & Power strips</option>
			<option>Batteries and Chargers</option>
			<option>Switches & Dimmers </option>
			<option>Electrical Boxes, Conduit & fittings</option>
			<option>Motors and starters</option>
			<option>Wires, Conductors & Fasteners</option>
		</select> 
		  <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
    </form>

       <ul id="topMenu" class="nav pull-right">
	 <li class=""><a href="seasonal.html">Seasonal Offers</a></li>
	  <li class=""><a href="contact.html">About us</a></li>

	 <li class=""><a href="delivery.html">Delivery</a></li>
	 <li class="">

<?php
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
 
  echo '<a href="login.php" style="padding-right:0"><span class="btn btn-large btn-success">Log-in</span></a> </li> <li><a href="signin.php" style="padding-right:0"><span class="btn btn-large btn-success">Sign-up</span></a>' ;
}
else 
{

	echo '<a href="logout.php" role="button" style="padding-right:0"><span class="btn  btn-success">Logout</span></a></li> <li><a href="" style="padding-right:0"> <span class="btn  btn-success">'.$_SESSION['username'].'</span></a>';

	//echo '<span class="btn btn-large btn-success">'.$_SESSION['username'].'</span>';
}
?>

	  
	</li>
	
	  
    </ul>
  </div>
</div>
</div>
</div>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart <a class="btn btn-success" href="indexnew.php?action=empty">Empty Cart</a></div>
<?php 
   $sql = "SELECT p.product_id, p.unit_price,pc.quantity  FROM product as p,prod_cust_cart as pc where  p.product_id=pc.prod_id ";
  // echo $sql;

$result = mysqli_query($link, $sql);
//if($result) echo "yes done";
//echo mysqli_num_rows($result);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    //echo 'hdsjck';
    echo '
<table  style="margin-left:300px">
    <tr>
    <th>Product-ID</th>
    <th>Unit Price</th>
    <th>Quantity</th>
    <th>Image</th>
    <th>Remove</th>
  </tr> 
  <tr>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  ';

    while($row = mysqli_fetch_assoc($result)) {
       // $id = $row["product_id"];
        //echo $id;
        echo "<tr><th>" . $row["product_id"]."</th><th>" . $row["unit_price"]. "</th><th>" . $row["quantity"]. "</th><th><img src='view.php?id=".$row["product_id"]."'></th><th><a href='indexremove.php' class='btn btn-success'>Remove Item</a></th></tr>";
    }

    echo '</table>';
    //header("Content-type: image/jpeg");
    //echo $row["image"];
} else {
    echo "0 results";
}
    // Close connection
    mysqli_close($link);
    ?>

			<div class="btn btn-primary">		<a href="home.php" style="padding-right:0"><span class="btn btn-primary">HOME</span></a></div>

			<div class="btn btn-primary">		<a href="payment.html" style="padding-right:0"><span class="btn btn-primary">Payment</span></a></div>


</div>


<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span3">
				<h5>ACCOUNT</h5>
				<a href="login.html">YOUR ACCOUNT</a>
				<a href="login.html">PERSONAL INFORMATION</a> 
				<a href="login.html">ADDRESSES</a> 
			 </div>
			<div class="span3">
				<h5>INFORMATION</h5>
				<a href="contact.html">CONTACT</a>  
				<a href="#">SPECIAL OFFERS</a>
				<a href="register.html">REGISTRATION</a>  
				<a href="legal_notice.html">LEGAL NOTICE</a>  
				<a href="tac.html">TERMS AND CONDITIONS</a> 
				<a href="faq.html">FAQ</a>
			 </div>
			
			<div id="socialMedia" class="span3 pull-right">
				<h5>SOCIAL MEDIA </h5>
				<a href="#"><img width="40" height="40" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
				<a href="#"><img width="40" height="40" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>
			 </div> 
		 </div>
		
	</div><!-- Container End -->
	</div>

</bODY>
</HTML>
