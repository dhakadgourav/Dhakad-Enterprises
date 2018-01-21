


<?php
// Initialize the session
session_start();
 
require_once 'config.php';

if(!isset($_SESSION['username']) || $_SESSION['username']=='gourav' ){

  echo "<script> location.href='login.php'; </script>";
  exit;
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

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
    <a class="brand" href="home.php"><img src="themes/images/imag.jpeg" alt="Dhakadenterprise"/></a>
		<!-- <form class="form-inline navbar-search" method="post" action="#" >
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
 -->
       <ul id="topMenu" class="nav pull-right">
	<li class=""><a href="seasonal.php">Seasonal Offers</a></li>
	  <li class=""><a href="contact.php">About us</a></li>

	 <li class=""><a href="delivery.php">Delivery</a></li>
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





<div id="mainBody">
	<div class="container">
	

		<div class="span9">
    <ul class="breadcrumb">
		<li><a href="home.php">Home</a> </li>
    </ul>
    <h3 align="center">OFFERS</h3>
	<h4> Don't miss this great opportunity  </h4></br>
	

<div class="panel-group" id="accordion" style="color: red" align="center">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><div class="btn btn-primary">
        SBI Offer</div></a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in" style="color: brown" align="left">
      <div class="panel-body"><ul><li>10% off on SBI debit card.</li><li>
      		Applicable only for new users.</li><li>Automatic Applicaple if amount is greater then Rs.2000</li>
      		<li> Code= <span style="color: blue" class="btn">SBI10</span></li></ul>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><div class="btn btn-primary">
        Axis Bank</div></a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse" style="color: brown" align="left">
      <div class="panel-body">

      		<ul><li>15% off on Axis bank debit card.</li><li>
      		Applicable only in offer period(10th Nov 2017 to 12th Jan 2018).</li><li>Automatic Applicaple if amount is greater then Rs.4000</li>
      		<li> Code= <span style="color: blue" class="btn">AXIS15</span></li></ul>
      		</div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><div class="btn btn-primary">
        Phone Pe Wallet</div></a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse" style="color: brown" align="left">
      <div class="panel-body">
      		<ul><li>5% off on Phone Pe wallet</li><li>
      		Applicable only in offer period(10th Nov 2017 to 12th Jan 2018).</li><li>Automatic Applicaple if amount is greater then Rs.400</li>
      		<li> Code= <span style="color: blue" class="btn">PHOP5</span></li></ul>
      		</div>
    </div>
  </div>
</div>


<!-- <p>
Don't miss this great opportunity 
<h3><b>Only</b> one offer can be applied at a time</h3>
   <ul>
   <li> 10% off on <a href="#">SBI debit card  </a></li><br>
   <li> 15% off on <a href="#">Axis debit card</a></li><br>
   <li> 10% off on <a href="#">Phone Pe app</a></li><br>
   <li> 385 cashback on loading more than 1000 rs on <a href="#">wallet</a></li>
   </ul>
</p> -->
</div>



		<div id="sidebar" class="span3 pull-right" style="padding-right: 80px">
		<div class="well well-small"><a id="myCart" href="indexnew.php"><img src="themes/images/ico-cart.png" alt="cart">Items in your cart  </a></div>
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			<li class="subMenu open"><a> ELECTRICAL ACCESSORIES</a>
				<ul>
				<li><a class="active" href="products.php"><i class="icon-chevron-right"></i>Extension Cords</a></li>
				<li><a href="products.php"><i class="icon-chevron-right"></i>Dimmers and Switches</a></li>
				<li><a href="products.php"><i class="icon-chevron-right"></i>Wires and Cables (80)</a></li>
				<li><a href="products.php"><i class="icon-chevron-right"></i>Sound & Vision (15)</a></li>
				</ul>
			</li>
			<li class="subMenu"><a> Lamps & Lighting [840] </a>
			<ul style="display:none">
				<li><a href="products.php"><i class="icon-chevron-right"></i>Wall Lights</a></li>
				<li><a href="products.php"><i class="icon-chevron-right"></i>CFL</a></li>												
				<li><a href="products.php"><i class="icon-chevron-right"></i>LEDs</a></li>	
				<li><a href="products.php"><i class="icon-chevron-right"></i>DC Bulbs</a></li>
															
			</ul>
			</li>
			<li class="subMenu"><a>Cooler, fans & Exhaust fans</a>
				<ul style="display:none">
				<li><a href="products.php"><i class="icon-chevron-right"></i>Cooler</a></li>
				<li><a href="products.php"><i class="icon-chevron-right"></i>Fans</a></li>												
				<li><a href="products.php"><i class="icon-chevron-right"></i>Exhaust fans</a></li>	
				<li><a href="products.php"><i class="icon-chevron-right"></i>DC fans</a></li>
														
			</ul>
			</li>
			<li><a href="products.php">Switches & Sockets</a></li>
			<li><a href="products.php">Fitting Accessories</a></li>
			<li><a href="products.php">Batteries & Motors</a></li>
		</ul>



		<br/>
			
	</div>

		</div>
	
</div>


<div  id="footerSection">
  <div class="container">
    <div class="row">
      <div class="span3">
        <h5>ACCOUNT</h5>
        <a href="indexnew.php">YOUR ACCOUNT</a>
        <a href="indexnew.php">PERSONAL INFORMATION</a> 
        <a href="indexnew.php">ADDRESSES</a> 
       </div>
      <div class="span3">
        <h5>INFORMATION</h5>
        <a href="contact.php">CONTACT</a>  
        <a href="#">SPECIAL OFFERS</a>
        <a href="sigin.php">REGISTRATION</a>  
        
       </div>
      
      <div id="socialMedia" class="span3 pull-right">
        <h5>SOCIAL MEDIA </h5>
        <a href="#"><img width="40" height="40" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
        <a href="#"><img width="40" height="40" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>
       </div> 
     </div>
    
  </div><!-- Container End -->
  </div>

	
</body>
</html>