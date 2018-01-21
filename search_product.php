
<?php
// Include config file
require_once 'config.php';
 session_start();

 if(!isset($_SESSION['username']) || $_SESSION['username']!='gourav'){

  echo "<script> location.href='adminlogin.php'; </script>";
  exit;
}
// Define variables and initialize with empty values
$product_id = $name = "";
$product_id_err = $name_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if product_id is empty
    
    
    // Check if name is empty
    if(empty(trim($_POST['name']))){
        $name_err = 'Please  name.';
    } else{
        $name = trim($_POST['name']);
    }
    
       // echo "<script> alert(\" ".$name." Deleted\") </script>";
            //header("location: admin_database.php");

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
   
    </div>
    </div>

<!-- Navbar -->


<div id="logoArea" class="navbar">

  <div class="navbar-inner">
    <a class="brand" href="home.html"><img src="themes/images/imag.jpeg" alt="Dhakadenterprise"/></a>
        

       <ul id="topMenu" class="nav pull-right">
     <li class=""><a href="seasonal.html">Seasonal Offers</a></li>
      <li class=""><a href="contact.html">About us</a></li>

     
      
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


<div class="col-lg-12" >
   
    <h1 class="well">Search Product</h1>
    
    <div class="col-lg-12 well">
    <div class="row" style="padding-left: 60px">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="col-sm-12">
                        
                    <!-- <div class="form-group <?php echo (!empty($product_id_err)) ? 'has-error' : ''; ?>">
                <label>Product_id:<sup>*</sup></label>
                <input type="text" name="product_id" class="form-control" value="<?php echo $product_id; ?>">
                <span class="help-block"><?php echo $product_id_err; ?></span>
            </div>  -->
                    <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <label>Name:<sup>*</sup></label>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                <span class="help-block"><?php echo $name_err; ?></span>
            </div> 

                        
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="admin_database.php" style="padding-right:0"><span class="btn btn-primary">Database</span></a>
                    </div>              
                    
                </form> 
                
    </div>
    </div>
</div>
<div class="col-lg-12">
<?php
    $sql = "SELECT product_id, name, brand_name,unit_price, color FROM  product where product_id= '".$product_id."' and name='".$name."'" ;
$result = mysqli_query($link, $sql);
//echo "jksdd   ";
//echo $sql ;
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo '
<table class="table table-hover table-active" style="margin-left:300px">
    <tr>
    <th>Product-ID</th>
    <th>Name</th>
    <th>Brand Name</th>
    <th>Unit-Price</th>
    <th>Color</th>
  </tr> 
  ';

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><th>" . $row["product_id"]."</th><th>" . $row["name"]. "</th><th>". $row["brand_name"]."</th><th>" . $row["unit_price"]."</th><th>" . $row["color"]. "</th></tr>";
    }

    echo '</table>';
} else {
    echo "0 results";
}
 mysqli_close($link);
 ?>


</div>
</div>

    
    </div>

</div>

<div  id="footerSection">
    <div class="container">
        <div class="row">
            <div class="span3">
                <h5>ACCOUNT</h5>
                <a href="login.php">YOUR ACCOUNT</a>
                <a href="login.php">PERSONAL INFORMATION</a> 
                <a href="login.php">ADDRESSES</a> 
             </div>
            <div class="span3">
                <h5>INFORMATION</h5>
                <a href="contact.php">CONTACT</a>  
                <a href="#">SPECIAL OFFERS</a>
                <a href="register.php">REGISTRATION</a>  
                
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