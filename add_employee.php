<?php
require_once 'config.php';
 session_start();
 

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || $_SESSION['username']!='gourav'){

 echo "<script> location.href='adminlogin.php'; </script>";
  exit;
}

$emp_id = $name = $gender = $age = $bank_name = $work_experience = $phone_no = $account_no=$email_id= $address="";
$emp_id_err = $name_err = $gender_err = $age_err = $bank_name_err = $work_experience_err = $phone_no_err = $account_no_err=$email_id_err= $address_err="";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate emp_id
    if(empty(trim($_POST["emp_id"]))){
        $emp_id_err = "Please enter a emp_id.";
    } else{
        // Prepare a select statement
        $sql = "SELECT emp_id FROM employee WHERE emp_id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_emp_id);
            
            // Set parameters
            $param_emp_id = trim($_POST["emp_id"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $emp_id_err = "This emp_id is already taken.";
                } else{
                    $emp_id = trim($_POST["emp_id"]);
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
    
    // Validate confirm gender
    if(empty(trim($_POST['gender']))){
        $gender_err = 'Please confirm gender.';     
    } 
    else{
        $gender = trim($_POST['gender']);
    }


    if(empty(trim($_POST['age']))){
        $age_err = "Please enter a age.";     
    } else{
        $age = trim($_POST['age']);
    }

    
        $bank_name = trim($_POST['bank_name']);
        $work_experience = trim($_POST['work_experience']);
        $phone_no = trim($_POST['phone_no']);
        $address = trim($_POST['address']);
        $email_id = trim($_POST['email_id']);
        $account_no = trim($_POST['account_no']);

    
    if(empty($emp_id_err) && empty($name_err) && empty($gender_err) && empty($age_err) && empty($bank_name_err) && empty($work_experience_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO employee (emp_id,name,gender,age,bank_name, work_experience, phone_no, account_no,email_id,address) VALUES (".$emp_id.", '".$name."', '".$gender."', ".$age.", '".$bank_name."',".$work_experience.", ".$phone_no.",".$account_no.",'".$email_id."', '".$address."')";
         
        
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
       <!--  <form class="form-inline navbar-search" method="post" action="#" >
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
    <marquee><a href="#"><span style="bank_name:red">20% off on branded offers &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> </a>
    <a href="#"><span style="bank_name:red">15% off on SBI card &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> </a>
    <a href="#"><span style="bank_name:red">Branded fans &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> </a>
    </marquee>
</div> -->


<div id="mainBody">
<div class="container">
<div class="span9" >
   
    <h1 class="well">Add Employee</h1>
    <p>Fill the required form to add a Employee.</p>
	<div class="col-lg-12 well">
	<div class="row" style="padding-left: 60px">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<div class="col-sm-12">
						
					<div class="form-group <?php echo (!empty($emp_id_err)) ? 'has-error' : ''; ?>">
                <label>Employee-ID:<sup>*</sup></label>
                <input type="text" name="emp_id" class="form-control" value="<?php echo $emp_id; ?>">
                <span class="help-block"><?php echo $emp_id_err; ?></span>
            </div> 
					<div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <label>Name:<sup>*</sup></label>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                <span class="help-block"><?php echo $name_err; ?></span>
            </div> 

						<div class="form-group <?php echo (!empty($gender_err)) ? 'has-error' : ''; ?>">
                <label>Gender:<sup>*</sup></label>
                <input type="text" name="gender" class="form-control" value="<?php echo $gender; ?>">
                <span class="help-block"><?php echo $gender_err; ?></span>
            </div>

            			<div class="form-group <?php echo (!empty($age_err)) ? 'has-error' : ''; ?>">
                <label>Age:<sup>*</sup></label>
                <input type="text" name="age" class="form-control" value="<?php echo $age; ?>">
                <span class="help-block"><?php echo $age_err; ?></span>
            </div>
            		
						<div class="form-group <?php echo (!empty($bank_name_err)) ? 'has-error' : ''; ?>">
                <label>Bank-name:<sup>*</sup></label>
              <input type="text" name="bank_name" class="form-control" value="<?php echo $bank_name; ?>">
                <span class="help-block"><?php echo $bank_name_err; ?></span>
            </div> 
						

					<div class="form-group <?php echo (!empty($work_experience_err)) ? 'has-error' : ''; ?>">
                <label>Work-experience:<sup>*</sup></label>
                <input type="text" name="work_experience" class="form-control" value="<?php echo $work_experience; ?>">
                <span class="help-block"><?php echo $work_experience_err; ?></span>
            </div> 		
											
					<div class="form-group <?php echo (!empty($phone_no_err)) ? 'has-error' : ''; ?>">
                <label>Phone number:<sup>*</sup></label>
                <input type="text" name="phone_no"class="form-control" value="<?php echo $phone_no; ?>">
                <span class="help-block"><?php echo $phone_no_err; ?></span>
            </div> 	
                    <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                <label>Address:<sup>*</sup></label>
                <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                <span class="help-block"><?php echo $address_err; ?></span>
            </div>

                        <div class="form-group <?php echo (!empty($account_no_err)) ? 'has-error' : ''; ?>">
                <label>Account-NO:<sup>*</sup></label>
                <input type="text" name="account_no" class="form-control" value="<?php echo $account_no; ?>">
                <span class="help-block"><?php echo $account_no_err; ?></span>
            </div>
                    
                        <div class="form-group <?php echo (!empty($email_id_err)) ? 'has-error' : ''; ?>">
                <label>Email-ID:<sup>*</sup></label>
              <input type="text" name="email_id" class="form-control" value="<?php echo $email_id; ?>">
                <span class="help-block"><?php echo $email_id_err; ?></span>
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