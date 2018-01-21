<?php
session_start();
require_once 'config.php';
if(!isset($_SESSION['username'])){

  echo "<script> location.href='login.php'; </script>";
  exit;
}

$address=$mobilenumber="";
$address_err=$mobilenumber_err="";

if(isset($_POST['id']))
	$_SESSION['id'] = $_POST['id'];
$id=$_SESSION['id'];

	if(empty(trim( isset($_POST['mobilenumber']) && $_POST['mobilenumber']))){
	        $mobilenumber_err = "Please enter the contact detail.";     
	    } else{
	        $mobilenumber = trim($_POST['mobilenumber']);
	    }

	    if(empty(trim(isset($_POST['address']) && $_POST['address']))){
	        $address_err = "Please enter the address.";     
	    } else{
	        $address = trim($_POST['address']);
	    }
	  if( isset($_POST['mobilenumber']) && isset($_POST['address']) )
	{
		$sql = "update cus_users_new set address='".$address."' , mobilenumber=".$mobilenumber." where username='".$_SESSION['username']."'";
		//echo $sql;
		if(mysqli_query($link,$sql))
			{
				echo "<script> alert(\" Update done\")</script>";
			}


		$res= "insert into transaction(amount,username) values(".$id.",'".$_SESSION['username']."')";
		//echo $res;

		if(!mysqli_query($link,$res)){
echo 'error';
		}

		$sql1= "delete from prod_cust_cart where cust_name='".$_SESSION['username']."'";
		mysqli_query($link,$sql1);


	}
		



?>





<!DOCTYPE html>
<html lang ="en">
<head>
<script  src= "https://www.payumoney.com/Api/REST/op/buttonScript" async="true" > </script>
<script >
function keyRand(){
	var st="qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
	var kkey="";
	for(var i=0;i<10;i++)
		kkey+=st.charAt(Math.floor(Math.random()* st.length));
	return kkey;
};
function myFunction(){
	//alert(keyRand());
// alert();
window.PUM.setData(parseInt(document.getElementById("val").innerHTML), keyRand(),'Cooler');
window.PUM.pay()
};
</script>
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
		<a href="indexnew.php"><span class="btn btn-primary"><i class="icon-shopping-cart icon-white"></i> Items in cart </span> </a> 
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
    </form> -->

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
	

<div class="span9" >
<h3 >Select Address</h3>
<div class="col-lg-12 well">
	<div class="row" style="padding-left: 60px">


<?php 
   
$sql = "SELECT name,address, mobilenumber  FROM cus_users_new where username='".$_SESSION['username']."' ";

  // echo $sql;
$total=0;
$result = mysqli_query($link, $sql);
//if($result) echo "yes done";
//echo mysqli_num_rows($result);
if (mysqli_num_rows($result) > 0) {

	
	while($row = mysqli_fetch_assoc($result)) {
		echo '

		<h2> Name <span class="btn btn-primary btn-large"> '. $row["name"].'</span></h2>
		<h3> Total amount <span id="val" class="pull-right btn btn-large">'. $id.'</span></h3>



<form action=" '.htmlspecialchars($_SERVER["PHP_SELF"]).' " method="post">
					<div class="col-sm-12">
						
					
                <label>Address</label>
                <input type="text" name="address" class="form-control" value="'. $row["address"].'">
                <label>Mobilenumber</label>
                <input type="text" name="mobilenumber" class="form-control" value='. $row["mobilenumber"].'><br>
                
<input type="submit" class="btn btn-primary" value="Deliver to this address">
					
					</div>				
					
				</form> 
				';
}

}




?>

</div>
		</div>
		<!-- <button onclick="myFunction()">Click me</button> --> 
	<span class='pm-button' id='947D8E34396E40C4BDC15D00DC722E5D' onclick="myFunction()">
  <span class="state active">
    <input type="image" src="https://file.payumoney.com/images/payby_payumoney/new_buttons/21.png" width="131" height="37">
  </span>
  <span class="state clicked" style="display:none" >
    <input type="image" src="https://file.payumoney.com/images/payby_payumoney/new_buttons/submitted/21.png" width="131" height="37">
  </span>
</span>
</div>


</div></div>



	
	
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

</bODY>
</HTML>
