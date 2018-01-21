<?php
session_start();
require_once 'config.php';
if(!isset($_SESSION['username'])){

  echo "<script> location.href='login.php'; </script>";
  exit;
}
global $total;
$total=0;
if(!empty($_GET["action"])) {


switch($_GET["action"]) {
	case "add":


$pid=$_POST["id"];
$nid=$_POST["number"];
$username=$_SESSION['username'];

//echo $pid;


$sql3=" update product set quantity=quantity-".$nid." where product_id=".$pid." and quantity >= ".$nid ;
//echo $sql2;

mysqli_query($link,$sql3);
$r= "select  * from product where product_id=".$pid;
$resofr=mysqli_query($link,$r);

	if(mysqli_num_rows($resofr) > 0)
	{
		while($row = mysqli_fetch_assoc($resofr)){

				if($row["quantity"]<$nid)
				{

					echo "<script> alert(\" Sorry, this quantity of item is not in stock\")</script>";
					//echo "<script> location.home.php?code3=\"not available\" </script>";
					//echo "<script> location.home.php </script>";
				}
				else
				{

					$sql2=" update category set availability=availability-".$nid." where category_id=".$_GET["code1"]." and availability >= ".$nid ;
//echo $sql2;

					mysqli_query($link,$sql2);
					$sql= "select  * from prod_cust_cart where cust_name='".$username."' and prod_id=".$pid;
					//echo $sql;
					$result=mysqli_query($link,$sql);

					if(mysqli_num_rows($result) == 0)
					{
						$res= "Insert into prod_cust_cart values('".$username."',". $pid .",". $nid .")";
						//echo $res;
						if(mysqli_query($link,$res))
						{
							echo "<script> alert(\" Item Added\")</script>";
						}
						else{
							echo "<script> alert(\" Error in inserting \")</script>";
						}
						

					}

					else 
					{
						$res=" update prod_cust_cart set quantity=quantity+".$nid." where cust_name='".$username."' and prod_id=".$pid;
						//echo $res;
						if(mysqli_query($link,$res))
						{
							echo "<script> alert(\" Update done\")</script>";
						}
						else{
							echo "<script> alert(\" Error in Updating \")</script>";
						}
						

					}




					echo "<script> location.href='home.php'; </script>";
				}
		
	}
}



break;



case "remove":
			$username=$_SESSION['username'];
			//$pid=$_POST["id"];
			
			$sql7="select * from prod_cust_cart where cust_name='".$username."' and prod_id=".$_GET["code"];
			$we=mysqli_query($link,$sql7);

			if(mysqli_num_rows($we) > 0)
	{
		while($row = mysqli_fetch_assoc($we)){
			$sql4=" update product set quantity=quantity+".$row["quantity"]." where product_id=".$_GET["code"] ;
			//echo $sql2;

			mysqli_query($link,$sql4);



			$sql8="select * from product where product_id=".$_GET["code"];
			$we1=mysqli_query($link,$sql8);

			$row1 = mysqli_fetch_assoc($we1);
			$sql5=" update category set availability=availability+".$row["quantity"]." where category_id=".$row1["categ_id"];
			//echo $sql5;

			mysqli_query($link,$sql5);}
		}


		$sql= "delete from prod_cust_cart where cust_name='".$username."' and prod_id=".$_GET["code"];
			//echo $sql;

			//echo "Removed";
			//echo $sql;
			
			if(mysqli_query($link,$sql)) 
			{
				echo "<script> alert(\" Hello ".$username." , item is removed  \")</script>";
			}
			else
			{
				echo "not done";
			}
			//header("location: indexnew.php");
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
<!-- <script  src= "https://www.payumoney.com/Api/REST/op/buttonScript" async="true" > </script>
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
</script> -->
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



<div id="shopping-cart">
<div class="txt-heading">Shopping Cart <a class="btn btn-success" href="indexnew.php?action=empty">Empty Cart</a></div>
<?php 
   $sql = "SELECT p.product_id, p.unit_price,pc.quantity  FROM product as p,prod_cust_cart as pc where cust_name='".$_SESSION['username']."' and  p.product_id=pc.prod_id ";
  // echo $sql;
$total=0;
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
        echo "<tr><th>" . $row["product_id"]."</th><th>" . $row["unit_price"]. "</th><th>" . $row["quantity"]. "</th><th><img src='view.php?id=".$row["product_id"]."' style='width:250px ; height:200px'></th><th><a href='indexnew.php?action=remove&code=". $row["product_id"] ."' class='btn btn-success'>Remove Item</a></th></tr>";
        
        $total += ($row["unit_price"]*$row["quantity"]);
		
		
		}

    
    echo '

<tr>
<td colspan="5" align=right><strong>Total:</strong>  "Rs"<div id="val">'.$total.'</div> </td>
</tr>';
    echo '</table>';
    
    	$discount=0;
    	$code="";
		if($total>=4000)
		{
			$discount=(15*($total))/100;
			$code="AXIS15";
		}
		else if($total>=2000)
		{
			$discount=(10*($total))/100;
			$code="SBI10";
		}
		else if($total>=400)
		{
			$discount=(15*($total))/100;
			$code="PHOP5";
		}


	if($discount!=0)
	{

			echo '<div style="color: brown; padding-left:290px" >Code Applied : <span class="btn btn-primary">'.$code.'Discount : </span><span class="btn btn-primary">'.$discount.'</span> </div>';

	}
	else{
		echo 'Sorry, no offer code can be applied';
	}

	$total=$total-$discount;
echo '<div style="color: brown; padding-right:290px" align="right">Final Amount = <span class="btn btn-primary">'.$total.'</span></div>';

} else {
    echo "0 results";
}
    // Close connection
    mysqli_close($link);
    ?>

			<div class="btn btn-primary">		<a href="home.php" style="padding-right:0"><span class="btn btn-primary">HOME</span></a></div>
<?php
echo '

<form method="post" action="delivery.php">
<div class="pull-right"><input type="hidden" name="id" value= '.$total.'> 

            <input type="submit" value="Proceed " class="btn btn-primary btn-large" /> 
            </div></form>';

?>
<!-- <button onclick="myFunction()">Click me</button> -->
	<!-- <span class='pm-button' id='947D8E34396E40C4BDC15D00DC722E5D' onclick="myFunction()">
  <span class="state active">
    <input type="image" src="https://file.payumoney.com/images/payby_payumoney/new_buttons/21.png" width="131" height="37">
  </span>
  <span class="state clicked" style="display:none" >
    <input type="image" src="https://file.payumoney.com/images/payby_payumoney/new_buttons/submitted/21.png" width="131" height="37">
  </span>
</span> -->


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

</bODY>
</HTML>
