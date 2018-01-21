<?php
require_once 'config.php';
 

$username = $password = $confirm_password = $name = $email = $city = $mobilenumber =$address= $account = "";
$username_err = $password_err = $confirm_password_err = $name_err = $email_err = $city_err = $mobilenumber_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT username FROM cus_users_new WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }


    if(empty(trim($_POST['name']))){
        $name_err = "Please enter a name.";     
    } else{
        $name = trim($_POST['name']);
    }

    if(empty(trim($_POST['email']))){
        $email_err = "Please enter a valid email.";     
    }
    
     else{
        $email = trim($_POST['email']);
    }

    if(empty(trim($_POST['city']))){
        $city_err = "Please enter a city.";     
    } else{
        $city = trim($_POST['city']);
    }

    if(empty(trim($_POST['mobilenumber']))){
        $mobilenumber_err = "Please enter a mobile number.";     
    } else{
        $mobilenumber = trim($_POST['mobilenumber']);
    }
    $address = trim($_POST['address']);
    $account = trim($_POST['account']);

    $password=password_hash($password,PASSWORD_DEFAULT);
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($name_err) && empty($email_err) && empty($city_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO cus_users_new (username,name,email, password, city, mobilenumber,address,account_no) VALUES ('".$username."', '".$name."', '".$email."', '".$password."', '".$city."', ".$mobilenumber.",'".$address."',".$account.")";
         //echo $sql;
        //echo $username;
         if(mysqli_query($link,$sql)){
                // Redirect to login page
                echo "<script> location.href='login.php'; </script>";
            } else{
                echo "Something went wrong. Please try again later.";
            }
        
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




<div id="mainBody">
	<div class="container">
	

		<div class="span9" >
   
    <h1 class="well">Registration Form</h1>
    <p>Fill the required form to create an account.</p>
	<div class="col-lg-12 well">
	<div class="row" style="padding-left: 60px">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<div class="col-sm-12">
						
							<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username:<sup>*</sup></label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div> 
					<div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <label>Name:<sup>*</sup></label>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                <span class="help-block"><?php echo $name_err; ?></span>
            </div> 
											
						<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email-ID:<sup>*</sup></label>
              <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div> 
						

						<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password:<sup>*</sup></label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password:<sup>*</sup></label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
						
					
					<div class="form-group <?php echo (!empty($city_err)) ? 'has-error' : ''; ?>">
                <label>City:<sup>*</sup></label>
                <input type="text" name="city" class="form-control" value="<?php echo $city; ?>">
                <span class="help-block"><?php echo $city_err; ?></span>
            </div> 		
											
					<div class="form-group <?php echo (!empty($mobilenumber_err)) ? 'has-error' : ''; ?>">
                <label>Mobile Number:<sup>*</sup></label>
                <input type="text" name="mobilenumber" class="form-control" value="<?php echo $mobilenumber; ?>">
                <span class="help-block"><?php echo $mobilenumber_err; ?></span>
            </div> 	

            <div class="form-group">
                <label>Address:<sup>*</sup></label>
                <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                
            </div> 

            <div class="form-group">
                <label>Account-No.</label>
                <input type="text" name="account" class="form-control" value="<?php echo $account; ?>">
                
            </div> 	
            		<input type="submit" class="btn btn-primary" value="Submit">
					
					
					 <p>Already have an account? <a href="login.php">Login</a>.</p>	
					</div>				
					
				</form> 
				
	</div>
	</div>
</div>



		<div id="sidebar" class="span3 pull-right" style="padding-right: 80px">
		<div class="well well-small"><a id="myCart" href="indexnew.php"><img src="themes/images/ico-cart.png" alt="cart">0 Items in your cart  <span class="badge badge-warning pull-right" >Rs.0.00</span></a></div>
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