
<?php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, password FROM cus_users_new WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                   
                                        if(mysqli_stmt_fetch($stmt)){
 // echo $username." ".$password." ".$hashed_password;
                        if(password_verify($password ,$hashed_password)){

                            session_start();
                            $_SESSION['username'] = $username;    
                            // echo "njds";  
                            echo "<script> location.href='home.php'; </script>";
                        } else{
                        	 //echo "jnsfdj";
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                    else {
                    	echo"wrong smt";
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
        
        // Close statement
        
    }
    
    // Close connection
    mysqli_close($link);
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
		<a href="indexnew.php"><span class="btn btn-primary"><i class="icon-shopping-cart icon-white"></i> Items in cart </span> </a> 
	</div>
	</div>
	</div>

<!-- Navbar -->


<div id="logoArea" class="navbar">

  <div class="navbar-inner">
    <a class="brand" href="home.php"><img src="themes/images/imag.jpeg" alt="Dhakadenterprise"/></a>
		

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




<div id="mainBody">
	<div class="container">
	

		<div id="login"  tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false"  style="width:800px; margin:0 auto;">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Login Block</h3>
		  </div>
		  <div class="modal-body">
		  <form class="form-horizontal loginFrm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			  <div class="control-group"> <?php echo (!empty($username_err)) ? $username_err : ''; ?>								
				 <label>Username:<sup>*</sup></label>
				 <input type="text" id="inputEmail" placeholder="Username" name="username" value="<?php echo $username; ?>">
			  </div>
			  <div class="control-group"> <?php echo (!empty($password_err)) ? $password_err : ''; ?>
				 <label>Password:<sup>*</sup></label><input type="password" id="inputPassword" placeholder="Password" name="password">
			  </div>
			  <div class="control-group">
				<label class="checkbox">
				<input type="checkbox"> Remember me
				</label>
			  </div>
			  <input type="submit" value="Log-in">
			  <a href="signin.php" style="padding-right:0"><span class="btn btn-success">Sign-up</span></a>
			  
			</form>		
			
			<!-- <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button> -->
		  </div>
	</div>



		<div id="sidebar" class="span3 pull-right" style="padding-right: 80px">
		<div class="well well-small"><a id="myCart" href="indexnew.php"><img src="themes/images/ico-cart.png" alt="cart">0 Items in your cart  </a></div>
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

	
