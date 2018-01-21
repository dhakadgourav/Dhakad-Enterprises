<?php
require_once 'config.php';
 session_start();
 

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || $_SESSION['username']!='gourav'){

  echo "<script> location.href='adminlogin.php'; </script>";
  exit;
}

$product_id = $name = $brand_name = $unit_price = $color = $supply_id = $categ_id = "";
$product_id_err = $name_err = $brand_name_err = $unit_price_err = $color_err = $supply_id_err = $categ_id_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate product_id
    if(empty(trim($_POST["product_id"]))){
        $product_id_err = "Please enter a product_id.";
    } else{
        // Prepare a select statement
        $sql = "SELECT product_id FROM product WHERE product_id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_product_id);
            
            // Set parameters
            $param_product_id = trim($_POST["product_id"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $product_id_err = "This product_id is already taken.";
                } else{
                    $product_id = trim($_POST["product_id"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate name
    if(empty(trim($_POST['name']))){
        $name_err = "Please enter a name.";     
    } else{
        $name = trim($_POST['name']);
    }
    
    // Validate confirm brand_name
    if(empty(trim($_POST['brand_name']))){
        $brand_name_err = 'Please confirm brand_name.';     
    } 
    else{
        $brand_name = trim($_POST['brand_name']);
    }


    if(empty(trim($_POST['unit_price']))){
        $unit_price_err = "Please enter a unit_price.";     
    } else{
        $unit_price = trim($_POST['unit_price']);
    }

    
        $color = trim($_POST['color']);
        $supply_id = trim($_POST['supply_id']);
        $categ_id = trim($_POST['categ_id']);

    
    if(empty($product_id_err) && empty($name_err) && empty($brand_name_err) && empty($unit_price_err) && empty($color_err) && empty($supply_id_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO product (product_id,name,brand_name,unit_price,color, supply_id, categ_id) VALUES (".$product_id.", '".$name."', '".$brand_name."', ".$unit_price.", '".$color."',".$supply_id.", ".$categ_id.")";
         
        
         if(mysqli_query($link,$sql)){
                // Redirect to login page
                 echo "<script> alert(\"Item ".$name." added \")</script>";
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
<!-- 
<div>
    <marquee><a href="#"><span style="color:red">20% off on branded offers &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> </a>
    <a href="#"><span style="color:red">15% off on SBI card &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> </a>
    <a href="#"><span style="color:red">Branded fans &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> </a>
    </marquee>
</div> -->


<div id="mainBody">
<div class="container">
<div class="span9" >
   
    <h1 class="well">Add Product</h1>
    <p>Fill the required form to add a product.</p>
	<div class="col-lg-12 well">
	<div class="row" style="padding-left: 60px">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<div class="col-sm-12">
						
					<div class="form-group <?php echo (!empty($product_id_err)) ? 'has-error' : ''; ?>">
                <label>Product_id:<sup>*</sup></label>
                <input type="text" name="product_id" class="form-control" value="<?php echo $product_id; ?>">
                <span class="help-block"><?php echo $product_id_err; ?></span>
            </div> 
					<div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <label>Name:<sup>*</sup></label>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                <span class="help-block"><?php echo $name_err; ?></span>
            </div> 

						<div class="form-group <?php echo (!empty($brand_name_err)) ? 'has-error' : ''; ?>">
                <label>Brand Name:<sup>*</sup></label>
                <input type="text" name="brand_name" class="form-control" value="<?php echo $brand_name; ?>">
                <span class="help-block"><?php echo $brand_name_err; ?></span>
            </div>

            			<div class="form-group <?php echo (!empty($unit_price_err)) ? 'has-error' : ''; ?>">
                <label>Unit-price:<sup>*</sup></label>
                <input type="text" name="unit_price" class="form-control" value="<?php echo $unit_price; ?>">
                <span class="help-block"><?php echo $unit_price_err; ?></span>
            </div>
            		
						<div class="form-group <?php echo (!empty($color_err)) ? 'has-error' : ''; ?>">
                <label>Color:<sup>*</sup></label>
              <input type="text" name="color" class="form-control" value="<?php echo $color; ?>">
                <span class="help-block"><?php echo $color_err; ?></span>
            </div> 
						

					<div class="form-group <?php echo (!empty($supply_id_err)) ? 'has-error' : ''; ?>">
                <label>Supply-id:<sup>*</sup></label>
                <input type="text" name="supply_id" class="form-control" value="<?php echo $supply_id; ?>">
                <span class="help-block"><?php echo $supply_id_err; ?></span>
            </div> 		
											
					<div class="form-group <?php echo (!empty($categ_id_err)) ? 'has-error' : ''; ?>">
                <label>Category:<sup>*</sup></label>
                <input type="text" name="categ_id"class="form-control" value="<?php echo $categ_id; ?>">
                <span class="help-block"><?php echo $categ_id_err; ?></span>
            </div> 	
            		<input type="submit" class="btn btn-primary" value="Submit">
					<a href="admin_database.php" style="padding-right:0"><span class="btn btn-primary">Database</span></a>
					</div>				
					
				</form> 
				
	</div>
	</div>
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