<?php
// Initialize the session
session_start();
 
require_once 'config.php';
$message=0;
if(!isset($_SESSION['username']) || $_SESSION['username']=='gourav' ){

  echo "<script> location.href='login.php'; </script>";
  exit;
}
// if($_SERVER["REQUEST_METHOD"] == "GET")
// {
// $message=1;

// }

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

<div>
	<marquee><a href="#"><span style="color:red">20% off on branded offers &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> </a>
	<a href="#"><span style="color:red">15% off on SBI card &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> </a>
	<a href="#"><span style="color:red">Branded fans &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> </a>
	</marquee>
</div>





<div id="carouselBlk">
	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner">

		  <div class="item active">
		  <div class="container">
			<a href="products.php"><img style="width:500px; height:400px" src="themes/images/carousel/e1.jpg" alt="special offers"/></a>
				<div class="carousel-caption">
				</div>
		  </div>
		  </div>
		  <div class="item ">
		  <div class="container">
			<a href="products.php"><img style="width:500px; height:400px" src="themes/images/carousel/dar1.jpg" alt="special offers"/></a>
			<div class="carousel-caption">
				</div>
		  </div>
		  </div>
		  
		  <div class="item">
		  <div class="container">
			<a href="products.php"><img style="width:500px; height:400px" src="themes/images/carousel/dar5.jpg" alt="special offers"/></a>
			<div class="carousel-caption"></div>
		  </div>
		  </div>
		  
		  <div class="item">
		  <div class="container">
			<a href="products.php"><img style="width:500px; height:400px" src="themes/images/carousel/dar12.jpg" alt="special offers"/></a>
			<div class="carousel-caption"></div>
			
		  </div>
		  </div>

		  <div class="item">
		  <div class="container">
			<a href="products.php"><img style="width:500px; height:400px" src="themes/images/carousel/e2.jpg" alt="special offers"/></a>
			<div class="carousel-caption"></div>
			
		  </div>
		  </div>

		  <div class="item">
		  <div class="container">
			<a href="product.php"><img style="width:500px; height:400px" src="themes/images/carousel/dar4.jpg" alt="special offers"/></a>
			<div class="carousel-caption"></div>
			
		  </div>
		  </div>
		</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
	  </div> 
</div>


<div id="mainBody">
	<div class="container">
	<div class="row">

		<div class="span9">		
			<div class="well well-small">
			<h4>New Products <small class="pull-left">All Brand available</small></h4>
			<div class="row-fluid">
			<div id="featured" class="carousel slide">
			<div class="carousel-inner">
			  <div class="item active">
			  <ul class="thumbnails">
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
					<a href="#"><img style="width:160px; height:130px" src="themes/images/products/d1.jpeg" alt=""></a>
					<div class="caption">
					  <h5>LCD TV</h5>
					  <h4><a class="btn" href="#">CLICK</a> <span class="pull-left">Rs.12000 </span></h4>
					</div>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
					<a href="#"><img style="width:160px; height:130px" src="themes/images/products/d2.jpeg" alt=""></a>
					<div class="caption">
					  <h5>LCD TV LG</h5>
					  <h4><a class="btn" href="#">CLICK</a> <span class="pull-left">Rs.13200</span></h4>
					</div>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
					<a href="#"><img style="width:120px; height:130px" src="themes/images/products/d3.jpeg" alt=""></a>
					<div class="caption">
					  <h5>Cooler </h5>
					   <h4><a class="btn" href="#">CLICK</a> <span class="pull-left">Rs.8850</span></h4>
					</div>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
					<a href="#"><img style="width:160px; height:130px" src="themes/images/products/d4.jpeg" alt=""></a>
					<div class="caption">
					  <h5>Remote Cooler</h5>
					   <h4><a class="btn" href="#">CLICK</a> <span class="pull-left">Rs.12,22</span></h4>
					</div>
				  </div>
				</li>
			  </ul>
			  </div>
			   <div class="item">
			  <ul class="thumbnails">
				
				<li class="span3">
				  <div class="thumbnail">
					<a href="#"><img style="width:160px; height:130px" src="themes/images/products/d18.jpeg" alt=""></a>
					<div class="caption">
					  <h5>CFL</h5>
					   <h4><a class="btn" href="#">CLICK</a> <span class="pull-left">Rs.145</span></h4>
					</div>
				  </div>
				</li>
			  <li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
					<a href="#"><img style="width:120px; height:130px" src="themes/images/products/d3.jpeg" alt=""></a>
					<div class="caption">
					  <h5>Cooler </h5>
					   <h4><a class="btn" href="#">CLICK</a> <span class="pull-left">Rs.8850</span></h4>
					</div>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
					<a href="#"><img style="width:160px; height:130px" src="themes/images/products/d4.jpeg" alt=""></a>
					<div class="caption">
					  <h5>Remote Cooler</h5>
					   <h4><a class="btn" href="#">CLICK</a> <span class="pull-left">Rs.12,22</span></h4>
					</div>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
					<a href="#"><img style="width:160px; height:130px" src="themes/images/products/d8.jpeg" alt=""></a>
					<div class="caption">
					  <h5>Kavery Fan</h5>
					  <h4><a class="btn" href="#">CLICK</a> <span class="pull-left">Rs.1500</span></h4>
					</div>
				  </div>
				</li>
				
				
			  </ul>
			  </div>
			  </div>
			  <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
			  <a class="right carousel-control" href="#featured" data-slide="next">›</a>
			  </div>
			  </div>
		</div>
		

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

	<div class="container"> 


	
    <div class="txt-heading">Products</div>
    <?php
    $query = "SELECT * FROM product ORDER BY product_id ASC";

            $result = mysqli_query($link,$query);
        while($row=mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
    $product_array = $resultset;
    if (!empty($product_array)) { 
    	echo ' <ul class="thumbnails">';
        foreach($product_array as $key=>$value){
    ?>
       
				<li class="span3">
				  <div class="thumbnail">
            <form method="post" action="indexnew.php?action=add&code= <?php echo $product_array[$key]["product_id"]; ?>&code1= <?php echo $product_array[$key]["categ_id"]; ?>">
            <!-- <img src='view.php?id=".$product_array[$key]["product_id"]."'> -->
            <div class="product-image">
            <?php echo "<img src='view.php?id=".$product_array[$key]["product_id"]."' style='width:300px ; height:200px'>" ; ?>
            </div>
            <div><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
           
            <div class="product-price btn btn-primary"><?php echo "Rs ".$product_array[$key]["unit_price"]; ?></div>
<?php  
echo'
<div> <label>Quantity</label><input type="text" name="number" value=1> </div>
            <div><input type="hidden" name="id" value= '.$product_array[$key]["product_id"].'>
            <input type="submit" value="Add to cart" class="btn btn-primary" /> 
            </div>
';
?>
            </form>
            </div>
				</li>
            
        
    <?php
            }
    }
    ?>

	</ul>
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